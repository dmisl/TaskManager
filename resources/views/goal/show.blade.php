@extends('main')

@section('title', 'My week')

@section('style')
    @vite('resources/css/goalShow.css')
@endsection

@section('content')

<div class="content__container">
    <div class="content">
        <div class="tasks">
            <div class="tasks__title">
                <h1>Цілі і завдання</h1>
            </div>
            <div class="tasks__flex__container">
                <div class="tasks__flex" id="x-custom__scrollbar">
                    {{-- UNFINISHED --}}
                        {{-- <div class="tasks__flex__block__parent">
                            <div class="tasks__flex__block unfinished">
                                <div class="title">
                                    Незавершені
                                </div>
                                <div class="flex">
                                    <div class="task p5">
                                        <div class="scrolling__parent">
                                            <p>
                                                Завершити блок з цілями<span>...</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="task p4">
                                        <div class="scrolling__parent">
                                            <p>
                                                Завершити блок з цілями<span>...</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="task p3">
                                        <div class="scrolling__parent">
                                            <p>
                                                Завершити блок з цілями<span>...</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="task p2">
                                        <div class="scrolling__parent">
                                            <p>
                                                Завершити блок з цілями<span>...</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="task p1">
                                        <div class="scrolling__parent">
                                            <p>
                                                Завершити блок з цілями<span>...</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    {{-- SHOWING ALL GOALS AS FLEX BLOCKS --}}
                    @foreach($goals as $goal)
                        <div class="tasks__flex__block__parent">
                            <div class="tasks__flex__block">
                                <div class="title">
                                    {{ $goal->name }}
                                </div>
                                <div class="flex">
                                    {{-- HANDLING 5TH PRIORITY TASKS --}}
                                    {{-- IF THERE IS NO NEEDED AMOUNT OF TASKS --}}
                                    @if($goal->tasks()->where('priority', 5)->get()->count() < $goal->tasks_number)
                                        @for ($i = 0; $i < $goal->tasks_number-$goal->tasks()->where('priority', 5)->get()->count(); $i++)
                                            <div class="task p5 required" goal_id="{{ $goal->id }}">
                                                <div class="scrolling__parent">
                                                    <p>
                                                        Обов'язкове завдання
                                                    </p>
                                                </div>
                                            </div>
                                        @endfor
                                        @foreach($goal->tasks()->where('priority', 5)->get() as $task)
                                            <div class="task p5" task_id="{{ $task->id }}" day_id="{{ $task->day_id }}" has_day="{{ $task->day_id ? 1 : 0 }}">
                                                <img class="completed" src="{{ asset('storage/images/completed.png') }}" style="{{ $task->completed ? 'display: block;' : 'display: none;' }}">
                                                @if(!$task->day_id)
                                                <img class="replace" src="{{ asset('storage/images/replace.png') }}" style="{{ $task->day_id ? 'display: none;' : 'display: block;' }}">
                                                @endif
                                                <div class="scrolling__parent">
                                                    <p>
                                                        {{ $task->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    {{-- IF THERE IS NEEDED AMOUNT OF TASKS JUST SHOW THEM --}}
                                    @else
                                        @foreach($goal->tasks()->where('priority', 5)->get() as $task)
                                            <div class="task p5">
                                                <img src="{{ asset('storage/images/completed.png') }}" alt="" class="completed">
                                                <div class="scrolling__parent">
                                                    <p>
                                                        {{ $task->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{-- SHOWING ALL TASKS WHICH DOES NOT HAVE 5TH PRIORITY --}}
                                        @foreach($goal->tasks()->where('priority', '<', 5) as $task)
                                            <div class="task p{{ $task->priority }}">
                                                <img src="{{ asset('storage/images/completed.png') }}" alt="" class="completed">
                                                <div class="scrolling__parent">
                                                        <p>
                                                            {{ $task->name }}
                                                        </p>
                                                    </div>
                                            </div>
                                        @endforeach
                                    {{-- TASK CREATE BUTTON --}}
                                    <div class="task__create" goal_id="{{ $goal->id }}">+</div>
                                </div>
                                <div class="image">
                                    <img src="{{ $goal->image }}" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="days">
            <div class="days__title">
                <h1>Дні тижня</h1>
            </div>
            <div class="days__flex__container">
                <div class="days__flex" id="x-custom__scrollbar">
                    @foreach ($days as $day)
                        <div class="days__flex__block__parent">
                            <div class="days__flex__block">
                                <div class="title">
                                    <h1>{{ $day['day_number'] }}</h1>
                                    <p>{{ $day['date'] }}</p>
                                    <div class="progress" style="width: 216px; border: 1px solid black; margin: 0 auto; height: 8px;" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 60%; background-color: rgb(73, 230, 0);"></div>
                                    </div>
                                </div>
                                <div class="flex" day_id="{{ $day->id }}">
                                    @foreach($day->tasks as $task)
                                        <div class="task p5" task_id="{{ $task->id }}" has_day="1">
                                            <img class="completed" src="{{ asset('storage/images/completed.png') }}" style="display: none;">
                                            <div class="scrolling__parent" style="user-select: none;">
                                                <p style="user-select: none;">{{ $task->name }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="task__create__modal d-none">

            <div class="task__create">
                <div class="title">
                    <h1>Нове завдання<span>🚀</span></h1>
                </div>
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <input class="task__goal_id" type="hidden" name="goal_id">
                    <div class="priority__parent">
                        <div class="d-flex justify-content-between">
                            <label for="priority">Рівень приорітету<span style="color: red;">*</span></label>
                            <svg class="priority__hint" style="position: relative; top: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" width="20" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <input class="task__priority" type="hidden" name="priority">
                        </div>
                        <div class="flex">
                            <svg class="priority p1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <svg class="priority p2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <svg class="priority p3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <svg class="priority p4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                            <svg class="priority p5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                    </div>
                    <p class="error priority__error"></p>
                    <div class="form-item">
                        <div class="d-flex justify-content-between">
                            <label for="name">Суть завдання<span style="color: red;">*</span></label>
                            <svg class="name__hint" style="position: relative; top: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" width="20" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <input class="form-control task__name" name="name" id="name" type="text" placeholder="Посадити редиску">
                    </div>
                    <p class="error name__error"></p>
                    <div class="form-item">
                        <div class="d-flex justify-content-between">
                            <label for="desc">Детальніший опис завдання</label>
                            <svg class="desc__hint" style="position: relative; top: 5px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20" width="20" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <textarea class="form-control task__desc" name="desc" id="desc" maxlength="100" placeholder="Не забуди піти до діда взяти якоїсь лопати та й граблі шоби шось почати" rows="3"></textarea>
                    </div>
                    <div class="form-submit">
                        <button type="submit"><p>Створити</p></button>
                    </div>
                </form>
            </div>

        </div>
        <div class="task__show__modal">
            <div class="task__show">
                <div class="title">
                    <div class="name">Назва завдання</div>
                    <div class="flex">
                        <img class="edit" src="{{ asset('storage/images/edit.png') }}">
                        <img class="delete" src="{{ asset('storage/images/delete.png') }}">
                        <img class="close" src="{{ asset('storage/images/close.png') }}">
                    </div>
                </div>
                <div class="content">
                    <div class="d-flex">
                        <div class="priority">
                            <h1>Рівень приорітету</h1>
                            <div class="priority__levels">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="26" height="26" viewBox="0 0 256 256" xml:space="preserve">
                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                        <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="date">
                            <h1>Потрібно виконати до</h1>
                            <h1 class="text">6 жовтня, 2024</h1>
                        </div>
                    </div>
                    <div class="flex__parent">
                        <div class="left">
                            <div class="desc">
                                <h1>Детальніший опис</h1>
                                <p>Якийсь більш детальніший опис цього завдання типу щось там доробити чи більше описані кроки до виконання</p>
                            </div>
                            <div class="goal">
                                <h1>Відноситься до цілі:</h1>
                                <h1 class="text">Знайти роботу програмістом</p>
                            </div>
                        </div>
                        <div class="right">
                            <div class="comment__parent">
                                <div class="comments">
                                    <div class="comment" style="font-size: 0;">
                                        <p>Якийсь справді дуже цікавий коментар доданий до завдання</p>
                                        <p class="datetime">2022-02-24 04:00:00</p>
                                    </div>
                                </div>
                                <div class="comment__input__parent">
                                    <input type="text" placeholder="Додати коментар">
                                    <div class="submit__parent">
                                        <img src="{{ asset('storage/images/send.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="complete__parent">
                    <div class="complete">
                        <p>Позначити як виконане</p>
                        <img src="{{ asset('storage/images/complete__background.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>

// ON LOAD OF THE PAGE
window.addEventListener('load', function () {

    let whole__content = document.querySelector('.whole__content')
    let loader__parent = document.querySelector('.loader__parent')

    // IF TASK FLEX DOESNT HAVE SCROLL BAR
        if(!(document.querySelector('.tasks__flex').scrollWidth > document.querySelector('.tasks__flex').clientWidth))
        {
            document.querySelector('.tasks__flex').style.height = '234px'
        }

    // ADDING SMOOTH SCROLLING
        let scrollBlocks = document.querySelectorAll('.days__flex, .tasks__flex');

        scrollBlocks.forEach(function(scrollBlock) {
            handleSmoothScroll(scrollBlock)
        });

    // HANDLING TASK__BLOCKS` VIEW
        let flex__blocks = document.querySelectorAll(".tasks__flex__block")
        flex__blocks.forEach(flex__block => {
            // FLEX BLOCK`S ELEMENTS
            let title = flex__block.querySelector('.title')
            let flex = flex__block.querySelector('.flex')
            let tasks = flex.querySelectorAll('.task')
            tasks.forEach(task => {
                if(task.querySelector(".replace"))
                {
                    if(task.querySelector('.replace').style.display == 'block')
                    {
                        task.style.cursor = 'grab'
                    }
                }
            });
            let image = flex__block.querySelector('.image')
            // IF BLOCK HAS IMAGE (NOT UNFINISHED) - FIX THE IMAGE
            if(image && image.querySelector('img'))
            {
                fixImage(image.querySelector('img'))
                // FLEX BLOCK`S ORIGINAL HEIGHT
                flex.style.overflow = 'visible'
                let flex__height = flex.offsetHeight
                // AFTER DECLARING FLEX HEIGHT HIDE IT
                flex.style.overflow = 'hidden'
                flex.style.maxHeight = '154px'
                // SET IMAGE TO DEFAULT POSITION
                image.style.bottom = (flex.offsetHeight+title.offsetHeight+25)+'px'
                // TIMEOUT TO SET THE FLEX BLOCK TO POSITION RELATIVE
                let positionRelativeTimeOut = null
                // ON HOVER WE SHOW WHATS INSIDE THE FLEX BLOCK
                flex__block.addEventListener('mouseenter', function () {
                    if(!isScrolling)
                    {
                        if(!isElementFullyVisible(document.querySelector('.tasks__flex'), flex__block))
                        {
                            scrollElementIntoView(document.querySelector('.tasks__flex'), flex__block)
                        }
                        clearTimeout(positionRelativeTimeOut)
                        flex__block.style.position = 'absolute'
                        flex__block.style.zIndex = '40'
                        flex.style.maxHeight = flex__height+'px'
                        image.style.bottom = (flex__height+title.offsetHeight+25)+'px'
                        flex__block.style.marginLeft = `-${document.querySelector('.tasks__flex').scrollLeft}px`
                    }
                });
                // ON LEAVE WE SET FLEX BLOCK TO THE DEFAULT POSITION
                flex__block.addEventListener('mouseleave', function () {
                    flex.style.maxHeight = '154px'
                    positionRelativeTimeOut = setTimeout(() => {
                        flex__block.style.position = 'relative'
                        flex__block.style.marginLeft = '0'
                        positionRelativeTimeOut = null
                        flex__block.style.zIndex = '20'
                        image.style.bottom = (flex.offsetHeight+title.offsetHeight+25)+'px'
                    }, 300);
                });
                // CHECK IF SCROLLING WHILE HOVER
                flex__block.addEventListener('wheel', function () {
                    flex.style.transition = '0'
                    image.style.transition = '0'
                    flex.style.maxHeight = '154px'
                    image.style.bottom = (flex__height+title.offsetHeight+25)+'px'
                    positionRelativeTimeOut = setTimeout(() => {
                        flex__block.style.position = 'relative'
                        flex__block.style.marginLeft = '0'
                        positionRelativeTimeOut = null
                        flex.style.transition = '0.3s'
                        image.style.transition = '0.3s'
                    }, 0);
                })
            }
        });
        // REQUIRED BLOCKS ADD CLICK EVENT TO CREATING WITH 5TH PRIORITY
        let requireds = document.querySelectorAll('.required')
        requireds.forEach(required => {
            required.addEventListener('click', function () {
                task__create__modal__open(required)
                document.querySelectorAll('.priority')[4].dispatchEvent(new MouseEvent('click', { bubbles: true }))
                document.querySelectorAll('.priority')[4].dispatchEvent(new MouseEvent('mouseover', { bubbles: true }));
            })
        });
        // HINT ON REQUIRED TASKS HOVER
            tippy('.required', {
                placement: 'right',
                content: 'Це важливе завдання для досягнення вашої цілі цього тижня. Натисніть на нього, щоб внести необхідну інформацію.',
                sticky: true,
            })
            tippy('.tasks__flex__block .task__create', {
                placement: 'right',
                content: 'Створити нове завдання',
                sticky: true,
            })
            tippy('.tasks__flex__block .completed', {
                placement: 'right',
                content: 'Це завдання виконано',
                sticky: true,
            })
            tippy('.tasks__flex__block .replace', {
                placement: 'right',
                content: 'Перетягніть це завдання на день, до якого ви хотіли б його виконати',
                sticky: true,
            })

    // HANDLING DAY__BLOCKS` VIEW
        function handle__new__task(flex, after__task = 0, drop = 1)
        {
            let new__task = document.createElement('div')
            if(draggingElement.querySelector('.replace'))
            {
                draggingElement.querySelector('.replace').remove()
            }
            draggingElement.style.cursor = 'pointer'
            draggingElement.setAttribute('has_day', 1)
            draggingElement.setAttribute('day_id', flex.attributes.day_id.value)
            for (let attribute of draggingElement.attributes) {
                new__task.setAttribute(attribute.name, attribute.value)
            }
            new__task.innerHTML = draggingElement.innerHTML
            new__task.querySelector('p').style.animation = ''
            if(!after__task)
            {
                flex.append(new__task)
            } else if(drop == 1 && flex.querySelector('.task__preview'))
            {

            } else
            {
                new__task.classList.add('task__preview')
                appendAfter(new__task, after__task)
            }
            if(drop)
            {
                let params = {
                    day_id: flex.attributes.day_id.value,
                    task_id: new__task.attributes.task_id.value
                }
                axios.post(`{{ route('task.changeDay') }}`, params)
                .then(res => {
                })
                .catch(err => {
                })
            }
            if(drop && draggingElement.parentElement.parentElement.classList.contains('days__flex__block'))
            {
                if(draggingElement.parentElement.querySelectorAll('.task').length == 1)
                {
                    draggingElement.remove()
                    days__flex__block__handle()
                } else
                {
                    draggingElement.remove()
                }
            }
            updateDropAreas()
            updateScrollingText()
            update__task__shows()
        }
        let handled = false
        let available__days
        function days__flex__block__handle()
        {
            let days__flex__blocks = document.querySelectorAll(".days__flex__block")
            available__days = []
            days__flex__blocks.forEach(flex__block => {
                // FLEX BLOCK`S ELEMENTS
                let title = flex__block.querySelector('.title')
                let flex = flex__block.querySelector('.flex')
                if(flex.offsetHeight < 154)
                {
                    flex.style.height = '154px'
                }
                // BEFORE SHOWING ELEMENT
                let title__p = title.querySelector('p')
                if(!isWithinFiveDays(title__p.innerText) && !handled)
                {
                    flex__block.parentElement.remove()
                } else
                {
                    available__days.push(flex.attributes.day_id.value)
                    if(!handled)
                    {
                        title__p.innerText = new Date(title__p.innerText).toLocaleDateString('uk-UA', { day: 'numeric', month: 'long' })
                        let title__h1 = title.querySelector('h1')
                        title__h1.innerText = getDayName(title__h1.innerText)
                    }
                    // check if day has tasks inside it
                    if(!flex.querySelector('.task'))
                    {
                        if(flex.querySelector('.first__task'))
                        {
                            flex.querySelector('.first__task').remove()
                        }
                        let first__task
                        first__task = document.createElement('div')
                        first__task.classList.add('first__task')
                        first__task.innerHTML = `Перетягніть сюди своє перше завдання`
                        flex.append(first__task)
                        first__task.addEventListener('dragenter', function () {
                            first__task.innerHTML = `Відпустіть мишку щоб розмістити тут своє завдання`
                        })
                        first__task.addEventListener('dragleave', function () {
                            first__task.innerHTML = `Перетягніть сюди своє перше завдання`
                        })
                        first__task.addEventListener('drop', function () {
                            first__task.remove()
                            handle__new__task(flex)
                        })
                    } else
                    {
                        if(flex.querySelector('.first__task'))
                        {
                            flex.querySelector('.first__task').remove()
                        }
                        flex.style.maxHeight = ''
                        // FLEX BLOCK`S ORIGINAL HEIGHT
                        flex.style.overflow = 'visible'
                        let flex__height = flex.offsetHeight
                        let flex__top = flex__height-154+'px'
                        // AFTER DECLARING FLEX HEIGHT HIDE IT
                        flex.style.overflow = 'hidden'
                        flex.style.maxHeight = '154px'
                        // SHOW FULL CONTENT ON HOVER
                            // TIMEOUT TO SET THE FLEX BLOCK TO POSITION RELATIVE
                            let positionRelativeTimeOut = null
                            // ON HOVER WE SHOW WHATS INSIDE THE FLEX BLOCK
                            flex__block.addEventListener('mouseenter', function () {
                                clearTimeout(positionRelativeTimeOut)
                                flex__block.style.position = 'absolute'
                                flex.style.maxHeight = flex__height+'px'
                            });
                            // ON LEAVE WE SET FLEX BLOCK TO THE DEFAULT POSITION
                            flex__block.addEventListener('mouseleave', function () {
                                flex.style.maxHeight = '154px'
                                positionRelativeTimeOut = setTimeout(() => {
                                    flex__block.style.position = 'relative'
                                    positionRelativeTimeOut = null
                                }, 300);
                            });
                    }
                }
            });
            handled = true
        }
        days__flex__block__handle()
    // HANDLING MODAL
        // TASK SHOW MODAL
            let task__show__modal = document.querySelector('.task__show__modal')
            task__show__modal.addEventListener('click', function (e) {
                if(e.target.classList.contains('task__show__modal'))
                {
                    task__show__modal.style.animation = 'disappear__opacity 0.5s forwards'
                    task__show__modal.querySelector('.task__show').style.animation = 'disappear__bottom 0.5s forwards'
                    setTimeout(() => {
                        task__show__modal.classList.remove('d-flex')
                        task__show__modal.classList.add('d-none')
                    }, 500);
                }
            })
            function update__task__shows()
            {
                let task__shows = document.querySelectorAll('.tasks__flex .task:not(.required), .days__flex .task')
                task__shows.forEach(task__show => {
                    task__show.addEventListener('click', task__show__modal__open)
                })
                task__shows[0].click()
            }
            function task__show__modal__open(e)
            {
                let task = e.currentTarget
                let taskData
                axios.post(`{{ route('task.getData') }}`,{id: task.attributes.task_id.value})
                .then(res => {
                    taskData = res.data
                    console.log(taskData)
                    task__show__modal.querySelector('.name').innerHTML = taskData.name
                    let priorities = task__show__modal.querySelectorAll('.priority__levels svg')
                    for (let i = 0; i < taskData.priority; i++) {
                        priorities[i].innerHTML = `
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c -1.398 0 -2.649 0.778 -3.268 2.031 L 29.959 27.911 c -0.099 0.2 -0.29 0.338 -0.51 0.37 L 3.122 32.107 c -1.383 0.201 -2.509 1.151 -2.941 2.48 c -0.432 1.329 -0.079 2.76 0.922 3.736 l 19.049 18.569 c 0.16 0.156 0.233 0.38 0.195 0.599 L 15.85 83.71 c -0.236 1.377 0.319 2.743 1.449 3.564 c 1.129 0.821 2.6 0.927 3.839 0.279 l 23.547 -12.381 c 0.098 -0.051 0.206 -0.077 0.314 -0.077 C 51.721 53.905 50.301 28.878 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,200,80); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c 1.398 0 2.649 0.778 3.268 2.031 l 11.773 23.856 c 0.099 0.2 0.29 0.338 0.51 0.37 l 26.326 3.826 c 1.383 0.201 2.509 1.151 2.941 2.48 c 0.432 1.329 0.079 2.76 -0.922 3.736 L 69.847 56.892 c -0.16 0.156 -0.233 0.38 -0.195 0.599 L 74.15 83.71 c 0.236 1.377 -0.319 2.743 -1.449 3.564 c -1.129 0.821 -2.6 0.927 -3.839 0.279 L 45.315 75.172 c -0.098 -0.051 -0.206 -0.077 -0.314 -0.077 C 37.08 54.593 38.849 29.395 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,220,100); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        `
                    }
                    let date = task__show__modal.querySelector('.date .text')
                    const options = {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    };
                    date.innerHTML = new Intl.DateTimeFormat('uk-UA', options).format(new Date(taskData.date));
                    date.innerHTML = date.innerHTML.replace(' р.', '').replace(/ (\d{4})/, ', $1');
                    let desc = task__show__modal.querySelector('.desc p')
                    if(taskData.desc.length == 0)
                    {
                        desc.innerHTML = 'Тут може бути ваш більш детальніший опис завдання або його перебігу'
                    } else
                    {
                        desc.innerHTML = taskData.desc
                    }
                    let goal = task__show__modal.querySelector('.goal .text')
                    goal.innerHTML = taskData.goal_name
                    task__show__modal.classList.add('d-flex')
                    task__show__modal.classList.remove('d-none')
                    task__show__modal.style.animation = 'appear__opacity 0.5s forwards'
                    task__show__modal.querySelector('.task__show').style.animation = 'appear__bottom 0.5s forwards'
                })
                .catch(err => {
                    console.error(err);
                })
            }
            update__task__shows()
        // TASK CREATE MODAL
            function task__create__modal__open(element)
            {
                // GET GOAL ID OF TASK WE WANT CREATE IN
                document.querySelector('.task__create__modal .task__goal_id').value = element.attributes.goal_id.value
                task__create__modal.classList.add('d-flex')
                task__create__modal.classList.remove('d-none')
                task__create__modal.style.animation = 'appear__opacity 0.5s forwards'
                task__create__modal.querySelector('.task__create').style.animation = 'appear__bottom 0.5s forwards'
            }
            let task__creates = document.querySelectorAll('.tasks__flex__block .task__create')
            task__creates.forEach(task__create => {
                task__create.addEventListener('click', function () {
                    task__create__modal__open(task__create)
                })
            });
            let task__create__modal = document.querySelector('.task__create__modal')
            task__create__modal.addEventListener('click', function (e) {
                if(e.target.classList.contains('task__create__modal'))
                {
                    task__create__modal.style.animation = 'disappear__opacity 0.5s forwards'
                    task__create__modal.querySelector('.task__create').style.animation = 'disappear__bottom 0.5s forwards'
                    setTimeout(() => {
                        task__create__modal.classList.remove('d-flex')
                        task__create__modal.classList.add('d-none')
                    }, 500);
                }
            })
            // PREVENTING FORM FROM SENDING IF VALIDATION
                let task__form = document.querySelector('.task__create__modal form')
                task__form.addEventListener('submit', function (e) {
                    if(!task__create__validation())
                    {
                        e.preventDefault()
                    }
                })
            // FORM VALIDATION FUNCTION
                function task__create__validation()
                {
                    let task__priority = document.querySelector('.task__create__modal .task__priority')
                    let task__name = document.querySelector('.task__create__modal .task__name')
                    let task__priority__error = document.querySelector('.task__create__modal .priority__error')
                    let task__name__error = document.querySelector('.task__create__modal .name__error')
                    if(!task__priority.value)
                    {
                        task__priority__error.innerHTML = `виберіть рівень приорітету`
                        return false
                    } else
                    {
                        task__priority__error.innerHTML = ``
                    }
                    if(task__name.value.length < 5)
                    {
                        task__name__error.innerHTML = `впишіть суть завдання`
                        return false
                    } else
                    {
                        task__name__error.innerHTML = ``
                    }
                    return true
                }
            // SUBMIT BUTTON HANDLING
                let task__create__submit = document.querySelector('.task__create .form-submit button')
                task__create__submit.addEventListener('mouseenter', function () {
                    if(!task__create__validation())
                    {
                        task__create__submit.setAttribute('disabled', '')
                    } else
                    {
                        task__create__submit.removeAttribute('disabled')
                    }
                })

            // ADDING TIPPIES
                tippy('.task__create__modal .priority__parent .flex', {
                    placement: 'right',
                    content: 'Виберіть',
                    sticky: true,
                    interactive: true,
                    hideOnClick: false,
                    delay: [0, 1000000000],
                })

                tippy('.task__create__modal .priority__hint', {
                    placement: 'top',
                    content: `Рівень пріоритету відображає важливість цього завдання для найшвидшого досягнення вашої мети. Рекомендуємо розглянути справжню вартість цього завдання для досягнення вашої цілі і наскільки воно вам допоможе.`,
                    hideOnClick: false,
                })
                tippy('.task__create__modal .name__hint', {
                    placement: 'top',
                    content: `Короткий опис суті вашого завдання: наприклад, вам потрібно прибрати в кімнаті (позбутися непотрібних речей та прибрати підлогу). Якщо ви хочете додати більше деталей, скористайтеся полем нижче.`,
                    hideOnClick: false,
                })
                tippy('.task__create__modal .desc__hint', {
                    placement: 'top',
                    content: `Введіть більш детальніший опис завдання (необов'язково), включаючи важливі деталі та кроки, які потрібно виконати.`,
                    hideOnClick: false,
                })

            // PRIORITY BAR HANDING
            let priority__flex = document.querySelector('.task__create__modal .priority__parent .flex')
            priority__flex._tippy.show()
            let priorities = document.querySelectorAll('.task__create__modal .priority')
            let selected = undefined
            let priority_levels = [
                "Можна зробити пізніше",
                "Бажано виконати",
                "Корисно зробити",
                "Потрібно зробити",
                "Надзвичайно важливо"
            ]
            priorities.forEach((priority, index) => {
                priority.addEventListener('click', function () {
                    priority.classList.add('selected')
                    selected = index
                    document.querySelector('.task__priority').value = index+1
                })
                priority.addEventListener('mouseover', function () {
                    priority__flex._tippy.setContent(priority_levels[index])
                    priorities.forEach(pp => {
                        pp.innerHTML = `
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        `
                    })
                    for (let i = 0; i <= index; i++) {
                        priorities[i].innerHTML = `
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c -1.398 0 -2.649 0.778 -3.268 2.031 L 29.959 27.911 c -0.099 0.2 -0.29 0.338 -0.51 0.37 L 3.122 32.107 c -1.383 0.201 -2.509 1.151 -2.941 2.48 c -0.432 1.329 -0.079 2.76 0.922 3.736 l 19.049 18.569 c 0.16 0.156 0.233 0.38 0.195 0.599 L 15.85 83.71 c -0.236 1.377 0.319 2.743 1.449 3.564 c 1.129 0.821 2.6 0.927 3.839 0.279 l 23.547 -12.381 c 0.098 -0.051 0.206 -0.077 0.314 -0.077 C 51.721 53.905 50.301 28.878 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,200,80); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c 1.398 0 2.649 0.778 3.268 2.031 l 11.773 23.856 c 0.099 0.2 0.29 0.338 0.51 0.37 l 26.326 3.826 c 1.383 0.201 2.509 1.151 2.941 2.48 c 0.432 1.329 0.079 2.76 -0.922 3.736 L 69.847 56.892 c -0.16 0.156 -0.233 0.38 -0.195 0.599 L 74.15 83.71 c 0.236 1.377 -0.319 2.743 -1.449 3.564 c -1.129 0.821 -2.6 0.927 -3.839 0.279 L 45.315 75.172 c -0.098 -0.051 -0.206 -0.077 -0.314 -0.077 C 37.08 54.593 38.849 29.395 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,220,100); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        `
                    }
                })
                priority.addEventListener('mouseleave', function () {
                    priorities.forEach(pp => {
                        pp.innerHTML = `
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 69.671 88.046 c -0.808 0 -1.62 -0.195 -2.37 -0.59 L 45 75.732 L 22.7 87.456 c -1.727 0.907 -3.779 0.757 -5.356 -0.388 c -1.577 -1.146 -2.352 -3.052 -2.023 -4.972 l 4.259 -24.832 L 1.539 39.678 c -1.396 -1.361 -1.889 -3.358 -1.287 -5.213 c 0.603 -1.854 2.176 -3.181 4.105 -3.461 l 24.932 -3.622 L 40.44 4.79 C 41.303 3.041 43.05 1.955 45 1.955 c 0 0 0 0 0.001 0 c 1.949 0 3.696 1.086 4.559 2.834 l 11.15 22.592 l 24.932 3.623 c 1.93 0.28 3.503 1.606 4.105 3.461 c 0.603 1.854 0.109 3.851 -1.287 5.213 L 70.419 57.264 l 4.26 24.832 c 0.329 1.921 -0.446 3.827 -2.023 4.972 C 71.764 87.717 70.721 88.046 69.671 88.046 z M 7.055 36.676 l 17.058 16.628 c 1.198 1.167 1.746 2.85 1.462 4.502 l -4.027 23.479 l 21.086 -11.086 c 1.481 -0.779 3.25 -0.779 4.732 0 l 21.085 11.086 l -4.027 -23.48 c -0.283 -1.649 0.264 -3.333 1.463 -4.501 l 17.058 -16.628 L 59.372 33.25 c -1.658 -0.242 -3.089 -1.282 -3.829 -2.783 L 45 9.106 L 34.457 30.468 c -0.74 1.5 -2.171 2.54 -3.827 2.782 L 7.055 36.676 z M 84.779 36.942 h 0.011 H 84.779 z M 44.18 7.444 c 0 0 0 0.001 0.001 0.002 L 44.18 7.444 C 44.18 7.445 44.18 7.445 44.18 7.444 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        `
                    });
                    if(selected || selected === 0)
                    {
                        priority__flex._tippy.setContent(priority_levels[selected])
                        for (let i = 0; i <= selected; i++) {
                            priorities[i].innerHTML = `
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c -1.398 0 -2.649 0.778 -3.268 2.031 L 29.959 27.911 c -0.099 0.2 -0.29 0.338 -0.51 0.37 L 3.122 32.107 c -1.383 0.201 -2.509 1.151 -2.941 2.48 c -0.432 1.329 -0.079 2.76 0.922 3.736 l 19.049 18.569 c 0.16 0.156 0.233 0.38 0.195 0.599 L 15.85 83.71 c -0.236 1.377 0.319 2.743 1.449 3.564 c 1.129 0.821 2.6 0.927 3.839 0.279 l 23.547 -12.381 c 0.098 -0.051 0.206 -0.077 0.314 -0.077 C 51.721 53.905 50.301 28.878 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,200,80); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 2.024 C 45 2.024 45 2.024 45 2.024 c 1.398 0 2.649 0.778 3.268 2.031 l 11.773 23.856 c 0.099 0.2 0.29 0.338 0.51 0.37 l 26.326 3.826 c 1.383 0.201 2.509 1.151 2.941 2.48 c 0.432 1.329 0.079 2.76 -0.922 3.736 L 69.847 56.892 c -0.16 0.156 -0.233 0.38 -0.195 0.599 L 74.15 83.71 c 0.236 1.377 -0.319 2.743 -1.449 3.564 c -1.129 0.821 -2.6 0.927 -3.839 0.279 L 45.315 75.172 c -0.098 -0.051 -0.206 -0.077 -0.314 -0.077 C 37.08 54.593 38.849 29.395 45 2.024 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,220,100); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            `
                        }
                    } else
                    {
                        priority__flex._tippy.setContent('Виберіть')
                    }
                })
            });

    // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        loader__parent.style.display = 'none'
        whole__content.style.animation = 'appear__opacity 0.5s forwards'

    // DRAGGING ELEMENTS
        let draggingElement = null
        function day__task__dragstart(e) {
            draggingElement = e.currentTarget
            if(e.currentTarget.parentElement.parentElement.classList.contains('days__flex__block'))
            {
                let flex = e.currentTarget.parentElement
                flex.querySelectorAll('.task').forEach(task => {
                    task.removeEventListener('dragover', day__task__dragover)
                    task.removeEventListener('dragleave', day__task__dragleave)
                    task.removeEventListener('drop', day__task__drop)
                });
            }
        }
        function day__task__dragover(e) {
            let task = e.currentTarget
            let flex = task.parentElement
            if(!task.classList.contains('dragging__underline'))
            {
                task.classList.add('dragging__underline')
            }
            if(!flex.querySelector('.task__preview'))
            {
                handle__new__task(flex, task, 0)
            }
        }
        function day__task__dragleave(e) {
            let task = e.currentTarget
            let flex = task.parentElement
            if(task && flex)
            {
                if(flex.querySelector('.task__preview'))
                {
                    flex.querySelector('.task__preview').remove()
                }
                task.classList.remove('dragging__underline')
            }
        }
        function day__task__drop(e) {
            let task = e.currentTarget
            let flex = task.parentElement
            handle__new__task(flex, task, 1)
            if(flex.querySelector('.task__preview'))
            {
                flex.querySelector('.task__preview').classList.remove('task__preview')
            }
            task.classList.remove('dragging__underline')
        }
        function updateDropAreas()
        {
            let draggableElements = document.querySelectorAll('.tasks__flex .task[has_day="0"], .days__flex .task')
            draggableElements.forEach(draggable => {
                draggable.setAttribute('draggable', 'true')
                draggable.addEventListener('dragstart', day__task__dragstart)
            });
            let dropAreas = document.querySelectorAll('.days__flex__block')
            dropAreas.forEach(dropArea => {
                let flex = dropArea.querySelector('.flex')
                dropArea.querySelectorAll('.task').forEach(task => {
                    task.addEventListener('dragover', day__task__dragover)
                    task.addEventListener('dragleave', day__task__dragleave)
                    task.addEventListener('drop', day__task__drop)
                });
                dropArea.addEventListener('dragover', function (e) {
                    e.preventDefault();
                    dropArea.dispatchEvent(new MouseEvent('mouseenter'))
                })
                dropArea.addEventListener('dragleave', function (e) {
                    if(e.target.classList.contains('days__flex__block'))
                    {
                        dropArea.dispatchEvent(new MouseEvent('mouseleave'))
                    }
                })
            });
        }
        updateDropAreas()
})

// ADDITIONAL FUNCTIONS

    // SCROLLING TEXT FOR TASKS WHICH YOU`RE HOVERED ON + CURSOR IF IT`S NOT REPLACED
        function updateScrollingText()
        {
            let tasks = document.querySelectorAll('.tasks__flex__block .task, .days__flex__block .task')
            tasks.forEach(task => {
                if(task.parentElement.parentElement.classList.contains('tasks__flex__block') && task.querySelector('.replace'))
                {
                    task.style.cursor = 'grab'
                } else {
                    task.style.cursor = 'pointer'
                }
                task.querySelector('.scrolling__parent p').setAttribute('default_text', task.querySelector('.scrolling__parent p').innerHTML)
                task.addEventListener('mouseover', function () {
                    let scrolling__text = task.querySelector('.scrolling__parent p')
                    if(scrolling__text.offsetWidth > 196)
                    {
                        scrolling__text.innerHTML = scrolling__text.attributes.default_text.value+scrolling__text.attributes.default_text.value
                        scrolling__text.style.animation = 'scroll-text 5s linear infinite'
                    }
                })
                task.addEventListener('mouseleave', function () {
                    let scrolling__text = task.querySelector('.scrolling__parent p')
                    if(scrolling__text.offsetWidth > 196)
                    {
                        scrolling__text.style.animation = ''
                    }
                })
            });
        }
        updateScrollingText()
    // GET DAY NAME
        function getDayName(dayNumber) {
            const date = new Date();
            const currentDay = date.getDay()
            const offset = (currentDay === 0 ? 7 : currentDay) - 1
            date.setDate(date.getDate() - offset + (dayNumber - 1));
            return date.toLocaleDateString('uk-UA', { weekday: 'long' });
        }
    // IS IT TODAY OR 4 DAYS LATER
        function isWithinFiveDays(dateString) {
            let givenDate = new Date(dateString);
            let today = new Date();
            today.setHours(0, 0, 0, 0); // Reset to midnight for accurate comparison

            let fiveDaysLater = new Date(today);
            fiveDaysLater.setDate(today.getDate() + 5); // Calculate date 5 days later

            return givenDate >= today && givenDate <= fiveDaysLater;
        }
    // FIX IMAGES` VIEW
        function fixImage(element)
        {
            let width = element.naturalWidth;
            let height = element.naturalHeight;
            if(width > height)
            {
                element.style.cssText = `height: 239px;`
            } else
            {
                element.style.cssText = `width: 239px;`
            }
        }

    // SMOOTH SCROLLING FUNCTIONS
        let isScrolling = false

        function isElementFullyVisible(container, element) {
            const containerRect = container.getBoundingClientRect();
            const elementRect = element.getBoundingClientRect();

            const fullyVisibleVertically = elementRect.top >= containerRect.top && elementRect.bottom <= containerRect.bottom;
            const fullyVisibleHorizontally = elementRect.left >= containerRect.left && elementRect.right <= containerRect.right;

            return fullyVisibleVertically && fullyVisibleHorizontally;
        }

        function scrollElementIntoView(container, element) {
            const containerRect = container.getBoundingClientRect();
            const elementRect = element.getBoundingClientRect();

            const containerScrollTop = container.scrollTop;
            const containerScrollLeft = container.scrollLeft;

            document.querySelectorAll('.tasks__flex__block').forEach(flex__block => {
                flex__block.style.position = 'relative'
                flex__block.style.marginLeft = '0'
            });

            if (elementRect.left < containerRect.left) {
                container.scrollLeft = containerScrollLeft - (containerRect.left - elementRect.left);
            } else if (elementRect.right > containerRect.right) {
                container.scrollLeft = containerScrollLeft + (elementRect.right - containerRect.right);
            }
        }

        function handleSmoothScroll(scrollBlock) {
            let targetScrollLeft = 0
            let currentScrollLeft = 0

            function smoothScroll() {
                if (isScrolling) {


                    document.querySelectorAll('.tasks__flex__block').forEach(flex__block => {
                        flex__block.querySelector('.flex').style.transition = '0'
                        if(flex__block.querySelector('.image'))
                        {
                            flex__block.querySelector('.image').style.transition = '0'
                            flex__block.querySelector('.image').style.bottom = (154+flex__block.querySelector('.title').offsetHeight+25)+'px'
                        }
                        flex__block.querySelector('.flex').style.maxHeight = '154px'
                        flex__block.style.position = 'relative'
                        flex__block.style.marginLeft = '0'
                        flex__block.querySelector('.flex').style.transition = '0.3s'
                        if(flex__block.querySelector('.image'))
                        {
                            flex__block.querySelector('.image').style.transition = '0.3s'
                        }
                    });

                    const scrollDiff = targetScrollLeft - currentScrollLeft

                    if (Math.abs(scrollDiff) < 1) {
                        isScrolling = false
                        return
                    }

                    currentScrollLeft += scrollDiff * 0.1
                    scrollBlock.scrollLeft = currentScrollLeft

                    requestAnimationFrame(smoothScroll)
                }
            }

            scrollBlock.addEventListener('wheel', function(e) {
                e.preventDefault()

                targetScrollLeft += e.deltaY

                targetScrollLeft = Math.max(0, Math.min(targetScrollLeft, scrollBlock.scrollWidth - scrollBlock.clientWidth))

                if (!isScrolling) {
                    isScrolling = true
                    currentScrollLeft = scrollBlock.scrollLeft
                    smoothScroll()
                }
            })
        }
    // APPEND AFTER
        function appendAfter(newElement, targetElement) {
            const parent = targetElement.parentNode;

            if (parent.lastChild === targetElement) {
                parent.appendChild(newElement);
            } else {
                parent.insertBefore(newElement, targetElement.nextSibling);
            }
        }


</script>

@endsection
