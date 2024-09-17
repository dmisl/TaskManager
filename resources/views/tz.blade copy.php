<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/css/style.css')
</head>
<body>
    <header>
        <h1>
            Дуже крутий хеадер
        </h1>
    </header>
    {{-- FIRST BLOCK --}}
    <div class="first-block">
        {{-- BACKGROUND --}}
        <div class="first-block-background" style="background-image: url('{{ asset('storage/images/tz_background.jpg') }}');"></div>
        <div class="first-block-background-color"></div>
        {{-- CONTENT --}}
        <div class="first-block-content">
            <h1>
                ОНЛАЙН-КУРС<br>«ЧИЗМОНГЕР: основи»
            </h1>
            <p>Ми зібрали всю теоретичну базу в одному місці, яка стане підґрунтям<br> для твого подальшого розвитку як сирного професіона.<br>Знання в 3 дії — купуй, отримуй доступ до навчальної платформи та<br> зростай професійно! </p>
            <div class="first-block-button-parent">
                <button>купити</button>
            </div>
            <div class="first-block-flex">
                <div>
                    <h1>4</h1>
                    <p>модулі</p>
                </div>
                <div>
                    <h1>16</h1>
                    <p>уроків</p>
                </div>
                <div>
                    <h1>100</h1>
                    <p>годин</p>
                </div>
            </div>
        </div>
    </div>
    {{-- SECOND BLOCK --}}
    <div class="second-block">
        <h1>НАПОВНЕННЯ ОНЛАЙН-КУРСУ</h1>
        <div class="second-block-flex">
            <div class="second-block-flex-block">
                <div class="second-block-recommendation"></div>
                <h2 class="second-block-title">Модуль 1: "ОСНОВИ"</h2>
                <ul class="second-block-list">
                    <li>Урок 1. Історія сирів</li>
                    <li>Урок 2. Породи молочних тварин</li>
                    <li>Урок 3. Сировина для виробництва сиру</li>
                    <li>Урок 4. Основні етапи виробництва сиру</li>
                </ul>
                <a href="#somewhere" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block">
                <div class="second-block-recommendation">
                    <p>Рекомендовано з модулем Чизмонгер</p>
                </div>
                <h2 class="second-block-title">Модуль 2: "ОРГАНОЛЕПТИКА"</h2>
                <ul class="second-block-list">
                    <li>Урок 1. Сенсорний аналіз. Інструмент “Колесо смаку” </li>
                    <li>Урок 2. Як дегустувати? Різновиди смаку</li>
                </ul>
                <a href="#somewhere" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block selected">
                <div class="second-block-recommendation">
                    <p>Рекомендовано</p>
                </div>
                <h2 class="second-block-title">Модуль 3: "КЛАСИФІКАЦІЯ СИРІВ ТА ЯК З НИМИ ПРАЦЮВАТИ"</h2>
                <ul class="second-block-list">
                    <li>Урок 1. Різновиди класифікації сирів. 8 категорій сиру</li>
                    <li>Урок 2. Знаки якості</li>
                    <li>Урок 3. Основні правила зберігання сирів</li>
                    <li>Урок 4. Правила гігієни при роботі з сиром</li>
                    <li>Урок 5. Інструменти для роботи з різними сирами</li>
                </ul>
                <a href="#somewhere" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block">
                <div class="second-block-recommendation"></div>
                <h2 class="second-block-title">Модуль 4: "Налаштування сирного простору та презентація продукту"</h2>
                <ul class="second-block-list">
                    <li>Урок 1. Сенсорний аналіз. Інструмент “Колесо смаку” </li>
                    <li>Урок 2. Як дегустувати? Різновиди смаку</li>
                </ul>
                <a href="#somewhere" class="second-block-link">Отримати консультацію</a>
            </div>
        </div>
        <h3 class="second-block-price">Вартість курсу 8000 грн</h3>
        <div class="second-block-button-parent">
            <a href="#somewhere" class="second-block-button">Купити</a>
        </div>
    </div>
    {{-- THIRD BLOCK --}}
    <div class="third-block">
        <div class="third-block-parent">
            <h1 class="third-block-header">Чому онлайн-курс від Академії?</h1>
            <table class="third-block-table">
                <tr>
                    <th><h1>ПЕРЕВАГИ</h1></th>
                    <th><h1>РЕЗУЛЬТАТ</h1></th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>доступ 24/7</li>
                            <li>просто та зручно</li>
                            <li>необхідна початкова база знань зібрана в одному місці</li>
                            <li>додаткові матеріали: робочий зошит з конспектом лекцій</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>зрозумієте сир як продукт</li>
                            <li>навчитеся обґрунтовувати вартість та цінність сиру</li>
                            <li>навчитеся зберігати сир в товарному стані якомога довше</li>
                            <li>зрозумієте як створити конкурентроспроможну вітрину</li>
                            <li>підвищите якість консультації</li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{-- FOURTH BLOCK --}}
    <div class="fourth-block">
        <div class="fourth-block-container">
            <h1 class="fourth-block-title">ПРИВІТ, Я ОКСАНА ЧЕРНОВА!</h1>
            <p class="fourth-block-desc">твоя сирна тренерка та наставниця</p>
            <div class="fourth-block-flex">
                <img class="fourth-block-image" src="{{ asset('storage/images/teacher.png') }}">
                <div class="fourth-block-content">
                    <p>Друже, я впевнена, що тобі буде цікаво слухати цей курс. Тут ти знайдеш цікаву та пізнавальну інформацію та факти, які зможеш використовувати не тільки на робочому місці, а і в житті.</p>
                    <ul>
                        <li>Дипломована сирна експертка з понад 10-ти річним досвідом роботи з сиром та професійною кулінарією</li>
                        <li>Членкиня міжнародного журі на World Cheese Awards</li>
                        <li>Одна із засновниць фестивалю ProCheese Awards</li>
                        <li>Гастромандрівниця та дослідниця сирної культури</li>
                        <li>Авторка та натхненниця ProCheese Community</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
