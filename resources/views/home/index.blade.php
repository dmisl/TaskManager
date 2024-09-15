@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    {{-- <home-parent asset="{{ asset('storage/') }}"></home-parent> --}}
    <div class="menu__parent">
        <div class="menu">
            <div class="card shadow">
                <a href="#goals" class="menu__element yellow__background goals">Мої цілі</a>
                <a href="#tasks" class="menu__element green__background tasks">Сьогоднішні завдання</a>
                <a href="#week" class="menu__element blue__background week">Мій тиждень</a>
                <a href="#completed" class="menu__element red__background completed">Виконані завдання</a>
                <a href="#settings" class="menu__element grey__background settings"><p style="z-index: 10;">Налаштування</p></a>
                <a href="#logout" class="menu__element black__background logout">Вийти з системи</a>
                <p class="hint">спробуй</p>
            </div>
        </div>
    </div>

    <div class="content__container__parent">
        <div class="content__container">
            <div class="content">
                <!-- <component :is='currentComponent'></component> -->
                <h1 class="content__title">Твій навігатор</h1>
                <div class="content__flex">
                    <a href="#goals" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/goals.png') }}" style="height: 100%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2>Мої цілі</h2>
                        </div>
                    </a>
                    <a href="#tasks" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/todays tasks.jpg') }}" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 20px;">Сьогоднішні завдання</h2>
                        </div>
                    </a>
                    <a href="#week" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/my_week.jpg') }}" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2>Мій тиждень</h2>
                        </div>
                    </a>
                    <a href="#completed" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/completed_tasks.jpg') }}" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 20px;">Виконані завдання</h2>
                        </div>
                    </a>
                    <a href="#settings" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/settings.jpg') }}" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 28px;">Налаштування</h2>
                        </div>
                    </a>
                    <a href="#logout" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img src="{{ asset('storage/images/logout.jpg') }}" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 25px;">Вийти з системи</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="moved__container">
            <div class="left__part"></div>
            <div class="right__part">
                <div class="flex" id="custom__scrollbar">
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                    <div class="flex__block"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
