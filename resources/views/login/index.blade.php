@extends('main')

@section('title', "Auth")

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')

    <div class="d-flex user-select-none h-100 w-100">

        <div style="flex-grow: 1;">
            <h1 class="login__text">
                {!! __('login.hero_text') !!}
            </h1>
        </div>

        <div style="width: 650px; text-align: right; position: relative; height: 100%;">
            <div class="custom__underline__parent">
                <p class="custom__underline toggle" style="margin: 0; font-size: 20px;" role="button">{{ __('login.registration') }} ></p><br>
            </div>
            <div class="switch__container">
                <div class="auth card rounded-5 p-2 px-3">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <div class="card-body text-center">
                            <h2 class="m-0">{{ __('login.welcome_back') }}<span style="font-size: 25px;">🥰</span></h2>
                            <div class="text-start mt-3">
                                <label for="nickname" style="font-size: 20px;">{{ __('login.your_login') }}</label>
                                <input class="auth__first form-control py-1" placeholder="Donald Tusk" value="{{ old('name') }}" name="name" autofocus id="nickname" type="text">
                                <p class="login__error" style="color: red; margin: 0; font-size: 10px; height: 8px;">{{ session()->has('error') ? session('error') : '' }}</p>
                                <label for="password" style="font-size: 20px;">{{ __('login.your_password') }}</label>
                                <input class="form-control py-1" value="{{ old('password') }}" placeholder="president2077" name="password" id="password" type="password">
                                <p class="password__error" style="color: red; margin: 0; font-size: 10px; height: 10px;"></p>
                                <div class="remember__parent">
                                    <input class="form-check-input remember__checkbox" checked name="remember" type="checkbox" id="remember">
                                    <label for="remember" class="remember__label">{{ __('login.remember_me') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-1 text-center">
                            <button class="btn btn-primary rounded-5 px-4">{{ __('login.sign_in') }}</button>
                        </div>
                    </form>
                </div>
                <div class="reg d-none card rounded-5 p-2 px-4" style="display: inline-block; margin-right: 0; margin-top: 10px;">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="card-body text-center">
                            <h2 class="m-0">{{ __('login.registration') }}<span style="font-size: 25px;">🧐</span></h2>
                            <div class="text-start mt-3">
                                <label for="email" style="font-size: 20px;">E-mail</label>
                                <input class="form-control py-1 reg__first" placeholder="your_email@gmail.com" value="{{ old('email') }}" name="email" autofocus id="email" type="email">
                                <p class="email__error" style="color: red; margin: 0; font-size: 10px; height: 8px;"></p>
                                <label for="login" style="font-size: 20px;">{{ __('login.login') }}</label>
                                <input value="{{ old('login') }}" placeholder="John Doe" name="login" id="login" class="form-control py-1">
                                <p class="name__error" style="color: red; margin: 0; font-size: 10px; height: 8px;"></p>
                                <label for="pass" style="font-size: 20px;">{{ __('login.password') }}</label>
                                <input value="{{ old('pass') }}" placeholder="john_not_doe" name="pass" id="pass" type="password" class="form-control py-1">
                                <p class="pass__error" style="color: red; margin: 0; font-size: 10px; height: 8px;"></p>
                                <label for="ppass" style="font-size: 20px;">{{ __('login.repeat_the_password') }}</label>
                                <input value="{{ old('ppass') }}" placeholder="john_not_doe" name="pass_confirmation" id="ppass" type="password" class="form-control py-1">
                                <p class="ppass__error" style="color: red; margin: 0; font-size: 10px; height: 8px;"></p>
                            </div>
                        </div>
                        <div class="text-center" style="padding-bottom: 20px;">
                            <button class="btn btn-primary rounded-5 px-3">{{ __('login.register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

<script defer>

    window.addEventListener('load', function () {

        // BLOCK SWITCHING

            let toggle = document.querySelector('.toggle')
            let toggled = false;

            function switchBlock()
            {
                if(!toggled)
                {
                    reg.classList.remove('d-none')
                    auth.style.animation = 'animate-out 1s forwards'
                    reg.style.animation = 'animate-in 1s forwards'
                    setTimeout(() => {auth.classList.add('d-none')}, 1000);
                } else
                {
                    auth.classList.remove('d-none')
                    reg.style.animation = 'animate-out 1s forwards'
                    auth.style.animation = 'animate-in 1s forwards'
                    setTimeout(() => {reg.classList.add('d-none')}, 1000);
                }
                toggle.removeEventListener('click', switchBlock)
                setTimeout(() => {
                    toggle.addEventListener('click', switchBlock)
                    toggle.innerText = toggled ? `{{ __('login.registration') }} >` : `{{ __('login.sign_in') }} >`
                    toggled = toggled ? false : true
                }, 1000);
            }

            toggle.addEventListener('click', switchBlock)

        // REG VALIDATION
            let reg = document.querySelector('.reg')
            let email = reg.querySelector('input[name="email"]')
            let email__error = reg.querySelector('.email__error')
            let emailTimeout
            email.addEventListener('change', reg_validate)
            email.addEventListener('keyup', function () {
                clearTimeout(emailTimeout)
                emailTimeout = setTimeout(email__check, 1000);
            })
            function email__check()
            {
                let emailValue = email.value.trim();
                let atIndex = emailValue.indexOf('@');
                if (atIndex < 5 && email.value.length !== 0) {
                    email__error.innerText = @json(__('login.at_least_5_characters_before_@'));
                    return false
                } else if (!emailValue.endsWith('@gmail.com') && email.value.length !== 0) {
                    email__error.innerText = @json(__('login.email_address_must_end_in_gmail_com'));
                    return false
                } else if (email.value.length == 0)
                {
                    email__error.innerText = @json(__('login.required_field'));
                    return false
                } else
                {
                    email__error.innerText = ''
                    return true
                }
            }
            let name = reg.querySelector('input[name="login"]')
            let name__error = reg.querySelector('.name__error')
            let nameTimeout
            name.addEventListener('change', reg_validate)
            name.addEventListener('keyup', function () {
                clearTimeout(nameTimeout)
                nameTimeout = setTimeout(name__check, 1000);
            })
            function name__check()
            {
                if(name.value.length == 0)
                {
                    name__error.innerText = @json(__('login.required_field'));
                    return false
                } else if(name.value.length < 6)
                {
                    name__error.innerText = `{{ __('login.min_6_characters') }}`
                    return false
                } else
                {
                    name__error.innerText = ""
                    return true
                }
            }
            let pass = reg.querySelector('input[name="pass"]')
            let pass__error = reg.querySelector('.pass__error')
            let passTimeout
            pass.addEventListener('change', reg_validate)
            pass.addEventListener('keyup', function () {
                clearTimeout(passTimeout)
                passTimeout = setTimeout(pass__check, 1000)
            })
            function pass__check()
            {
                if(pass.value.length == 0)
                {
                    pass__error.innerText = @json(__('login.required_field'));
                    return false
                } else if(pass.value.length < 6)
                {
                    pass__error.innerText = `{{ __('login.min_6_characters') }}`
                    return false
                } else
                {
                    pass__error.innerText = ""
                    return true
                }
            }
            let ppass = reg.querySelector('input[name="pass_confirmation"]')
            let ppass__error = reg.querySelector('.ppass__error')
            let ppassTimeout
            ppass.addEventListener('change', reg_validate)
            ppass.addEventListener('keyup', function () {
                clearTimeout(ppassTimeout)
                ppassTimeout = setTimeout(ppass__check, 1000);
            })
            function ppass__check()
            {
                if(ppass.value !== pass.value)
                {
                    ppass__error.innerText = `{{ __('login.passwords_dont_match') }}`
                    return false
                } else
                {
                    ppass__error.innerText = ''
                    return true
                }
            }
            
            let reg__submit = reg.querySelector('.btn')
            reg__submit.parentElement.addEventListener('mouseenter', reg_validate)
            
            function reg_validate()
            {
                console.log('validating')
                email__check()
                name__check()
                pass__check()
                ppass__check()
                if(email__check() && name__check() && pass__check() && ppass__check())
                {
                    reg__submit.removeAttribute('disabled')
                } else
                {
                    reg__submit.setAttribute('disabled', '')
                }
            }

        // AUTH VALIDATION
            let auth = document.querySelector('.auth')

            let login = auth.querySelector('input[type="text"]')
            let login__error = auth.querySelector('.login__error')
            let loginTimeOut

            login.addEventListener('change', auth_validate)
            login.addEventListener('keydown', login__check)

            function login__check(e) 
            {
                clearTimeout(loginTimeOut)
                if(login.value.length > 15)
                {
                    if(e && e.key !== 'Backspace' && e.key !== 'Delete')
                    {
                        e.preventDefault()
                    }
                    login__error.innerText = `{{ __('login.max_login_length_16_characters') }}`
                    return false
                } else if(login.value.length < 4)
                {
                    loginTimeOut = setTimeout(() => {
                        login__error.innerText = `{{ __('login.min_login_length_3_characters') }}`
                    }, 1000);
                    return false
                } 
                else
                {
                    login__error.innerText = ``
                    return true
                }
            }

            let password = auth.querySelector('input[type="password"]')
            let password__error = auth.querySelector('.password__error')
            let passwordTimeOut

            password.addEventListener('keyup', password__check)
            password.addEventListener('change', auth_validate)

            function password__check()
            {
                clearTimeout(passwordTimeOut)
                if(password.value.length < 6 && password.value.length !== 0)
                {
                    passwordTimeOut = setTimeout(() => {
                        password__error.innerHTML = `{{ __('login.min_password_length_6_characters') }}`
                    }, 1000);
                    return false
                } else if(password.value.length == 0)
                {
                    password__error.innerHTML = @json(__('login.required_field'));
                    return false
                } 
                else
                {
                    password__error.innerHTML = ''
                    return true
                }
            }

            let button = auth.querySelector('button')
            let buttonAccess = {{ session()->has('error') ? 1 : 0 }}

            button.parentElement.addEventListener('mouseenter', auth_validate)

            function auth_validate()
            {
                if(!buttonAccess)
                {
                    if(login__check() && password__check())
                    {
                        button.removeAttribute('disabled')
                    } else
                    {
                        button.setAttribute('disabled', '')
                    }
                } else
                {
                    buttonAccess = 0
                }
            }

        // ON LOAD AND HANDLE OF ELEMENTS SHOW THEM
        let loader__parent = document.querySelector('.loader__parent')
        loader__parent.style.display = 'none'
        let whole__content = document.querySelector('.whole__content')
        whole__content.style.opacity = '1'

    })

    console.log(window.screen.width)

</script>

@php(session()->forget('error'))

@endsection
