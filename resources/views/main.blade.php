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
    {{-- TIPPY JS --}}
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    {{-- DRAGULA JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js" integrity="sha512-MrA7WH8h42LMq8GWxQGmWjrtalBjrfIzCQ+i2EZA26cZ7OBiBd/Uct5S3NP9IBqKx5b+MMNH1PhzTsk6J9nPQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.css" integrity="sha512-gGkweS4I+MDqo1tLZtHl3Nu3PGY7TU8ldedRnu60fY6etWjQ/twRHRG2J92oDj7GDU2XvX8k6G5mbp0yCoyXCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- AXIOS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.7/axios.min.js" integrity="sha512-DdX/YwF5e41Ok+AI81HI8f5/5UsoxCVT9GKYZRIzpLxb8Twz4ZwPPX+jQMwMhNQ9b5+zDEefc+dcvQoPWGNZ3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- CHART JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha512-G2IkXzO4sCVjzajm/Tb9kDY7UIh3/OdHvQFJAZto6lEKklMKgxlce6P0ZHna6+a2Gmf/MZImqTURzc8F3UU8MQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="background-image: url('{{ asset('storage/images/background.jpg') }}')">

    <div id="app" class="w-100 vh-100" style="display: flex; flex-direction: column;" draggable="false">

        <a href="{{ Auth::check() ? route('home.index') : route('login.index') }}" class="header__title user-select-none" draggable="false">
            <div class="emoji before"></div>
            <div class="text">Task Buddy</div>
            <div class="emoji after"></div>
        </a>
        <p style="text-align: center; margin: 0;">become best version of yourself</p>

        <div class="whole__content" style="display: flex; flex-direction: column; align-items: center; justify-content: center; flex-grow: 1; opacity: 0;">
            @yield('content')
        </div>
        <div class="loader__parent">
            <div class="loader"></div>
        </div>
        <div class="alert__parent d-none"></div>

    </div>

</body>
</html>
@vite('resources/js/emoji.js')
@vite('resources/js/app.js')
<script>
    // CREATE ALERT
    function create__alert(header, text)
    {
        let alert__parent = document.querySelector('.alert__parent')
        alert__parent.classList.remove('d-none')
        let alert = document.createElement('div')
        alert.classList.add('alert')
        alert.style.opacity = '0'
        alert__parent.append(alert)
        let alert__title = document.createElement('div')
        alert__title.classList.add('title')
        alert.append(alert__title)
        let alert__title__p = document.createElement('p')
        alert__title__p.innerHTML = header
        alert__title.append(alert__title__p)
        let alert__content = document.createElement('div')
        alert__content.classList.add('content')
        alert.append(alert__content)
        let alert__content__p = document.createElement('p')
        alert__content__p.innerHTML = text
        alert__content.append(alert__content__p)
        alert.style.animation = 'appear__bottom 1s forwards'
        setTimeout(() => {
            alert.style.opacity = '1'
            alert.style.animation = 'disappear_right 1s forwards'
            setTimeout(() => {
                alert.remove()
                if(alert__parent.children.length == 0)
                {
                    alert__parent.classList.add('d-none')
                }
            }, 1000);
        }, 9000);
    }
</script>
