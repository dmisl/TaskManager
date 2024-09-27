@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

    {{-- <home-parent asset="{{ asset('storage/') }}"></home-parent> --}}

    <div class="content__container__parent">
        <div class="content__container">
            <div class="content">
                <!-- <component :is='currentComponent'></component> -->
                <h1 class="content__title">Твій навігатор</h1>
                <div class="content__flex">
                    <a href="{{ route('goal.index') }}" class="content__flex__block">
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
    </div>

<script defer>

    window.addEventListener('load', function () {

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

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.animation = 'appear__opacity 0.5s forwards'

    })


</script>

@endsection
