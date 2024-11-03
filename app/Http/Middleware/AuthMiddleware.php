<?php

namespace App\Http\Middleware;

use App\Models\Check;
use App\Models\Day;
use App\Models\User;
use App\Models\Week;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            // WELCOMING IN FUTURE

            // if(!Auth::user()->welcomed)
            // {
            //     return redirect()->route('welcome.index');
            // }

            // DAYS AND WEEKS CHECK

                $user = User::find(Auth::id());

                $today = Carbon::now('Europe/Warsaw')->format('Y-m-d');

                if(!Check::query()->where('date', $today)->where('type', 2)->where('user_id', $user->id)->first())
                {

                    $week = $user->weeks()->where('start', '<=', $today)->where('end', '>=', $today)->first();

                    $start = Carbon::now('Europe/Warsaw')->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
                    $end = Carbon::now('Europe/Warsaw')->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');

                    if (!$week) {

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
                                'week_id' => $week->id,
                                'user_id' => $user->id,
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
                                'week_id' => $nextWeek->id,
                                'user_id' => $user->id,
                            ]);
                        }
                    }

                    Check::create([
                        'date' => $today,
                        'type' => 2,
                        'user_id' => $user->id,
                        'tasks' => []
                    ]);

                }

            // HANDLING DAY CHECK
                if(!Check::query()->where('date', $today)->where('type', 1)->where('user_id', $user->id)->first())
                {
                    $notCompletedID = [];
                    $weeksBeforeToday = $user->weeks;
                    foreach ($weeksBeforeToday as $week) {
                        foreach ($week->days as $day) {
                            foreach ($day->tasks as $task) {
                                if (!$task->completed && $task->day->date < $today) {
                                    $notCompletedID[] = $task->id;
                                }
                            }
                        }
                    }

                    Check::create([
                        'date' => $today,
                        'type' => 1,
                        'user_id' => $user->id,
                        'tasks' => $notCompletedID,
                    ]);
                }

            // WEEKS RESULT
            if(!Check::query()->where('date', $today)->where('type', 3)->where('user_id', $user->id)->first())
            {
                $weeks = Week::query()->where('result', null)->where('end', '<', $today)->get();
                $details = [];
                foreach ($weeks as $weeky) {
                    $day_IDs = [];
                    // HANDLING TASKS AND PRIORITIES
                        $tasks = [];
                        $tasks_completed = 0;
                        $high = [];
                        $high_completed = 0;
                        $low = [];
                        $low_completed = 0;
                        foreach($weeky->days as $day)
                        {
                            $day_IDs[] = $day->id;
                            foreach ($day->tasks as $task) {
                                $tasks[] = $task;
                                // CHECKING TASK COMPLETANCE / ADDING COMPLETED AMOUNT OF SPECIFIC TASKS
                                if($task->priority >= 4) {
                                    $high[] = $task;
                                    if ($task->completed && Carbon::parse($task->updated_at)->lt(Carbon::parse($weeky->end)))
                                    {
                                        $tasks_completed++;
                                        $high_completed++;
                                    }
                                } else
                                {
                                    $low[] = $task;
                                    if ($task->completed && Carbon::parse($task->updated_at)->lt(Carbon::parse($weeky->end)))
                                    {
                                        $tasks_completed++;
                                        $low_completed++;
                                    }
                                }
                            }
                        }
                    // HANDLING UNFINISHED TASKS
                        $unfinished = 0;
                        foreach (Check::query()->whereBetween('date', [$weeky->start, $weeky->end])->where('type', 1)->where('user_id', $user->id)->get() as $check) {
                            foreach ($check->tasks as $task) {
                                $unfinished++;
                            }
                        }
                    // HANDLING REQUIRED TASKS
                    $required = 0;
                    $required_completed = 0;
                    foreach ($user->goals()->where('created_at', '<', $weeky->end)->get() as $goal) {
                        $required = $required + $goal->tasks_number;
                        $completed = $goal->tasks()->whereIn('day_id', $day_IDs)->where('priority', '5')->get()->count();
                        $required_completed = $completed >= $goal->tasks_number ? $required_completed + $goal->tasks_number : $required_completed + $completed;
                    }

                    // CALCULATING DATA

                    if(count($tasks) > 0)
                    {
                        $tasks_percentage = $tasks_completed/count($tasks);
                        $high_percentage = count($high) > 0 ? $high_completed/count($high) : 0;
                        $low_percentage = count($low) > 0 ? $low_completed/count($low) : 0;
                        $required_percentage = $required_completed > 0 ? $required_completed/$required : 0;
                        $unfinished_percentage = $unfinished*7/1000;

                        $result = $tasks_percentage*0.2+$high_percentage*0.3+$low_percentage*0.1+$required_percentage*0.4-$unfinished_percentage;

                        $result = round($result*10, 1);

                        $details[$weeky->id] = [
                            'tasks' => $tasks_percentage,
                            'high' => $high_percentage,
                            'low' => $low_percentage,
                            'required' => $required_percentage,
                            'transferred' => $unfinished,
                        ];

                    } else
                    {
                        $details[$weeky->id] = [
                            'tasks' => 0,
                            'high' => 0,
                            'low' => 0,
                            'required' => 0,
                            'transferred' => 0,
                        ];

                        $result = 0.0;
                    }

                    $weeky->update([
                        'result' => $result,
                    ]);

                }
                Check::create([
                    'date' => $today,
                    'type' => 3,
                    'user_id' => $user->id,
                    'tasks' => $details,
                ]);
            }


            return $next($request);
        } else
        {
            return redirect()->route('login.index');
        }
    }
}
