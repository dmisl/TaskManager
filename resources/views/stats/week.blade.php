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
                    <p>назад</p>
                </a>
            </div>
            <div class="right__part">
                <h1 class="right__part__title">Історія моїх успіхів</h1>
                
                <canvas class="graph" style="width: 400px;"></canvas>

            </div>
        </div>
    </div>

<script>

    window.addEventListener('load', function () {

        // CHART
        const ctx = document.querySelector('.graph').getContext('2d');

        // Define the chart configuration
        const config = {
        type: 'line', // Base chart type; each dataset can still specify its type.
        data: {
            labels: ['Понеділок', 'Вівторок', 'Середа', 'Четвер', `П'ятниця`, 'Субота', 'Неділя'],
            datasets: [
            {
                type: 'line',
                label: 'К-сть високоприорі. завдань',
                data: [3, 2, 2, 1, 5, 6, 3], // Data points for the first line
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: false, // Line only with no fill
                tension: 0.4 // Smoothing for the line
            },
            {
                type: 'line', // Type for the second dataset
                label: 'К-сть виконаних вис. завдань',
                data: [1, 3, 4, 2, 8, 4, 5], // Data points for the second line
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
                tension: 0.4 // Smoothing for the second line
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
