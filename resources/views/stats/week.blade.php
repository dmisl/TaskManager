@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')
@vite('resources/css/stats.css')

@endsection

@section('content')

    {{-- MENU OF LEFT --}}
    <x-menu></x-menu>

    {{-- VISIBLE CONTENT --}}
    <div class="content__container__parent">
        <div class="moved__container">
            <div class="left__part">
                <a class="left__part__back" href="{{ route('stats.index') }}">
                    <img src="{{ asset('storage/images/back.png') }}" alt="">
                    <p>{{ __('main.back') }}</p>
                </a>
            </div>
            <div class="right__part">
                <h1 class="right__part__title">{{ __('stats.story_of_my_success') }}</h1>
                
                <canvas class="graph" width="400"></canvas>

            </div>
        </div>
    </div>

<script>

    window.addEventListener('load', function () {

        // CHART
        const ctx = document.querySelector('.graph').getContext('2d');

        const config = {
        type: 'line',
        data: {
            labels: [`{{ __('stats.monday') }}`, `{{ __('stats.tuesday') }}`, `{{ __('stats.wednesday') }}`, `{{ __('stats.thursday') }}`, `{{ __('stats.friday') }}`, `{{ __('stats.saturday') }}`, `{{ __('stats.sunday') }}`],
            datasets: [
            {
                type: 'line',
                label: `{{ __('stats.no_of_high-pri_tasks') }}`,
                data: [3, 2, 2, 1, 5, 6, 3],
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4
            },
            {
                type: 'line',
                label: `{{ __('stats.no_of_completed_high-pri_tasks') }}`,
                data: [1, 3, 4, 2, 8, 4, 5],
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
                tension: 0.4
            }
            ]
        },
        options: {
            responsive: true,
            scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
            }
        }
        };

        // Create the chart with the configuration above
        const myMixedChart = new Chart(ctx, config);

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.animation = 'appear__opacity 0.5s forwards'

    })

</script>

@endsection
