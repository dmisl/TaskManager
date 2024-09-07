@extends('main')

@section('title', "Auth")

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')

    <div class="d-flex user-select-none">

        <div style="width: 55%;">
            <h1 class="login__text">
                Стань <span style="color: rgb(24 127 255); text-decoration: underline;">менеджером</span> свого часу разом з <div class="rainbow__parent"><span class="title__rainbow">Task Buddy</span>!</div>
            </h1>
        </div>

        <div style="width: 45%; text-align: right;">
            <div class="card rounded-5 p-2 px-3" style="display: inline-block; margin-right: 15%; margin-top: 10%;">
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="card-body text-center">
                        <h2 class="m-0">Вітаємо знову!<span style="font-size: 25px;">🥰</span></h2>
                        <div class="text-start mt-3">
                            <label for="nickname" style="font-size: 20px;">Ваш логін</label>
                            <input value="{{ old('name') }}" name="name" autofocus id="nickname" type="text" class="form-control py-1">
                            <label for="password" style="font-size: 20px; margin-top: 4px;">Ваш пароль</label>
                            <input value="{{ old('password') }}" name="password" id="password" type="password" class="form-control py-1">
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <button class="btn btn-primary rounded-5">Авторизуватись</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        const emojis = ['💡', '🚀', '🔥', '🎯', '💼', '📝', '🤖', '📈', '🔔', '🎉'];

        function getRandomEmoji() {
            return emojis[Math.floor(Math.random() * emojis.length)];
        }

        const beforeEmoji = document.querySelector('.emoji.before');
        const afterEmoji = document.querySelector('.emoji.after');

        function addRandomEmojis() {
            beforeEmoji.textContent = getRandomEmoji();
            afterEmoji.textContent = getRandomEmoji();
        }

        addRandomEmojis();
    </script>

@endsection
