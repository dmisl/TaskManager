<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Day;
use App\Models\Goal;
use App\Models\Task;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Auth::user()->goals;
        return view('goal.index', compact('goals'));
    }
    public function show($id = 0)
    {
        // set timezone for view
        date_default_timezone_set('Europe/Warsaw');
        $user = User::find(Auth::id());
        if($id !== 0)
        {
            $goal = Goal::find($id);
            if($goal->user_id !== $user->id)
            {
                return redirect()->route('home.index');
            }
        }
        $goals = Auth::user()->goals;

        $today = Carbon::now('Europe/Warsaw')->format('Y-m-d');

        // GETTING CURRENT AND NEXT WEEK
        $week = $user->weeks()->where('start', '<=', $today)->where('end', '>=', $today)->first();

        $nextWeekStart = Carbon::parse($week->end)->addDay()->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
        $nextWeekEnd = Carbon::parse($nextWeekStart)->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $nextWeek = $user->weeks()->where('start', $nextWeekStart)->where('end', $nextWeekEnd)->first();

        // GETTING DAYS FROM THIS AND NEXT WEEK
            $days = Day::whereBetween('date', [$today, Carbon::today('Europe/Warsaw')->addDays(4)])->get()->sortBy('date');

        // GETTING UNFINISHED TASKS

            $notCompletedID = Check::query()->where(['date' => $today])->where('type', 1)->first()->tasks;

            $notCompleted = Task::whereIn('id', $notCompletedID)->get();
        // GET DAY IDS FROM THIS WEEK FOR PRIORITY TASKS COUNT LOGIC
            $day_IDs = [null];
            foreach ($week->days as $day) {
                $day_IDs[] = $day->id;
            }

        return view('goal.show', compact('week', 'days', 'day_IDs', 'id', 'goals', 'notCompleted', 'notCompletedID'));
    }
    public function create()
    {
        return view('goal.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:45'],
            'tasks_number' => ['required', 'integer', 'between:1,8'],
            'end_date' => ['required', 'date'],
            'image' => ['required', 'string'],
        ]);
        $goal = Goal::create([
            'name' => $validated['name'],
            'end_date' => $validated['end_date'],
            'tasks_number' => $validated['tasks_number'],
            'image' => $validated['image'],
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('goal.show', [$goal->id]);
    }
    public function getData(Request $request)
    {
        $validated = $request->validate([
            'goal_id' => ['required']
        ]);
        $goal = Goal::find($request->goal_id);
        if($goal->user_id == Auth::id())
        {
            return response()->json([
                'name' => $goal->name,
                'image' => $goal->image,
                'tasks_number' => $goal->tasks_number,
                'end_date' => $goal->end_date
            ]);
        }
        return response()->json([
            'data' => 'error'
        ]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:45'],
            'tasks_number' => ['required', 'integer', 'between:1,8'],
            'end_date' => ['required', 'date'],
            'image' => ['required', 'string'],
            'goal_id' => ['required']
        ]);
        $goal = Goal::find($request->goal_id);
        if($goal->user_id == Auth::id())
        {
            $goal->update([
                'name' => $request->name,
                'tasks_number' => $request->tasks_number,
                'end_date' => $request->end_date,
                'image' => $request->image,
            ]);
            return response()->json([
                'data' => 'success'
            ]);
        }
        return response()->json([
            'data' => 'error'
        ], 404);
    }
    public function delete(Request $request)
    {
        $validated = $request->validate([
            'goal_id' => ['required']
        ]);
        $goal = Goal::find($request->goal_id);
        if($goal->user_id == Auth::id())
        {
            $check = Check::query()->where('date', Carbon::now('Europe/Warsaw')->format('Y-m-d'))->where('user_id', Auth::id())->first();
            if($check)
            {
                $check->delete();
            }
            foreach ($goal->tasks as $task) {
                $task->delete();
            }
            $goal->delete();
            return response()->json([
                'data' => 'success'
            ], 200);
        }
        return response()->json([
            'data' => 'error'
        ], 404);
    }
}
