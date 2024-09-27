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
            <div class="toggle__container">
                <div class="auth card rounded-5 p-2 px-3" style="display: inline-block; margin-right: 15%; margin-top: 10px;">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="card-body text-center">
                            <h2 class="m-0">Вітаємо знову!<span style="font-size: 25px;">🥰</span></h2>
                            <div class="text-start mt-3">
                                <label for="nickname" style="font-size: 20px;">Ваш логін</label>
                                <input class="auth__first form-control py-1" value="{{ old('name') }}" name="name" autofocus id="nickname" type="text" >
                                <label for="password" style="font-size: 20px; margin-top: 4px;">Ваш пароль</label>
                                <input class="form-control py-1" value="{{ old('password') }}" name="password" id="password" type="password">
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
                <div class="reg card rounded-5 p-2 px-4" style="display: inline-block; margin-right: 15%; margin-top: 10px;">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="card-body text-center">
                            <h2 class="m-0">Реєстрація<span style="font-size: 25px;">🧐</span></h2>
                            <div class="text-start mt-3">
                                <label for="email" style="font-size: 20px;">E-mail</label>
                                <input class="form-control py-1 reg__first" value="{{ old('email') }}" name="email" autofocus id="email" type="email">
                                <label for="login" style="font-size: 20px; margin-top: 4px;">Логін</label>
                                <input value="{{ old('login') }}" name="login" id="login" class="form-control py-1">
                                <label for="pass" style="font-size: 20px; margin-top: 4px;">Пароль</label>
                                <input value="{{ old('pass') }}" name="pass" id="pass" type="password" class="form-control py-1">
                                <label for="ppass" style="font-size: 20px; margin-top: 4px;">Повторіть пароль</label>
                                <input value="{{ old('ppass') }}" name="pass_confirmation" id="ppass" type="password" class="form-control py-1">
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <button class="btn btn-primary rounded-5">Зареєструватись</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<script defer>

    window.addEventListener('load', function () {

        let toggle = document.querySelector('.toggle')
        let toggled = false;

        toggle.addEventListener('click', toggleAnimation)

        function toggleAnimation() {
            const box = document.querySelector('.auth');
            const box2 = document.querySelector('.reg');

            if (!toggled) {
                box.classList.add('animate-out');
                box2.classList.add('animate-in');
                setTimeout(() => {
                    document.querySelector('.reg__first').focus()
                    toggle.innerText = 'Авторизація >'
                }, 1000);
            } else {
                box.classList.remove('animate-out');
                box2.classList.remove('animate-in');
                setTimeout(() => {
                    document.querySelector('.auth__first').focus()
                    toggle.innerText = 'Реєстрація >'
                }, 1000);
            }

            toggled = !toggled;
        }

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.opacity = '1'

    })

</script>

@endsection
