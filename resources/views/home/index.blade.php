@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    <home-parent asset="{{ asset('storage/') }}"></home-parent>
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

    <div class="content__container__parent d-none">
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
                    <div class="flex__block">
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
    </div>

<script defer>

    let flex__blocks = document.querySelectorAll('.flex__block')
    if(flex__blocks.length == 4)
    {
        flex__blocks.forEach(block => {
            block.classList.remove('flex__block')
            block.classList.add('bigger__flex__block')
        });
    }

    window.onload = function() {
        let block__images = document.querySelectorAll(".flex__block img")
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

        document.querySelectorAll('.flex__block, .bigger__flex__block').forEach(block => {
            block.addEventListener('mouseenter', () => {
                document.querySelector('.right__part__hint p').classList.add('active');
            });

            block.addEventListener('mouseleave', () => {
                document.querySelector('.right__part__hint p').classList.remove('active');
            });
        });
    };


</script>

@endsection
