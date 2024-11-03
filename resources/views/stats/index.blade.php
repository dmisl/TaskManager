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
                <a class="left__part__back" href="{{ route('home.index') }}">
                    <img src="{{ asset('storage/images/back.png') }}" alt="">
                    <p>назад</p>
                </a>
            </div>
            <div class="right__part">
                <h1 class="right__part__title">Історія моїх успіхів</h1>
                <div class="d-flex">

                    <div class="left">

                        <h3 class="total__result">Загальна оцінка: <span class="result">9.6</span></h3>
                        <div class="graph__parent">
                            <canvas class="canvas" width="252" height="252"></canvas>
                        </div>

                        <div class="details">
                            <p>Детальніше:</p>
                            <div class="d-flex flex-column text-center">
                                <a class="element" href=""><p>Загальна статистика</p></a>
                                <a class="element" href=""><p>Обов'язкові завдання</p></a>
                                <a class="element" href=""><p>Високоприорітетні завдання</p></a>
                                <a class="element" href=""><p>Низькоприорітетні завдання</p></a>
                            </div>
                        </div>

                    </div>
                    <div class="right">

                        <h1>Результати моїх тижнів</h1>

                        <div class="d-flex" id="custom__scrollbar__small">

                            @foreach ($weeks as $week)
                                <a class="item">
                                    <div class="background"></div>
                                    <img src="{{ asset('storage/images/stats.jpg') }}" alt="">
                                    <h1><span class="grade">{{ $week->result == 0 ? '0.0' : $week->result }}</span><br><span class="start_end">{{ date('d.m', strtotime($week->start)) }} - {{ date('d.m', strtotime($week->end)) }}</span></h1>
                                </a>
                            @endforeach

                        </div>

                        <a class="more">дізнатися більше на рахунок системи оцінювання</a>

                    </div>

                </div>
            </div>
        </div>
    </div>

<script>

    window.addEventListener('load', function () {

        // CHART

            let result = document.querySelector('.total__result .result')
            result.innerText = ({{ $high_avg }}*0.3+{{ $low_avg }}*0.1+{{ $required_avg }}*0.4+{{ $tasks_avg }}*0.2-{{ $transferred_avg }}*0.1).toFixed(1)
            let result_color
            if(result.innerText >= 7)
            {
                result_color = 'rgba(73, 255, 67, 0.8)'
            } else if (result.innerText >= 4)
            {
                result_color = 'rgba(35, 123, 255, 0.8)'
            } else
            {
                result_color = 'rgba(255, 35, 35, 0.8)'
            }
            result.style.color = result_color

            const data = {
                labels: ["high", "low", "required", "overall", "late"],
                datasets: [{
                    fill: true,
                    borderColor: 'transparent',
                    backgroundColor: result_color,
                    pointBackgroundColor: 'rgba(255, 255, 255, 1)',
                    pointBorderColor: 'black',
                    pointBorderWidth: 1,
                    data: [{{ $high_avg }}, {{ $low_avg }}, {{ $required_avg }}, {{ $tasks_avg }}, {{ $transferred_avg }}]
                }]
            };

            const options = {
                startAngle: 20,
                legend: {
                    display: false
                },
                elements: {
                    line: {
                    tension: 0.5,
                    }
                },
                tooltips: {
                    enabled: true,
                    animating: true
                },
                scale: {
                    gridLines: {
                    circular: true,
                    color: "rgba(255, 255, 255, 0.1)",
                    offsetGridLines: true,
                    lineWidth: 10
                    },
                    ticks: {
                    beginAtZero: true,
                    maxTicksLimit: 10,
                    min: 1,
                    max: 10,
                    display: false,
                    },
                    angleLines: {
                    display: true,
                    lineWidth: 1,
                    color: "rgba(255, 255, 255, 0.5)",
                    },
                    pointLabels: {
                    display: true,
                    fontSize: 14,
                    fontStyle: '400',
                    fontColor: "black",
                    }
                }
            };

            window.chart = new Chart(document.querySelector("canvas"), {
                type: "radar",
                options: options,
                data: data
            });

        // BLOCKS

        let flex = document.querySelector('.right__part .right .d-flex')
        if(flex.children.length < 6)
        {
            fill(flex)
        }
        let grade
        for (let i = 0; i < flex.children.length; i++) {
            grade = flex.children[i].querySelector('.grade')
            if(grade)
            {
                if(grade.innerText >= 7)
                {
                    grade.style.color = '#70FE85'
                } else if (grade.innerText >= 4)
                {
                    grade.style.color = '#8E98FF'
                } else
                {
                    grade.style.color = '#FF1818'
                }
            }
        }

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.animation = 'appear__opacity 0.5s forwards'

    })

    let handled = false

    function fill(flex)
    {
        if(flex.children.length < 4)
        {
            let blank = document.createElement('div')
            blank.classList.add('blank')
            flex.append(blank)
            handled = true
            fill(flex)
        } else if (flex.children.length < 6)
        {
            let blank_small = document.createElement('div')
            blank_small.classList.add('blank_small')
            flex.append(blank_small)
            fill(flex)
        }
    }

</script>

@endsection
