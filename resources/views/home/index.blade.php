@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    {{-- <home-parent asset="{{ asset('storage/') }}"></home-parent> --}}
    <div class="menu__parent d-none">
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

    <div class="content__container__parent">
        <div class="content__container d-none">
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
        <div class="moved__container d-none">
            <div class="left__part">
                <a class="left__part__back" href="#">
                    <img src="{{ asset('storage/images/back.png') }}" alt="">
                    <p>назад</p>
                </a>
            </div>
            <div class="right__part">
                <h1 class="right__part__title">Список моїх цілей</h1>
                <div class="right__part__hint">
                    <p>нажміть пкм для висвітлення меню</p>
                </div>
                <div class="flex" id="custom__scrollbar">
                    <div class="flex__block goal__create">
                        <img src="{{ asset('storage/images/new goal.jpg') }}" alt="">
                        <div class="hidden__block">
                            <p style="color: white;">Створити нову ціль</p>
                        </div>
                    </div>
                    <div class="flex__block">
                        <div class="img__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                        </div>
                        <div class="hidden__content">
                            <p>Фріланс і ще щось</p>
                        </div>
                    </div>
                    <div class="flex__block">
                        <div class="img__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                        </div>
                        <div class="hidden__content">
                            <p>Фріланс і ще щось</p>
                        </div>
                    </div>
                    <div class="flex__block">
                        <div class="img__parent">
                            <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                        </div>
                        <div class="hidden__content">
                            <p>Фріланс і ще щось</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="goal__create">
            <div class="preview__parent">
                <div class="preview">
                    <div class="hidden__content">
                        <p>Суть цілі</p>
                    </div>
                    <div class="img__parent">
                        <img src="{{ asset('storage/images/empty.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="freepick__parent">
                <div class="freepick">
                    <div class="freepick__content">
                        <h2>Змініть картинку заднього фону</h2>
                        <div class="freepick__flex">
                            <div class="freepick__image__parent">
                                <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            </div>
                            <div class="freepick__image__parent">
                                <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            </div>
                            <div class="freepick__image__parent">
                                <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            </div>
                            <div class="freepick__image__parent">
                                <img src="{{ asset('storage/images/freelance.jpg') }}" alt="">
                            </div>
                        </div>
                        <p class="freepick_load">завантажити інші варіанти</p>
                    </div>
                </div>
            </div>
            <h1>Створення цілі 🎯</h1>
            <div class="form">
                <div class="form-item">
                    <div class="label__icon">
                        <p>Суть цілі</p>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                    <input type="text" class="form-control" placeholder="Знайти роботу">
                    <div class="error input__error">
                        <p></p>
                    </div>
                </div>
                <div class="form-item">
                    <div class="label__icon">
                        <p>Кількість завдань</p>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                    <select class="form-select form-select-lg" aria-label="Large select example">
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
                        <p>Бажана дата завершення</p>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                            <defs>
                            </defs>
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                <path d="M 45 61.898 c -1.657 0 -3 -1.344 -3 -3 v -6.612 c 0 -0.825 0.34 -1.614 0.94 -2.182 l 9.553 -9.019 c 1.873 -1.946 2.903 -4.502 2.903 -7.206 v -0.357 c 0 -2.827 -1.115 -5.471 -3.141 -7.445 c -2.025 -1.974 -4.693 -3.031 -7.532 -2.947 c -5.58 0.144 -10.12 4.941 -10.12 10.694 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 c 0 -8.978 7.162 -16.465 15.965 -16.692 c 4.467 -0.122 8.68 1.536 11.874 4.648 c 3.194 3.113 4.953 7.283 4.953 11.742 v 0.357 c 0 4.295 -1.649 8.356 -4.646 11.434 c -0.029 0.03 -0.06 0.06 -0.09 0.089 L 48 53.579 v 5.319 C 48 60.555 46.657 61.898 45 61.898 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 73.87 c -0.26 0 -0.52 -0.021 -0.78 -0.07 c -0.26 -0.06 -0.51 -0.13 -0.75 -0.23 c -0.24 -0.1 -0.47 -0.229 -0.69 -0.369 c -0.22 -0.15 -0.42 -0.311 -0.61 -0.5 C 41.43 71.96 41 70.93 41 69.87 c 0 -0.261 0.03 -0.521 0.08 -0.78 c 0.05 -0.25 0.13 -0.51 0.23 -0.75 s 0.22 -0.47 0.36 -0.69 c 0.15 -0.22 0.32 -0.42 0.5 -0.609 c 0.19 -0.181 0.39 -0.351 0.61 -0.49 c 0.22 -0.15 0.45 -0.27 0.69 -0.37 c 0.24 -0.1 0.49 -0.18 0.75 -0.229 c 0.51 -0.101 1.05 -0.101 1.56 0 c 0.26 0.05 0.51 0.13 0.75 0.229 c 0.239 0.101 0.47 0.22 0.689 0.37 c 0.22 0.14 0.42 0.31 0.61 0.49 c 0.18 0.189 0.35 0.39 0.5 0.609 c 0.14 0.221 0.26 0.45 0.359 0.69 c 0.101 0.24 0.181 0.5 0.23 0.75 c 0.05 0.26 0.08 0.52 0.08 0.78 c 0 1.06 -0.431 2.09 -1.17 2.83 C 47.08 73.45 46.05 73.87 45 73.87 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 6 C 23.495 6 6 23.495 6 45 s 17.495 39 39 39 s 39 -17.495 39 -39 S 66.505 6 45 6 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                    </div>
                    <input class="form-control" type="date">
                    <div class="error date__error">
                        <p></p>
                    </div>
                </div>
                <div class="form-button-parent">
                    <button class="btn btn-primary btn-lg rounded-5">Створити</button>
                </div>
            </div>
        </div>
    </div>

