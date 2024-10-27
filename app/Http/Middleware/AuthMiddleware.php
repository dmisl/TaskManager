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
            $weeks = Week::query()->where('result', null)->where('id', 4)->get();
            $totalTasks = 0;
            $completedTasks = 0;
            $highPriorityTasks = 0;
            $completedHighPriorityTasks = 0;
            $lowPriorityTasks = 0;
            $completedLowPriorityTasks = 0;
            $transferredTasks = 0;
            $emptyDays = 0;
            $totalGoals = 0;
            $achievedGoals = 0;
            foreach ($weeks as $weeky) {
                # code...
                foreach ($weeky->days as $day) {
                    $dayTasks = $day->tasks;
                    $dayTaskCount = $dayTasks->count();

                    // Якщо в день немає завдань, вважаємо його "порожнім"
                    if ($dayTaskCount === 0) {
                        $emptyDays++;
                    }

                    foreach ($dayTasks as $task) {
                        $totalTasks++;

                        // Рахуємо виконані завдання
                        if ($task->completed) {
                            $completedTasks++;
                            if ($task->priority >= 4) {
                                $completedHighPriorityTasks++;
                            } else {
                                $completedLowPriorityTasks++;
                            }
                        }

                        // Рахуємо пріоритети завдань
                        if ($task->priority >= 4) {
                            $highPriorityTasks++;
                        } else {
                            $lowPriorityTasks++;
                        }

                        // Перевірка перенесених завдань (completed == false і поточний день != day_id)
                        if (!$task->completed && $task->day_id != $day->id) {
                            $transferredTasks++;
                        }
                    }
                }

                // Перевірка виконання цілей за тиждень
                foreach ($weeky->user->goals as $goal) {
                    $totalGoals++;
                    $goalHighPriorityTasks = $goal->tasks()->where('priority', 5)->count();
                    $completedGoalHighPriorityTasks = $goal->tasks()->where('priority', 5)->where('completed', true)->count();

                    if ($completedGoalHighPriorityTasks >= $goal->tasks_number) {
                        $achievedGoals++;
                    }
                }

                // Розрахунок коефіцієнтів виконання
                $K_highPriority = $highPriorityTasks > 0 ? ($completedHighPriorityTasks / $highPriorityTasks) * 100 : 100;
                $K_lowPriority = $lowPriorityTasks > 0 ? ($completedLowPriorityTasks / $lowPriorityTasks) * 100 : 100;
                $K_goals = $totalGoals > 0 ? ($achievedGoals / $totalGoals) * 100 : 100;
                $penaltyTransferred = $totalTasks > 0 ? -($transferredTasks / $totalTasks) * 100 : 0;
                $bonusEmptyDays = $emptyDays * 2;

                // Підсумкова оцінка тижня
                $weekScore = ($K_highPriority * 0.5 + $K_lowPriority * 0.2 + $K_goals * 0.2 + $penaltyTransferred) / 3 + $bonusEmptyDays;

                // Округлення до 10-бальної шкали
                $finalScore = round($weekScore / 10, 1);

                // Збереження оцінки в моделі Week та пояснення
                // $weeky->result = $finalScore;
                // $weeky->save();

                dd([
                    'week_score' => $finalScore,
                    'details' => [
                        'high_priority_task_completion' => $K_highPriority,
                        'low_priority_task_completion' => $K_lowPriority,
                        'goal_completion' => $K_goals,
                        'penalty_transferred_tasks' => $penaltyTransferred,
                        'bonus_empty_days' => $bonusEmptyDays,
                    ]
                ]);
            }

            return $next($request);
        } else
        {
            return redirect()->route('login.index');
        }
    }
}
