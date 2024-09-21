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
        <div class="moved__container">
            <div class="left__part">
                <a class="left__part__back" href="{{ route('home.index') }}">
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
                    <a href="{{ route('goal.create') }}" class="flex__block goal__create">
                        <img src="{{ asset('storage/images/new goal.jpg') }}" alt="">
                        <div class="hidden__block">
                            <p style="color: white;">Створити нову ціль</p>
                        </div>
                    </a>
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
                    @foreach ($goals as $goal)
                        <div class="flex__block">
                            <div class="img__parent">
                                <img src="{{ $goal->image }}" alt="">
                            </div>
                            <div class="hidden__content">
                                <p>{{ $goal->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
                image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;'
            } else
            {
                image.style.cssText = "width: 100%; object-fit: cover;"
                image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;'
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

    };

</script>

@endsection
