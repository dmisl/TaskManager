<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Task;
use App\Models\User;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id()); // authed user
        // GETTING ALL WEEK RESULTS DATA
            $total_data = [];
            foreach(Check::query()->where('type', 3)->where('user_id', $user->id)->whereJsonLength('tasks', '>', 0)->get() as $check)
            {
                $total_data[] = $check->tasks;
            }
        // COUNTING EXISTING TASKS AND TASKS FROM UNFINISHED BLOCK
            $tasks_count = $user->tasks->count();
            $transferred_count = 0;
            foreach ($user->checks()->where('type', 1)->get() as $check) {
                foreach ($check->tasks as $task) {
                    $transferred_count++;
                }
            }
        // GETTING OVERALL AVERAGE OF ALL STATISTICS
            $low_avg = 0;
            $high_avg = 0;
            $tasks_avg = 0;
            $required_avg = 0;
            $transferred_avg = $transferred_count/$tasks_count;
            foreach($total_data as $weeks_result)
            {
                foreach ($weeks_result as $week_result) {
                    $low_avg += $week_result['low'];
                    $high_avg += $week_result['high'];
                    $tasks_avg += $week_result['tasks'];
                    $required_avg += $week_result['required'];
                }
                $low_avg = $low_avg/count($weeks_result);
                $high_avg = $high_avg/count($weeks_result);
                $tasks_avg = $tasks_avg/count($weeks_result);
                $required_avg = $required_avg/count($weeks_result);
            }
        return view('stats.index', compact('low_avg', 'high_avg', 'tasks_avg', 'required_avg', ''));
    }
}
