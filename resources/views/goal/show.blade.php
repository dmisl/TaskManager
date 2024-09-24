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
                <div class="tasks__flex" id="x-custom__scrollbar">
                    <div class="tasks__flex__block__parent">
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
                    </div>
                    <div class="tasks__flex__block__parent">
                        <div class="tasks__flex__block">
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
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/images/work.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block__parent">
                        <div class="tasks__flex__block">
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
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/images/work.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block__parent">
                        <div class="tasks__flex__block">
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
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/images/work.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block__parent">
                        <div class="tasks__flex__block">
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
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/images/work.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="tasks__flex__block__parent">
                        <div class="tasks__flex__block">
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
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                                <div class="task p1">
                                    <p>Завершити блок з цілями<span>...</span></p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{ asset('storage/images/work.jpg') }}" alt="">
                            </div>
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

    function fixImage(element)
    {
        let width = element.naturalWidth;
        let height = element.naturalHeight;
        if(width > height)
        {
            element.style.cssText = `height: 239px;`
        } else
        {
            element.style.cssText = `width: 239px;`
        }
    }

    // ON LOAD OF THE PAGE
    window.addEventListener('load', function () {
        // HANDLING ELEMENTS` VIEW
        let flex__blocks = document.querySelectorAll(".tasks__flex__block")
        flex__blocks.forEach(flex__block => {
            // FLEX BLOCK`S ELEMENTS
            let title = flex__block.querySelector('.title')
            let flex = flex__block.querySelector('.flex')
            let image = flex__block.querySelector('.image')
            // IF BLOCK HAS IMAGE (NOT UNFINISHED) - FIX THE IMAGE
            if(image && image.querySelector('img'))
            {
                fixImage(image.querySelector('img'))
                // FLEX BLOCK`S ORIGINAL HEIGHT
                flex.style.overflow = 'visible'
                let flex__height = flex.offsetHeight
                // AFTER DECLARING FLEX HEIGHT HIDE IT
                flex.style.overflow = 'hidden'
                flex.style.maxHeight = '154px'
                // SET IMAGE TO DEFAULT POSITION
                image.style.bottom = (154+title.offsetHeight+25)+'px'
                // TIMEOUT TO SET THE FLEX BLOCK TO POSITION RELATIVE
                let positionRelativeTimeOut = null
                // ON HOVER WE SHOW WHATS INSIDE THE FLEX BLOCK
                flex__block.addEventListener('mouseenter', function () {
                    clearTimeout(positionRelativeTimeOut)
                    flex__block.style.position = 'absolute'
                    flex.style.maxHeight = flex__height+'px'
                    image.style.bottom = (flex__height+title.offsetHeight+25)+'px'
                    flex__block.style.marginLeft = `-${document.querySelector('.tasks__flex').scrollLeft}px`
                });
                // ON LEAVE WE SET FLEX BLOCK TO THE DEFAULT POSITION
                flex__block.addEventListener('mouseleave', function () {
                    flex.style.maxHeight = '154px'
                    image.style.bottom = (154+title.offsetHeight+25)+'px'
                    positionRelativeTimeOut = setTimeout(() => {
                        flex__block.style.position = 'relative'
                        flex__block.style.marginLeft = '0'
                        positionRelativeTimeOut = null
                    }, 300);
                });
            }
        });
    })

</script>

@endsection
