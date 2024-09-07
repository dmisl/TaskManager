@extends('main')

@section('title', "Auth")

@section('content')

    <div class="d-flex user-select-none">

        <div style="width: 55%;">
            <h1 style="margin-left: 100px; margin-top: 150px; font-size: 80px; font-weight: 500; color: black; text-shadow: 2px 4px 3px rgba(0,0,0,0.1);">
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

@endsection
