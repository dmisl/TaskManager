@extends('main')

@section('title', 'Home')

@section('content')

<div class="container">
    <h2 class="text-center mt-5">
        Привіт, <span class="text-primary">{{ Auth::user()->name }}</span>!
    </h2>
</div>

@endsection
