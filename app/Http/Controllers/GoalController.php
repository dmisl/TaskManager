<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Goal;
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
    public function show($id)
    {
        $today = Carbon::today()->format('Y-m-d');
        $user = User::find(Auth::id());
        $week = $user->weeks()->where('start', '<=', $today)->where('end', '>=', $today)->first();

        if (!$week) {
            $start = Carbon::now()->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
            $end = Carbon::now()->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');

            $week = Week::create([
                'start' => $start,
                'end' => $end,
                'result' => null,
                'user_id' => $user->id,
            ]);

            for ($i = 1; $i <= 7; $i++) {
                $dayDate = Carbon::parse($start)->addDays($i - 1)->format('Y-m-d');
                Day::create([
                    'date' => $dayDate,
                    'day_number' => $i,
                    'result' => null,
                    'week_id' => $week->id
                ]);
            }
        }

        $nextWeekStart = Carbon::parse($week->end)->addDay()->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
        $nextWeekEnd = Carbon::parse($nextWeekStart)->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $nextWeek = $user->weeks()->where('start', $nextWeekStart)->where('end', $nextWeekEnd)->first();

        if (!$nextWeek) {
            $nextWeek = Week::create([
                'start' => $nextWeekStart,
                'end' => $nextWeekEnd,
                'result' => null,
                'user_id' => $user->id,
            ]);

            for ($i = 1; $i <= 7; $i++) {
                $dayDate = Carbon::parse($nextWeekStart)->addDays($i - 1)->format('Y-m-d');
                Day::create([
                    'date' => $dayDate,
                    'day_number' => $i,
                    'result' => null,
                    'week_id' => $nextWeek->id
                ]);
            }
        }

        $days = $week->days->merge($nextWeek->days)->sortBy('date');
        $goals = Auth::user()->goals;
        return view('goal.show', compact('week', 'days', 'goals'));
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
}
