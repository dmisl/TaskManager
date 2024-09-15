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
    {{-- FIRST BLOCK --}}
    <div class="first-block">
        <!-- BACKGROUND -->
        <div class="first-block-background" style="background-image: url('{{ asset('storage/images/tz_background.jpg') }}')"></div>
        <div class="first-block-background-color"></div>
        <!-- CONTENT -->
        <div class="first-block-content" style="display: flex; flex-direction: column;">
            <h1>
                <?php
                    // $slogan = get_field('first-block-title');
                    // if (strlen($slogan) >0) {
                    //     echo $slogan;
                    // }
                ?>
                ОНЛАЙН-КУРС<br>
                «ЧИЗМОНГЕР: основи»
            </h1>
            <p>Ми зібрали всю теоретичну базу в одному місці, яка стане підґрунтям<br> для твого подальшого розвитку як сирного професіона.<br>Знання в 3 дії — купуй, отримуй доступ до навчальної платформи та<br> зростай професійно! </p>
            <div class="first-block-button-parent">
                <a href="#last">купити</a>
            </div>
            <div class="first-block-flex" style="flex-grow: 1;">
                <div>
                    <h1 style="">4</h1>
                    <p>модулі</p>
                </div>
                <div>
                    <h1>16</h1>
                    <p>уроків</p>
                </div>
                <div>
                    <h1>100+</h1>
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
                <ul class="second-block-list" data-height="100">
                    <li>Урок 1. Історія сирів</li>
                    <li>Урок 2. Породи молочних тварин</li>
                    <li>Урок 3. Сировина для виробництва сиру</li>
                    <li>Урок 4. Основні етапи виробництва сиру</li>
                </ul>
                <a href="#last" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block">
                <div class="second-block-recommendation">
                    <p>Рекомендовано з модулем Чизмонгер</p>
                </div>
                <h2 class="second-block-title">Модуль 2: "ОРГАНОЛЕПТИКА"</h2>
                <ul class="second-block-list" data-height="100">
                    <li>Урок 1. Сенсорний аналіз. Інструмент “Колесо смаку” </li>
                    <li>Урок 2. Як дегустувати? Різновиди смаку</li>
                </ul>
                <a href="#last" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block selected">
                <div class="second-block-recommendation">
                    <p>Рекомендовано</p>
                </div>
                <h2 class="second-block-title">Модуль 3: "КЛАСИФІКАЦІЯ СИРІВ ТА ЯК З НИМИ ПРАЦЮВАТИ"</h2>
                <ul class="second-block-list" data-height="150">
                    <li>Урок 1. Різновиди класифікації сирів. 8 категорій сиру</li>
                    <li>Урок 2. Знаки якості</li>
                    <li>Урок 3. Основні правила зберігання сирів</li>
                    <li>Урок 4. Правила гігієни при роботі з сиром</li>
                    <li>Урок 5. Інструменти для роботи з різними сирами</li>
                </ul>
                <a href="#last" class="second-block-link">Отримати консультацію</a>
            </div>
            <div class="second-block-flex-block">
                <div class="second-block-recommendation"></div>
                <h2 class="second-block-title">Модуль 4: "Налаштування сирного простору та презентація продукту"</h2>
                <ul class="second-block-list" data-height="150">
                    <li>Урок 1. Сенсорний аналіз. Інструмент “Колесо смаку” </li>
                    <li>Урок 2. Як дегустувати? Різновиди смаку</li>
                </ul>
                <a href="#last" class="second-block-link">Отримати консультацію</a>
            </div>
        </div>
        <h3 class="second-block-price">Вартість курсу 8000 грн</h3>
        <div class="second-block-button-parent">
            <a href="#last" class="second-block-button">Купити</a>
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
                    <p>Друже, я впевнена, що тобі буде цікаво слухати цей курс. Тут ти<br>знайдеш цікаву та пізнавальну інформацію та факти, які зможеш<br>використовувати не тільки на робочому місці, а і в житті.</p>
                    <p class="fourth-block-small" style="display: none">Друже, я впевнена, що тобі буде цікаво слухати <span style="padding-left: 7px;">цей </span>курс. Тут ти знайдеш цікаву та пізнавальну  <span style="padding-left: 17px;">інформацію</span> та факти, які зможеш <span style="padding-left: 25px;">використовувати</span> не тільки на робочому місці,<br><span style="padding-left: 15px;">а</span> і в житті.</p>
                    <ul>
                        <li>Дипломована сирна експертка з понад 10-ти річним досвідом<br>роботи з сиром та професійною кулінарією</li>
                        <li>Членкиня міжнародного журі на World Cheese Awards</li>
                        <li>Одна із засновниць фестивалю ProCheese Awards</li>
                        <li>Гастромандрівниця та дослідниця сирної культури</li>
                        <li>Авторка та натхненниця ProCheese Community</li>
                    </ul>
                    <ul class="fourth-block-small-list" style="display: none;">
                        <li>Дипломована сирна експертка з понад 10-ти <br>річним досвідом роботи з сиром та професійною<br>кулінарією</li>
                        <li>Членкиня міжнародного журі на<br>World Cheese Awards</li>
                        <li>Одна із засновниць фестивалю ProCheese Awards</li>
                        <li>Гастромандрівниця та дослідниця сирної культури</li>
                        <li>Авторка та натхненниця ProCheese Community</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fourth-block-line"></div>
    </div>
    <div class="fifth-block">
        <h1 class="fifth-block-title">ДЛЯ КОГО ЦЕ НАВЧАННЯ?</h1>
        <p class="fifth-block-desc">для всіх, хто дотичний до сирної сфери</p>
        <div class="fifth-block-flex">
            <div>
                <div class="fifth-block-flex-block" style="padding-bottom: 40px; display: flex; justify-content: right;">
                    <div style="width: 940px;">
                        <div style="width: 535px;">
                            <h3 class="fifth-block-text" style="margin-top: 100px;">продавців сирних виробів</h3>
                            <ul class="fifth-block-list">
                                <li>актуалізувати теоретичні знання</li>
                                <li>розібратися з категоріями сиру та їхніми особливостями</li>
                                <li>розібратися в споживацьких трендах</li>
                                <li>дізнатися, як підтримувати в належному стані сирний простір</li>
                                <li>дізнатися, як продовжити життєвий цикл сиру</li>
                                <li>розібратися з принципами поєднання для рекомендацій<br>клієнтам</li>
                                <li>оволодіти базовими знаннями з подачі та використання<br>сиру в стравах для якісної консультації</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fifth-block-flex-block" style="padding-bottom: 25px; display: flex; justify-content: right;">
                    <div style="width: 940px;">
                        <div style="width: 685px;"></div>
                        <h3 class="fifth-block-text" style="margin-top: 50px;">закупологи</h3>
                        <ul class="fifth-block-list">
                            <li>зрозуміти який асортимент буде найбільш конкурентноспроможним</li>
                            <li>знання продукту, яке допомагає у проведенні перемовин з партнерами</li>
                            <li>зрозуміти, як обирати продукт</li>
                            <li>розібратися в споживацьких трендах</li>
                            <li>розумітися в процесах роботи з сиром для налаштування ефективного простору</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <div class="fifth-block-flex-block" style="padding-bottom: 40px;">
                    <div style="width: 690px; display: flex; justify-content: center;">
                        <div style="width: 530px;">
                            <h3 class="fifth-block-text" style="margin-top: 50px;">власників сирних крамниць</h3>
                            <ul class="fifth-block-list">
                                <li>розібратися в усіх аспектах ведення бізнесу та роботі в цій<br>ніші, з цим продуктом</li>
                                <li>дізнатися, що в тренді, які зміни на внутрішньому ринку,<br>споживацькі настрої</li>
                                <li>отримати зрозумілий алгоритм дій по управлінню сирною<br>крамницею</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fifth-block-flex-block" style="padding-bottom: 20px;">
                    <div class="fifth-block-parent" style="padding-left: 200px;">
                        <h3 class="fifth-block-text" style="margin-top: 50px;">категорійних менеджерів</h3>
                        <ul class="fifth-block-list">
                            <li>зрозуміти як ефективно управляти категорією та виконувати<br>KPI по вітрині</li>
                            <li>зрозуміти поточні тренди, щоб формувати актуальні<br>пропозиції</li>
                            <li>зрозумієте принципи ротації сирів за сезонністю та<br>за потребами</li>
                            <li>зрозумієте як створити конкурентоздатну сирну <br>категорію\вітринув порівнянні з іншими мережами</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fifth-block-image-parent">
            <img class="fifth-block-image" src="{{ asset('storage/images/teacherr.png') }}">
        </div>
        <div style="width: 60%; display: flex; justify-content: right;">
            <div style="width: 940px;">
                <a href="#last" class="second-block-button" style="z-index: 11; position: relative; top: -55px; left: 200px;">купити</a>
            </div>
        </div>
    </div>
    <div class="sixth-block">
        ПРИХОВАНИЙ
    </div>
    <div class="seventh-block" id="last">
        <div class="seventh-block-parent">
            <h1 class="seventh-block-header">Хочу придбати курс</h1>
            <table class="seventh-block-table">
                <tr>
                    <th><h1>8000 грн*</h1></th>
                    <th><h2><span style="font-weight: 700;">*можлива корпоративна знижка при купівля від 3-х доступів;</span style="font-weight: 700;"><br>для отримання знижки при оплаті онлайн, будь ласка,<br>звертайтеся до нашої адміністраторки</h2></th>
                </tr>
                <tr>
                    <td>
                        <div class="parent">
                            <p>Після оплати в найближчий час з вами звʼяжеться наша<br>адміністраторка та надасть подальші інструкції стосовно<br>отримання доступу</p>
                            <div>
                                <a href="#somewhere" class="seventh-block-table-button">оплата онлайн</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="parent">
                            <p>Якщо ви бажаєте оплатити онлайн-курс за виставленим<br>рахунком, будь ласка, заповніть форму нижче, натиснувши<br>на кнопку</p>
                            <div>
                                <a href="#somewhere" style="text-decoration: none; color: ##322C60;">
                                    <div class="seventh-block-table-button-lines">
                                        оплата за виставленим<br>рахунком
                                    </div>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="eighth-block">
        <h1 class="eighth-block-header"></h1>
        <div class="eighth-block-content">
            <div class="image">
                <img src="{{ asset('storage/images/contact.jpg') }}" style="height: 100%;">
            </div>
            <div class="info">
                <h5 class="contact-name">Катерина Новоселова</h5>
                <div class="contact-line">
                    <p>Люблю поговорити: <a href="tel:+380505690115">+380505690115</a></p>
                </div>
                <div class="contact-line">
                    <p>ТG: <a href="https://t.me/whitefox1698">@whitefox1698</a></p>
                </div>
                <div class="contact-line">
                    <p>Viber: <a href="tel:+380505690115">+380505690115</a></p>
                </div>
                <div class="contact-line">
                    <p>Email: <a href="mailto:support@procheese.ua">support@procheese.ua</a></p>
                </div>
                <div class="time-parent">
                    <h1 class="time-title">Графік роботи Академії:</h1>
                    <div class="time-flex">
                        <div class="time-text">
                            понеділок – п’ятниця
                        </div>
                        <div class="time-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#322C60" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="time-flex">
                        <div class="time-text">09:00-18:00</div>
                        <div class="time-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#322c60" width="20" height="20" viewBox="0 0 32 32" version="1.1">
                                <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
