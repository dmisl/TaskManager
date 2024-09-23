@extends('main')

@section('title', 'My week')

@section('style')
    @vite('resources/css/goalShow.css')
@endsection

@section('content')

<div class="content__container">
    <div class="content">
        <div class="tasks">
            <div class="tasks__title">
                <h1>Цілі і завдання</h1>
            </div>
            <div class="tasks__flex__container">
                <div class="tasks__flex" id="x-custom__scrollbar" style="absolute;">
                    <div class="tasks__flex__block unfinished">
                        <div class="title">
                            Незавершені
                        </div>
                        <div class="flex">
                            <div class="task p5">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p4">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p3">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p2">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p1">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block">
                        <div style="position: absolute; z-index: -10; background-color: white; width: 239px; height: 234px; border-radius: 29px; overflow: hidden;">
                            <img style="width: 100%;" src="{{ asset('storage/images/work.jpg') }}" alt="">
                        </div>
                        <div class="title">
                            Знайти роботу програмістом
                        </div>
                        <div class="flex">
                            <div class="task p5">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p4">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p3">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p2">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p1">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block a1">
                        <div class="title">
                            Знайти роботу програмістом
                        </div>
                        <div class="flex">
                            <div class="task p5">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p4">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p3">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p2">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                            <div class="task p1">
                                <p>Завершити блок з цілями<span>...</span></p>
                            </div>
                        </div>
                        <div class="image" style="position: relative; z-index: 0; width: 239px; height: 234px; border-radius: 29px; overflow: hidden;">
                            <img style="width: 100%;" src="{{ asset('storage/images/work.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="days">

        </div>
    </div>
</div>

<script defer>

    let a1 = document.querySelector('.a1')
    let title = a1.querySelector('.title')
    let flex = a1.querySelector('.flex')
    let image = a1.querySelector('.image')
    console.log(title.offsetHeight)
    console.log(flex.offsetHeight)
    image.style.bottom = (title.offsetHeight + flex.offsetHeight+25)+'px'

</script>

@endsection
