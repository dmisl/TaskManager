@extends('main')

@section('title', "Auth")

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')

    <div class="d-flex user-select-none h-100">

        <div style="width: 55%;">
            <h1 class="login__text">
                Стань <span style="color: rgb(24 127 255); text-decoration: underline;">менеджером</span> свого часу разом з <div class="rainbow__parent"><span class="title__rainbow">Task Buddy</span>!</div>
            </h1>
        </div>

        <div style="width: 45%; text-align: right; position: relative; overflow: hidden; height: 100%;">
            <div class="custom__underline__parent" style="">
                <p class="custom__underline toggle" style="margin: 0; font-size: 20px;" role="button">Реєстрація ></p><br>
            </div>
            <div class="switch__container">
                <div class="auth card rounded-5 p-2 px-3">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="card-body text-center">
                            <h2 class="m-0">Вітаємо знову!<span style="font-size: 25px;">🥰</span></h2>
                            <div class="text-start mt-3">
                                <label for="nickname" style="font-size: 20px;">Ваш логін</label>
                                <input class="auth__first form-control py-1" placeholder="Василій Петрович" value="{{ old('name') }}" name="name" autofocus id="nickname" type="text">
                                <p class="login__error" style="color: red; margin: 0; font-size: 10px; height: 8px;">{{ session()->has('error') ? session('error') : '' }}</p>
                                <label for="password" style="font-size: 20px;">Ваш пароль</label>
                                <input class="form-control py-1" value="{{ old('password') }}" placeholder="vasylko123" name="password" id="password" type="password">
                                <p class="password__error" style="color: red; margin: 0; font-size: 10px; height: 10px;"></p>
                                <div class="remember__parent">
                                    <input class="form-check-input remember__checkbox" checked name="remember" type="checkbox" id="remember">
                                    <label for="remember" class="remember__label">запам'ятай мене</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-1 text-center">
                            <button class="btn btn-primary rounded-5">Авторизуватись</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<script defer>

    window.addEventListener('load', function () {

        // BLOCK SWITCHING

            // let toggle = document.querySelector('.toggle')
            // let toggled = false;

            // toggle.addEventListener('click', switchBlock)

            // function switchBlock() {
            //     const box = document.querySelector('.auth');
            //     const box2 = document.querySelector('.reg');

            //     if (!toggled) {
            //         box.classList.add('animate-out');
            //         box2.classList.add('animate-in');
            //         setTimeout(() => {
            //             document.querySelector('.reg__first').focus()
            //             toggle.innerText = 'Авторизація >'
            //         }, 1000);
            //     } else {
            //         box.classList.remove('animate-out');
            //         box2.classList.remove('animate-in');
            //         setTimeout(() => {
            //             document.querySelector('.auth__first').focus()
            //             toggle.innerText = 'Реєстрація >'
            //         }, 1000);
            //     }

            //     toggled = !toggled;
            // }

        // REG VALIDATION
        // let reg = document.querySelector('.reg')
        // let email = reg.querySelector('input[name="email"]')
        // let email__error = reg.querySelector('.email__error')
        // let emailTimeout
        // email.addEventListener('keyup', function () {
        //     clearTimeout(emailTimeout)
        //     emailTimeout = setTimeout(email__check, 1000);
        // })
        // function email__check()
        // {
        //     let emailValue = email.value.trim();
        //     let atIndex = emailValue.indexOf('@');
            
        //     if (atIndex < 5 && email.value.length !== 0) {
        //         email__error.innerText = "щонайменше 5 символів перед '@'.";
        //         return false
        //     } else if (!emailValue.endsWith('@gmail.com') && email.value.length !== 0) {
        //         email__error.innerText = "Електронна адреса повинна закінчуватися на '@gmail.com'.";
        //         return false
        //     } else if (email.value.length == 0)
        //     {
        //         email__error.innerText = "обов'язкове поле"
        //         return false
        //     } else
        //     {
        //         email__error.innerText = ''
        //         return true
        //     }
        // }

        // let name = reg.querySelector('input[name="login"]')
        // let name__error = reg.querySelector('.name__error')
        // let nameTimeout
        // name.addEventListener('keyup', function () {
        //     clearTimeout(nameTimeout)
        //     nameTimeout = setTimeout(name__check, 1000);
        // })
        // function name__check()
        // {
        //     if(name.value.length == 0)
        //     {
        //         name__error.innerText = "обов'язкове поле"
        //         return false
        //     } else if(name.value.length < 6)
        //     {
        //         name__error.innerText = "мінімум 6 символів"
        //         return false
        //     } else
        //     {
        //         name__error.innerText = ""
        //         return true
        //     }
        // }
        // let pass = reg.querySelector('input[name="pass"]')
        // let ppass = reg.querySelector('input[name="pass_confirmation"]')
        // switchBlock()
        // AUTH VALIDATION
            // let auth = document.querySelector('.auth')

            // let login = auth.querySelector('input[type="text"]')
            // let login__error = auth.querySelector('.login__error')
            // let loginTimeOut

            // login.addEventListener('change', auth_validate)
            // login.addEventListener('keydown', login__check)

            // function login__check(e) 
            // {
            //     clearTimeout(loginTimeOut)
            //     if(login.value.length > 15)
            //     {
            //         if(e && e.key !== 'Backspace' && e.key !== 'Delete')
            //         {
            //             e.preventDefault()
            //         }
            //         login__error.innerText = `максимальна довжина логіну - 16 символів`
            //         return false
            //     } else if(login.value.length < 4)
            //     {
            //         loginTimeOut = setTimeout(() => {
            //             login__error.innerText = `мінімальна должина логіну - 3 символа`
            //         }, 1000);
            //         return false
            //     } 
            //     else
            //     {
            //         login__error.innerText = ``
            //         return true
            //     }
            // }

            // let password = auth.querySelector('input[type="password"]')
            // let password__error = auth.querySelector('.password__error')
            // let passwordTimeOut

            // password.addEventListener('keyup', password__check)
            // password.addEventListener('change', auth_validate)

            // function password__check()
            // {
            //     clearTimeout(passwordTimeOut)
            //     if(password.value.length < 6 && password.value.length !== 0)
            //     {
            //         passwordTimeOut = setTimeout(() => {
            //             password__error.innerHTML = `мінімальна довжина паролю - 6 символів`
            //         }, 1000);
            //         return false
            //     } else if(password.value.length == 0)
            //     {
            //         password__error.innerHTML = `це поле є обов'язковим`
            //         return false
            //     } 
            //     else
            //     {
            //         password__error.innerHTML = ''
            //         return true
            //     }
            // }

            // let button = auth.querySelector('button')
            // let buttonAccess = {{ session()->has('error') ? 1 : 0 }}

            // button.parentElement.addEventListener('mouseenter', auth_validate)

            // function auth_validate()
            // {
            //     if(!buttonAccess)
            //     {
            //         if(login__check() && password__check())
            //         {
            //             button.removeAttribute('disabled')
            //         } else
            //         {
            //             button.setAttribute('disabled', '')
            //         }
            //     } else
            //     {
            //         buttonAccess = 0
            //     }
            // }

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.opacity = '1'

    })

</script>

@php(session()->forget('error'))

@endsection
