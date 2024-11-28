@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    {{-- INTERACTIVE MENU (RMB) --}}
    <div class="some__menu d-none">
        <p class="guide">{{ __('goal.guide') }}</p>
        <a class="stats" href="{{ route('stats.index') }}">{{ __('goal.statistics') }}</a>
        <p class="settings">{{ __('goal.settings') }}</p>
        <p class="delete">{{ __('main.delete') }}</p>
    </div>

    {{-- MENU OF LEFT --}}
    <x-menu></x-menu>

    {{-- VISIBLE CONTENT --}}
    <div class="content__container__parent">
        <div class="moved__container">
            <div class="left__part">
                <a class="left__part__back" href="{{ route('home.index') }}">
                    <img src="{{ asset('storage/images/back.png') }}" alt="">
                    <p>{{ __('main.back') }}</p>
                </a>
            </div>
            <div class="right__part">
                <h1 class="right__part__title">{{ __('goal.my_goal_list') }}</h1>
                <div class="right__part__hint">
                    <p>{{ __('goal.right_click_to_highlight_the_menu') }}</p>
                </div>
                <div class="flex" id="custom__scrollbar">
                    <a href="{{ route('goal.create') }}" class="flex__block goal__create">
                        <img src="{{ asset('storage/images/new goal.jpg') }}" alt="">
                        <div class="hidden__block">
                            <p style="color: white;">{{ __('goal.create_new_goal') }}</p>
                        </div>
                    </a>
                    @foreach ($goals as $goal)
                        <a href="{{ route('goal.show', [$goal->id]) }}" goal_id="{{ $goal->id }}" class="flex__block">
                            <div class="img__parent">
                                <img src="{{ $goal->image }}" alt="">
                            </div>
                            <div class="hidden__content">
                                <p>{{ $goal->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL GOAL EDIT --}}
        <div class="edit__modal__parent d-none">
            <div class="goal__create">
                <div class="back__parent">
                    <a class="back">
                        <img src="{{ asset('storage/images/back.png') }}" alt="">
                        <p>{{ __('main.back') }}</p>
                    </a>
                </div>
                <div class="preview__parent">
                    <div class="preview">
                        <div class="hidden__content">
                            <p>{{ __('goal.goal_essence') }}</p>
                        </div>
                        <div class="img__parent">
                            <img src="{{ asset('storage/images/empty.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="freepick__parent">
                    <div class="freepick">
                        <div class="freepick__content">
                            <h2>{{ __('goal.change_the_background_image') }}</h2>
                            <div class="freepick__flex">
                                <div class="loader__mini__parent">
                                    <div class="loader__mini"></div>
                                </div>
                                <div class="freepick__image__parent">
                                    <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                                    <div><p>{{ __('goal.change') }}</p></div>
                                </div>
                                <div class="freepick__image__parent">
                                    <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                                    <div><p>{{ __('goal.change') }}</p></div>
                                </div>
                                <div class="freepick__image__parent">
                                    <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                                    <div><p>{{ __('goal.change') }}</p></div>
                                </div>
                                <div class="freepick__image__parent">
                                    <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                                    <div><p>{{ __('goal.change') }}</p></div>
                                </div>
                            </div>
                            <p class="freepick__load">{{ __('goal.load_other_options') }}</p>
                        </div>
                    </div>
                </div>
                <h1>{{ __('goal.goal_editing') }} 🎯</h1>
                <div class="form">
                    <div class="form-item">
                        <div class="label__icon">
                            <p>{{ __('goal.goal_essence') }}</p>
                            <svg class="name__hint" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <input name="name" type="text" class="form-control" placeholder="Знайти роботу">
                        <div class="error input__error">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="label__icon">
                            <p>{{ __('goal.number_of_tasks') }}</p>
                            <svg class="tasks__hint" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <select name="tasks_number" class="form-select form-select-lg" aria-label="Large select example">
                            <option value="2">2</option>
                            <option selected value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <div class="error select__error">
                            <p></p>
                        </div>
                    </div>
                    <div class="form-item">
                        <div class="label__icon">
                            <p>{{ __('goal.preferred_end_date') }}</p>
                            <svg class="date__hint" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                    <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <input name="end_date" class="form-control" type="date">
                        <div class="error date__error">
                            <p></p>
                        </div>
                    </div>
                    <input class="input__image" type="hidden" name="image">
                    <div class="form-button-parent">
                        <button class="btn btn-lg rounded-5" style="background-color: rgb(60, 255, 60);">{{ __('main.save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- MODAL GOAL DELETE --}}
        <div class="delete__modal d-none">
            <h3>{{ __('goal.are_you_sure_you_want_to_delete_this_goal') }}</h3>
            <p>{{ __('goal.all_tasks_and_statistics_associated_with_it_will_be_permanently_deleted') }}</p>
            <div class="flex">
                <div class="yes">
                    <p>{{ __('main.yes') }}</p>
                </div>
                <div class="no">
                    <p>{{ __('main.no') }}</p>
                </div>
            </div>
        </div>
    {{-- MODAL GOAL GUIDE --}}
    <div class="guide__modal__parent d-none">
        {{-- MODAL --}}
        <div class="guide__modal">
            <div class="d-flex">
                {{-- LEFT PART --}}
                <div class="left">
                    <div class="title__parent">
                        <div class="d-flex">
                            <h1>{{ __('goal.quick_start') }}</h1>
                            <img src="{{ asset('storage/images/rocket.png') }}">
                        </div>
                        <h3>{{ __('goal.make_your_path_to_your_goal_easier_with') }} <span>Task Buddy</span></h3>
                    </div>
                    <div class="elements__parent">
                        <div class="element__parent">
                            <div class="element">
                                <div class="title">{{ __('goal.how_do_i_create_new_goal_in_task_buddy') }}</div>
                                <div class="desc__parent">
                                    <div class="desc">
                                        {{ __('goal.how_do_i_create_desc') }}
                                    </div>
                                    <div class="blur">
                                        <div class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="element__parent">
                            <div class="element">
                                <div class="title">{{ __('goal.how_do_i_track_my_progress_in_task_buddy') }}</div>
                                <div class="desc__parent">
                                    <div class="desc">
                                        {{ __('goal.how_do_i_track_desc') }}
                                    </div>
                                    <div class="blur">
                                        <div class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- JUST FOR VIEW (LINE BETWEEN LEFT AND RIGHT BLOCK) --}}
                <div class="middle"></div>
                <div class="right">
                    <div class="elements__parent">
                        <div class="element__parent">
                            <div class="element">
                                <div class="title">{{ __('goal.how_do_i_edit_my_goals') }}</div>
                                <div class="desc__parent">
                                    <div class="desc">
                                        {{ __('goal.how_do_i_edit_my_goals_desc') }}
                                    </div>
                                    <div class="blur">
                                        <div class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="element__parent">
                            <div class="element">
                                <div class="title">{{ __('goal.how_do_i_add_a_task_to_a_goal') }}</div>
                                <div class="desc__parent">
                                    <div class="desc">
                                        {{ __('goal.how_do_i_add_a_task_to_a_goal_desc') }}
                                    </div>
                                    <div class="blur">
                                        <div class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="element__parent">
                            <div class="element">
                                <div class="title">{{ __('goal.how_does_task_buddy_help_you_stay_disciplined') }}</div>
                                <div class="desc__parent">
                                    <div class="desc">
                                        {{ __('goal.how_does_task_buddy_help_you_stay_disciplined_desc') }}
                                    </div>
                                    <div class="blur">
                                        <div class="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="21" height="21" viewBox="0 0 256 256" xml:space="preserve">
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 90 24.25 c 0 -0.896 -0.342 -1.792 -1.025 -2.475 c -1.366 -1.367 -3.583 -1.367 -4.949 0 L 45 60.8 L 5.975 21.775 c -1.367 -1.367 -3.583 -1.367 -4.95 0 c -1.366 1.367 -1.366 3.583 0 4.95 l 41.5 41.5 c 1.366 1.367 3.583 1.367 4.949 0 l 41.5 -41.5 C 89.658 26.042 90 25.146 90 24.25 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- RIGHT PART --}}
            </div>
            <img class="close" src="{{ asset('storage/images/close.png') }}">
        </div>
    </div>

