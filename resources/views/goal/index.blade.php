@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

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
                    @foreach ($goals as $goal)
                        <a href="{{ route('goal.show', [$goal->id]) }}" goal_id="{{ $goal->id }}" class="flex__block">
                            <div class="img__parent">
                                <img src="{{ $goal->image }}" alt="">
                            </div>
                            <div class="hidden__content">
                                <p>{{ $goal->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL GOAL EDIT --}}
    <div class="edit__modal__parent">

    </div>
    {{-- MODAL GOAL DELETE --}}
    <div class="delete__modal d-none">
        <h3>Ви дійсно хочете видалити цю ціль?</h3>
        <p>Всі завдання та статистика, пов’язана з нею, будуть безповоротно видалені.</p>
        <div class="flex">
            <div class="yes">
                <p>Так</p>
            </div>
            <div class="no">
                <p>Ні</p>
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

    window.onload = function() {

        // TASK BLOCKS HANDLING
            let flex__blocks = document.querySelectorAll('.flex__block')
            if(flex__blocks.length == 4)
            {
                flex__blocks.forEach(block => {
                    block.classList.remove('flex__block')
                    block.classList.add('bigger__flex__block')
                })
            } else if(flex__blocks.length < 7)
            {
                document.querySelector('.flex').style.overflow = 'visible'
                flex__blocks.forEach(flex__block => {
                    flex__block.classList.add('shadow')
                });
            } else
            {
                document.querySelector('.flex').style.overflow = 'auto'
                flex__blocks.forEach(flex__block => {
                    flex__block.classList.remove('shadow')
                });
            }
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
        // RIGHT MOUSE CLICK MENU HANDLING
            let contextMenu = document.querySelector(".some__menu");
            document.addEventListener("click", function (e) {
                if (!contextMenu.contains(e.target)) {
                    context__menu__close()
                }
            });
            let current__block
            function context__menu__open(e)
            {
                if(e.currentTarget.classList.contains('flex__block') || e.currentTarget.classList.contains('bigger__flex__block'))
                {
                    // HANDLING GOAL BLOCK WHICH WAS CLICKED ON
                    let block = e.currentTarget
                    current__block = block
                    // OPENING INTERACTIVE MODAL
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
                }
            }
            function context__menu__close()
            {
                contextMenu.classList.add('d-none');
                contextMenu.classList.remove('d-block');
            }
            let guide = contextMenu.querySelector('.guide')
            let stats = contextMenu.querySelector('.stats')
            let settings = contextMenu.querySelector('.settings')
            let deleteGoal = contextMenu.querySelector('.delete')
            let delete__modal = document.querySelector('.delete__modal')
            // DELETE MODAL
            deleteGoal.addEventListener('click', function () {
                delete__modal.classList.remove('d-none')
                let top = parseInt(current__block.getBoundingClientRect().y) + current__block.offsetHeight + 17
                let left = parseInt(current__block.getBoundingClientRect().x) - (current__block.offsetWidth/2)
                if(current__block.classList.contains('bigger__flex__block'))
                {
                    left = parseInt(current__block.getBoundingClientRect().x) - (current__block.offsetWidth/4) - 20
                }
                delete__modal.style.left = left+'px'
                delete__modal.style.top = top+'px'
                context__menu__close()
                document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                    block.removeEventListener('contextmenu', context__menu__open, { passive: false } )
                });
            })
            delete__modal.querySelector('.yes').addEventListener('click', () => {
                axios.post(`{{ route('goal.delete') }}`,{goal_id: current__block.attributes.goal_id.value})
                .then(res => {
                    create__alert('Сповіщення', 'Ціль і всі її завдання були успішно видалені')
                    delete__modal.classList.add('d-none')
                    current__block.remove()
                    document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                        block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                    })
                })
                .catch(err => {
                    console.error(err);
                })

            })
            delete__modal.querySelector('.no').addEventListener('click', () => {
                delete__modal.classList.add('d-none')
                document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                    block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                });
            })
            document.querySelectorAll('.flex__block:not(.goal__create), .flex__block:not(.goal__create) *, .bigger__flex__block:not(.goal__create), .bigger__flex__block:not(.goal__create) *').forEach(block => {
                block.addEventListener('contextmenu', context__menu__open, { passive: false } )
                block.addEventListener('contextmenu', (e) => {e.preventDefault()})
            });

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.animation = 'appear__opacity 0.5s forwards'
        if(flex__blocks.length == 4)
        {
            let flexy = document.querySelector('.right__part .flex')
            flexy.style.paddingBottom = '0'
            flexy.style.justifyContent = 'center'
            flexy.style.overflow = 'visible'
        }

    };

</script>

@endsection
