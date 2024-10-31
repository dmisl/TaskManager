@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')
@vite('resources/css/stats.css')

@endsection

@section('content')

    {{-- INTERACTIVE MENU (RMB) --}}
    <div class="some__menu d-none">
        <p class="guide">Гайд</p>
        <p class="stats">Статистика</p>
        <p class="settings">Налаштування</p>
        <p class="delete">Видалити</p>
    </div>

    {{-- MENU OF LEFT --}}
    <div class="menu__parent">
        <div class="menu">
            <div class="card shadow">
                <a href="#goals" class="menu__element yellow__background goals"><p>Мої цілі</p></a>
                <a href="#tasks" class="menu__element green__background tasks"><p>Сьогоднішні завдання</p></a>
                <a href="#week" class="menu__element blue__background week"><p>Мій тиждень</p></a>
                <a href="#completed" class="menu__element red__background completed"><p>Виконані завдання</p></a>
                <a href="#settings" class="menu__element grey__background settings"><p>Налаштування</p></a>
                <a href="#logout" class="menu__element black__background logout"><p>Вийти з системи</p></a>
                <p class="hint">спробуй</p>
            </div>
        </div>
    </div>

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

                        <h3 class="total__result">Загальна оцінка: <span>9.6</span></h3>
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

                            <div class="item"></div>
                            <div class="item"></div>
                            <div class="item"></div>
                            <div class="item"></div>
                            <div class="item" style="height: 79px;"></div>
                            <div class="item" style="height: 79px;"></div>
                            <div class="item" style="height: 79px;"></div>

                        </div>

                        <a class="more">дізнатися більше на рахунок системи оцінювання</a>

                    </div>

                </div>
            </div>
        </div>
    </div>

<script>

    window.addEventListener('load', function () {
        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.animation = 'appear__opacity 0.5s forwards'
        const data = {
        labels: ["FAIR VALUE", "FUTURE", "PAST", "HEALTH", "DIVIDENDS"],
        datasets: [{
            fill: true,
            borderColor: 'transparent',
            backgroundColor: 'rgb(35, 123, 255)',
            pointBackgroundColor: 'rgba(255, 255, 255, 0)',
            pointBorderColor: 'rgba(255, 255, 255, 0)',
            pointBorderWidth: 1,
            data: [10, 5, 7, 3, 7]
        }]
        };

        const options = {
        startAngle: 36,
        legend: {
            display: false
        },
        elements: {
            line: {
            tension: 0.5,
            }
        },
        tooltips: {
            enabled: false,
            animating: false
        },
        scale: {
            gridLines: {
            circular: true,
            color: "rgba(255, 255, 255, 0.1)",
            offsetGridLines: true,
            lineWidth: 11
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
    })

</script>

@endsection