<script defer>

    function fixImage(element)
    {
        let width = element.naturalWidth;
        let height = element.naturalHeight;
        if(width > height)
        {
            element.style.cssText = `height: 100%;`
        } else
        {
            element.style.cssText = `width: 100%;`
        }
    }

    window.onload = function() {

        // TASK BLOCKS HANDLING
            let flex__blocks = document.querySelectorAll('.flex__block')
            if(flex__blocks.length == 4)
            {
                flex__blocks.forEach(block => {
                    block.classList.remove('flex__block')
                    block.classList.add('bigger__flex__block')
                })
            } else if(flex__blocks.length < 7)
            {
                document.querySelector('.flex').style.overflow = 'visible'
                flex__blocks.forEach(flex__block => {
                    flex__block.classList.add('shadow')
                });
            } else
            {
                document.querySelector('.flex').style.overflow = 'auto'
                flex__blocks.forEach(flex__block => {
                    flex__block.classList.remove('shadow')
                });
            }

            document.querySelectorAll('.flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create)').forEach(block => {
                block.addEventListener('mouseenter', () => {
                    document.querySelector('.right__part__hint p').classList.add('active');
                });

                block.addEventListener('mouseleave', () => {
                    document.querySelector('.right__part__hint p').classList.remove('active');
                });
            });
        // RIGHT MOUSE CLICK MENU HANDLING
            let contextMenu = document.querySelector(".some__menu");
            document.addEventListener("click", function (e) {
                if (!contextMenu.contains(e.target)) {
                    context__menu__close()
                }
            });
            let current__block
            function context__menu__open(e)
            {
                if(e.currentTarget.classList.contains('flex__block') || e.currentTarget.classList.contains('bigger__flex__block'))
                {
                    // HANDLING GOAL BLOCK WHICH WAS CLICKED ON
                    let block = e.currentTarget
                    current__block = block
                    // OPENING INTERACTIVE MODAL
                    let mouseX = e.clientX || e.touches[0].clientX;
                    let mouseY = e.clientY || e.touches[0].clientY;
                    let menuHeight = contextMenu.getBoundingClientRect().height;
                    let menuWidth = contextMenu.getBoundingClientRect().width;
                    let width = window.innerWidth;
                    let height = window.innerHeight;
                    contextMenu.style.left = mouseX + "px";
                    contextMenu.style.top = mouseY - 226 + "px";
                    contextMenu.classList.remove('d-none');
                    contextMenu.classList.add('d-block');
                }
            }
            function context__menu__close()
            {
                contextMenu.classList.add('d-none');
                contextMenu.classList.remove('d-block');
            }
            let deleteGoal = contextMenu.querySelector('.delete')
            let delete__modal = document.querySelector('.delete__modal')
            // DELETE MODAL
            deleteGoal.addEventListener('click', function () {
                delete__modal.classList.remove('d-none')
                let top = parseInt(current__block.getBoundingClientRect().y) + current__block.offsetHeight + 17
                let left = parseInt(current__block.getBoundingClientRect().x) - (current__block.offsetWidth/2)
                if(current__block.classList.contains('bigger__flex__block'))
                {
                    left = parseInt(current__block.getBoundingClientRect().x) - (current__block.offsetWidth/4) - 20
                }
                delete__modal.style.left = left+'px'
                delete__modal.style.top = top+'px'
                context__menu__close()
                document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                    block.removeEventListener('contextmenu', context__menu__open, { passive: false } )
                });
            })
            delete__modal.querySelector('.yes').addEventListener('click', () => {
                axios.post(`{{ route('goal.delete') }}`,{goal_id: current__block.attributes.goal_id.value})
                .then(res => {
                    create__alert('Сповіщення', 'Ціль і всі її завдання були успішно видалені')
                    delete__modal.classList.add('d-none')
                    current__block.remove()
                    document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                        block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                    })
                })
                .catch(err => {
                    console.error(err);
                })

            })
            delete__modal.querySelector('.no').addEventListener('click', () => {
                delete__modal.classList.add('d-none')
                document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                    block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                });
            })
            document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                block.addEventListener('contextmenu', (e) => {e.preventDefault()})
            });

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
            let loader__parent = document.querySelector('.loader__parent')
            loader__parent.style.display = 'none'
            let whole__content = document.querySelector('.whole__content')
            whole__content.style.animation = 'appear__opacity 0.5s forwards'
            if(flex__blocks.length == 4)
            {
                let flexy = document.querySelector('.right__part .flex')
                flexy.style.paddingBottom = '0'
                flexy.style.justifyContent = 'center'
                flexy.style.overflow = 'visible'
            }
            let images = document.querySelectorAll('.right__part img')
            images.forEach(image => {
                fixImage(image)
            });

        // EDITING MODAL HANDLING
            let settings = contextMenu.querySelector('.settings')
            settings.addEventListener('click', edit__modal__open)
            let edit__modal = document.querySelector('.edit__modal__parent')
            function edit__modal__open()
            {
                axios.post(`{{ route('goal.getData') }}`,{goal_id: current__block.attributes.goal_id.value})
                .then(res => {
                    edit__modal.classList.add('d-flex')
                    edit__modal.classList.remove('d-none')
                    let back__parent = document.querySelector('.back__parent')
                    edit__modal.querySelector('input[name="name"]').value = res.data.name
                    edit__modal.querySelector('.preview__parent .preview .hidden__content p').innerText = res.data.name
                    edit__modal.querySelector('.preview img').src = res.data.image
                    edit__modal.querySelector('input[name="end_date"]').value = res.data.end_date
                    for (let i = 0; i < edit__modal.querySelector('select').children.length; i++) {
                        if(edit__modal.querySelector('select').children[i].hasAttribute('selected'))
                        {
                            edit__modal.querySelector('select').children[i].removeAttribute('selected')
                        }
                        if(edit__modal.querySelector('select').children[i].value == res.data.tasks_number)
                        {
                            edit__modal.querySelector('select').children[i].setAttribute('selected', '')
                        }
                    }
                    edit__modal.classList.add('d-flex')
                    edit__modal.classList.remove('d-none')
                    edit__modal.style.animation = 'appear__opacity 0.5s forwards'
                    edit__modal.querySelector('.goal__create').style.animation = 'appear__bottom 0.5s forwards'
                })
                .catch(err => {
                    console.error(err);
                })
            }
            function edit__modal__close()
            {
                edit__modal.style.animation = 'disappear__opacity 0.5s forwards'
                edit__modal.querySelector('.goal__create').style.animation = 'disappear__bottom 0.5s forwards'
                setTimeout(() => {
                    edit__modal.classList.remove('d-flex')
                    edit__modal.classList.add('d-none')
                }, 500);
            }
            edit__modal.querySelector('button').addEventListener('click', function () {
                let name = edit__modal.querySelector('input[name="name"]').value
                let tasks_number = edit__modal.querySelector('select').value
                let date = edit__modal.querySelector('input[type="date"]').value
                let image = edit__modal.querySelector('.preview img').src
                axios.post(`{{ route('goal.update') }}`,{name: name, tasks_number: tasks_number, end_date: date, image: image, goal_id: current__block.attributes.goal_id.value})
                .then(res => {
                    current__block.querySelector('img').src = image
                    current__block.querySelector('.hidden__content p').innerText = name
                    create__alert('Сповіщення', `Оновлені дані цілі <br><b>"${name}"</b><br> були успішно збережені`)
                    edit__modal__close()
                })
                .catch(err => {
                    console.error(err);
                })
            })
            edit__modal.querySelector('.back__parent p').style.color = 'white'
            edit__modal.querySelector('.back').addEventListener('click', edit__modal__close)
        // GUIDE MODAL HANDLING
        let guide = contextMenu.querySelector('.guide')
        let guide__modal__parent = document.querySelector('.guide__modal__parent')
        let guide__modal = document.querySelector('.guide__modal')
        guide.addEventListener('click', function () {
            guide__modal__parent.classList.add('d-flex')
            guide__modal__parent.classList.remove('d-none')
            guide__modal__parent.style.animation = 'appear__opacity 0.5s forwards'
            guide__modal.style.animation = 'appear__bottom 0.5s forwards'
        })
        function guide__modal__close(e)
        {
            if(e.target.classList.contains('guide__modal__parent') || e.target.classList.contains('close'))
            {
                guide__modal__parent.style.animation = 'disappear__opacity 0.5s forwards'
                guide__modal.style.animation = 'disappear__bottom 0.5s forwards'
                setTimeout(() => {
                    guide__modal__parent.classList.remove('d-flex')
                    guide__modal__parent.classList.add('d-none')
                }, 500);
            }
        }
        guide__modal__parent.addEventListener('click', guide__modal__close)

    };

    // SCRIPT NEEDED VARIABLES
    let route__getImages = `{{ route('home.getImages') }}`
    let asset = `{{ asset('storage/images/') }}`

</script>

@vite('resources/js/goalCreate.js')

@endsection
