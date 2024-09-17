<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- GOLOS FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
    {{-- CSS STYLING --}}
    @vite('resources/css/app.css')
    @yield('style')
</head>
<body style="background-image: url('{{ asset('storage/images/background.jpg') }}')">

    <div id="app" class="w-100 vh-100" style="display: flex; flex-direction: column; overflow: hidden;" draggable="false">

        <a href="{{ Auth::check() ? route('home.index') : route('login.index') }}" class="title user-select-none" draggable="false">
            <div class="emoji before"></div>
            <div class="text">Task Buddy</div>
            <div class="emoji after"></div>
        </a>
        <p style="text-align: center">become best version of yourself</p>

        @yield('content')

    </div>

</body>
</html>
@vite('resources/js/emoji.js')
@vite('resources/js/app.js')