<script defer>

    let contextMenu = document.querySelector(".some__menu");

    document.addEventListener("click", function (e) {
        if (!contextMenu.contains(e.target)) {
            contextMenu.classList.add('d-none');
            contextMenu.classList.remove('d-block');
        }
    });

    let flex__blocks = document.querySelectorAll('.flex__block')
    if(flex__blocks.length == 4)
    {
        flex__blocks.forEach(block => {
            block.classList.remove('flex__block')
            block.classList.add('bigger__flex__block')
        })
    }

    window.onload = function() {
        let block__images = document.querySelectorAll(".flex__block img, .preview img, .freepick__image__parent img")
        if(block__images.length == 0) {
            block__images = document.querySelectorAll('.bigger__flex__block img')
            document.querySelector('.flex').style.overflow = 'visible'
            document.querySelector('.flex').style.justifyContent = 'center'
        }

        block__images.forEach(image => {
            if(image.offsetHeight == image.offsetWidth)
            {
                image.style.width = '100%'
            } else if(image.offsetWidth > image.offsetHeight)
            {
                image.style.cssText = "height: 100%; object-fit: cover;"
                image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center;'
            } else
            {
                image.style.cssText = "width: 100%; object-fit: cover;"
                image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center;'
            }
        });

        document.querySelectorAll('.flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create)').forEach(block => {
            block.addEventListener('mouseenter', () => {
                document.querySelector('.right__part__hint p').classList.add('active');
            });

            block.addEventListener('mouseleave', () => {
                document.querySelector('.right__part__hint p').classList.remove('active');
            });
        });
        document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
        block.addEventListener('contextmenu', (e) => {
            e.preventDefault();
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
            },
            { passive: false }
        )
    });

        // GOAL CREATE

        // DEFAULT VALUE FOR DATE INPUT (LAST DAY OF THIS YEAR)
        let date = document.querySelector('.goal__create .form-item input[type="date"]') // input of type date
        date.value = new Date(new Date().getFullYear(), 11, 31).toISOString().split('T')[0] // default input value of format yyyy-mm-dd
    
        // INPUT TYPE TEXT VALUE TO PREVIEW ELEMENT
        let input = document.querySelector('.goal__create .form-item input[type="text"]') // input of type text
        input.focus() // on load of page focus on text input
        let preview__text = document.querySelector('.goal__create .preview__parent .preview .hidden__content p') // preview text element
        let typingTimer // timer of ending typing
        let input__error = document.querySelector('.goal__create .form-item .input__error p')
        input.addEventListener('keyup', function () {
            preview__text.innerText = input.value // set to input value preview to text
            if(input.value.length == 0) // if input is empty set default value
            {
                preview__text.innerText = `Суть цілі`
            }
            clearTimeout(typingTimer) // prevent function before text is written
            typingTimer = setTimeout(() => { // do something after text is written
                console.log(input.value)
            }, 1000);
        })
        input.addEventListener('keydown', function (e) { // prevent writing more than 45 symbols
            if(input.value.length >= 45 && event.key !== 'Backspace' && event.key !== 'Delete')
            {
                e.preventDefault()
                input__error.innerText = `max 40 symbols`
            }
        })
    };

</script>

@endsection
