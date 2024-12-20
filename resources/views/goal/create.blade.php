@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    {{-- <home-parent asset="{{ asset('storage/') }}"></home-parent> --}}

    <div class="content__container__parent">
        <div class="goal__create">
            <a href="{{ route('goal.index') }}" class="back">
                <img src="{{ asset('storage/images/back.png') }}" alt="">
                <p>{{ __('main.back') }}</p>
            </a>
            <div class="preview">
                <div class="hidden__content">
                    <p>{{ __('goal.goal_essence') }}</p>
                </div>
                <div class="img__parent">
                    <img src="{{ asset('storage/images/empty.jpg') }}" alt="">
                </div>
            </div>
            <div class="freepick">
                <div class="freepick__content">
                    <h2>{{ __('goal.change_the_background_image') }}</h2>
                    <div class="freepick__flex">
                        <div class="loader__mini__parent">
                            <div class="loader__mini"></div>
                        </div>
                        <div class="freepick__image__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            <div><p>{{ __('goal.choose') }}</p></div>
                        </div>
                        <div class="freepick__image__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            <div><p>{{ __('goal.choose') }}</p></div>
                        </div>
                        <div class="freepick__image__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            <div><p>{{ __('goal.choose') }}</p></div>
                        </div>
                        <div class="freepick__image__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            <div><p>{{ __('goal.choose') }}</p></div>
                        </div>
                    </div>
                    <p class="freepick__load">{{ __('goal.load_other_options') }}</p>
                </div>
            </div>
            <h1>{{ __('goal.goal_creation') }} 🎯</h1>
            <form class="form" action="{{ route('goal.create') }}" method="POST">
                @csrf
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
                    <input name="name" type="text" class="form-control" placeholder="Find a job">
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
                    <button type="submit" class="btn btn-primary btn-lg rounded-5">{{ __('main.create') }}</button>
                </div>
            </form>
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

    let route__getImages = `{{ route('home.getImages') }}`
    let asset = `{{ asset('storage/images/') }}`

    // TRANSLATIONS
    let goal_essence_desc = @json(__('goal.goal_essence_desc'));
    let number_of_tasks_desc = @json(__('goal.number_of_tasks_desc'));
    let date_desc = @json(__('goal.date_desc'));
    let choose_translation = @json(__('goal.choose'));
    let selected_translation = @json(__('goal.selected'));
    let goal_essence_translation = @json(__('goal.goal_essence'));
    let min_5_characters = @json(__('goal.min_5_characters'));
    let the_preferred_completion_date_of_the_goal_cannot_be_less_than_today = @json(__('goal.the_preferred_completion_date_of_the_goal_cannot_be_less_than_today'))

</script>

@vite('resources/js/goalCreate.js')

@endsection
