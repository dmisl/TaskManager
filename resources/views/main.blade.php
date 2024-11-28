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

        <div class="lang">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
    
                <defs>
                </defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                    <path d="M 45 0 C 20.187 0 0 20.187 0 45 c 0 24.813 20.187 45 45 45 c 24.813 0 45 -20.187 45 -45 C 90 20.187 69.813 0 45 0 z M 4.051 47 H 20.07 c 0.142 6.123 0.934 11.89 2.255 17.096 H 8.735 C 6.011 58.944 4.348 53.149 4.051 47 z M 47 21.905 V 4.2 c 6.216 1.214 11.734 8.007 15.192 17.705 H 47 z M 63.455 25.905 C 64.89 31.084 65.772 36.89 65.931 43 H 47 V 25.905 H 63.455 z M 43 4.2 v 17.705 H 27.809 C 31.266 12.207 36.784 5.414 43 4.2 z M 43 25.905 V 43 H 24.069 c 0.159 -6.11 1.041 -11.916 2.476 -17.095 H 43 z M 20.07 43 H 4.051 c 0.297 -6.149 1.96 -11.944 4.684 -17.095 h 13.59 C 21.003 31.11 20.211 36.877 20.07 43 z M 24.069 47 H 43 v 17.096 H 26.545 C 25.111 58.917 24.228 53.111 24.069 47 z M 43 68.096 V 85.8 c -6.216 -1.214 -11.733 -8.007 -15.191 -17.705 H 43 z M 47 85.8 V 68.096 h 15.192 C 58.734 77.793 53.216 84.586 47 85.8 z M 47 64.096 V 47 h 18.931 c -0.159 6.111 -1.041 11.917 -2.476 17.096 H 47 z M 69.931 47 h 16.018 c -0.297 6.149 -1.96 11.944 -4.684 17.096 H 67.676 C 68.997 58.89 69.789 53.123 69.931 47 z M 69.931 43 c -0.142 -6.123 -0.934 -11.89 -2.255 -17.095 h 13.589 c 2.724 5.152 4.387 10.946 4.684 17.095 H 69.931 z M 78.855 21.905 H 66.523 c -2.153 -6.613 -5.219 -12.087 -8.909 -15.911 C 66.331 8.82 73.779 14.487 78.855 21.905 z M 32.386 5.994 c -3.689 3.824 -6.755 9.298 -8.909 15.911 H 11.145 C 16.221 14.487 23.669 8.82 32.386 5.994 z M 11.146 68.096 h 12.332 c 2.153 6.612 5.219 12.086 8.909 15.911 C 23.669 81.18 16.222 75.513 11.146 68.096 z M 57.614 84.006 c 3.689 -3.824 6.756 -9.298 8.909 -15.91 h 12.332 C 73.778 75.513 66.331 81.18 57.614 84.006 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
            </svg>
            
        </div>

        <a href="{{ Auth::check() ? route('home.index') : route('login.index') }}" class="header__title user-select-none" draggable="false">
            <div class="emoji before"></div>
            <div class="text custom__underline">Task Buddy</div>
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
