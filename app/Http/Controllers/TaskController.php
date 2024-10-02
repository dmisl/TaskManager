<?php

namespace App\Http\Controllers;

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
    public function changeDate(Request $request)
    {
        return response()->json([
            'data' => 'something'
        ]);
    }
}
