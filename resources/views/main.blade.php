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
    <style>
        *
        {
            margin: 0;
            font-family: 'Golos Text', sans-serif;
        }

        .title {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .title .emoji {
            font-size: 30px;
            width: 50px;
            text-align: center;
        }

        .title .text {
            font-size: 35px;
            position: relative;
            text-decoration: none;
            margin: 5px 0;
        }

        .title .text::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 3px;
            background-color: #000;
            border-radius: 10px;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.5s ease;
        }

        .title .text:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .title__rainbow{
            position: relative;
            color: #000;
            background: #fff;
            mix-blend-mode: multiply;
            overflow: hidden;
            font-size: 90px;
        }
        .title__rainbow::before{
            content: "";
            position: absolute;
            top:0;right:0;bottom:0;left:-100%;
            background: white repeating-linear-gradient(90deg, #14ffe9 0%, #ffc800 16.66666%, #ff00e0 33.33333%, #14ffe9 50.0%);
            mix-blend-mode: screen;
            pointer-events: none;
            animation: move 2s linear infinite;
        }

        @keyframes move{
            0%{transform: translateX(0);}
            100%{transform: translateX(50%);}
        }

        @supports not (mix-blend-mode: multiply) {
            .rainbow-text{
                background-clip: text !important;
                background: white repeating-linear-gradient(90deg, #14ffe9, #ffc800, #ff00e0, #14ffe9);
                text-shadow: none;
            }
            .title__rainbow::before{ content: none; }
        }
        .rainbow__parent{
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body>

    <div style="width: 100%; height: 100vh; position: absolute; z-index: -99; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('storage/images/background.jpg') }}')"></div>

    <div class="w-100 vh-100 overflow-hidden">

        <h3 class="title user-select-none">
            <div class="emoji before"></div>
            <div class="text">Task Buddy</div>
            <div class="emoji after"></div>
        </h3>

        @yield('content')

    </div>

</body>
@vite('resources/js/app.js')
</html>
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
