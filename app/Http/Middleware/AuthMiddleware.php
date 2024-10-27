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

                if(!Check::query()->where('date', $today)->where('type', 2)->where('user_id', Auth::id())->first())
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

            return $next($request);
        } else
        {
            return redirect()->route('login.index');
        }
    }
}
