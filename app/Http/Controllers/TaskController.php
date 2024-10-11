<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Day;
use App\Models\Goal;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'goal_id' => ['required'],
            'priority' => ['required', 'min:1', 'max:5'],
            'name' => ['required', 'string', 'min:5', 'max:50'],
            'desc' => ['max:100'],
        ]);
        if(Goal::find($request->goal_id)->user_id == Auth::id())
        {
            Task::create([
                'name' => $request->name,
                'priority' => $request->priority,
                'desc' => $request->desc ? $request->desc : '',
                'goal_id' => $request->goal_id,
            ]);
        }
        return back();
    }
    public function changeDay(Request $request)
    {
        $day = Day::find($request->day_id);
        $task = Task::find($request->task_id);
        if($day->week->user->id == Auth::id() && $task->goal->user->id == Auth::id())
        {
            $task->update([
                'day_id' => $day->id
            ]);
        }
        return response()->json([
            'data' => $task
        ]);
    }
    public function changePriority(Request $request)
    {
        $task = Task::find($request->task_id);
        if($task->goal->user->id == Auth::id())
        {
            $task->update([
                'priority' => $request->priority
            ]);
            return response()->json([
                'data' => 'success',
                'name' => $task->name
            ]);
        }
        return response()->json([
            'data' => 'error',
        ]);
    }
    public function changeDesc(Request $request)
    {
        $validated = $request->validate([
            'desc' => ['required', 'max:100'],
        ]);
        $task = Task::find($request->task_id);
        if($task->goal->user->id == Auth::id())
        {
            $task->update([
                'desc' => $request->desc
            ]);
            return response()->json([
                'data' => 'success',
                'name' => $task->name
            ]);
        }
        return response()->json([
            'data' => 'error',
        ]);
    }
    public function getData(Request $request)
    {
        $task = Task::find($request->id);
        return response()->json([
            'name' => $task->name,
            'goal_id' => $task->goal_id,
            'goal_name' => $task->goal->name,
            'date' => $task->day->date,
            'desc' => $task->desc,
            'priority' => $task->priority,
            'comments' => $task->comments
        ]);
    }
    public function createComment(Request $request)
    {
        if(Task::find($request->task_id)->goal->user->id == Auth::id())
        {
            Comment::create([
                'text' => $request->text,
                'task_id' => $request->task_id
            ]);
            return response()->json([
                'data' => 'success'
            ]);
        }
        return response()->json([
            'data' => 'error'
        ]);
    }
    public function complete(Request $request)
    {
        $task = Task::find($request->task_id);
        if($task->goal->user->id == Auth::id())
        {
            $task->update([
                'completed' => 1
            ]);
            return response()->json([
                'data' => 'success'
            ]);
        }
        return response()->json([
            'data' => 'error'
        ]);
    }
    public function delete(Request $request)
    {
        $task = Task::find($request->task_id);
        if($task->goal->user->id == Auth::id())
        {
            $task->delete();
            return response()->json([
                'data' => 'success'
            ]);
        }
        return response()->json([
            'data' => 'error'
        ]);
    }
}
