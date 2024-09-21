<?php

namespace App\Http\Controllers;

use App\Models\Goal;
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
        return view('goal.show');
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
