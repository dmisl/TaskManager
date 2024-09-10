@extends('main')

@section('title', 'Home')

@section('style')

@vite('resources/css/home.css')

@endsection

@section('content')

<div class="menu">
    <div class="card shadow">
        <div class="menu__element yellow__background">My goals</div>
        <div class="menu__element green__background">Tasks to do</div>
        <div class="menu__element blue__background">My week</div>
        <div class="menu__element red__background">Work I did</div>
        <div class="menu__element grey__background">Settings</div>
        <div class="menu__element black__background">Log out</div>
    </div>
</div>

@endsection
