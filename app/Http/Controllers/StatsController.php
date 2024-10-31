<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Models\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $total_data = [];
        foreach(Check::query()->where('type', 3)->where('user_id', Auth::id())->whereJsonLength('tasks', '>', 0)->get() as $check)
        {
            $total_data[] = $check->tasks;
        }
        foreach($total_data as $data)
        {

        }
        // foreach (Week::query()->where('result', '!=', null)->get() as $week)
        // {
        //     $week->update(['result' => null]);
        // }
        return view('stats.index');
    }
}
