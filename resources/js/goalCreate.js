// GOAL CREATE

window.addEventListener('load', function () {

    let goal__create = document.querySelector('.freepick__parent').parentElement

    // FIXING IMAGES ON LOAD
    let block__images = document.querySelectorAll(".preview img, .freepick__image__parent img")

    block__images.forEach(image => {
        if(image.offsetHeight == image.offsetWidth)
        {
            image.style.width = '100%'
        } else if(image.offsetWidth > image.offsetHeight)
        {
            image.style.cssText = "height: 100%; object-fit: cover;"
            image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;'
        } else
        {
            image.style.cssText = "width: 100%; object-fit: cover;"
            image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center; flex-direction: column;'
        }
    });

    // ADDING HINTS
    tippy('.name__hint', {
        theme: 'gradient',
        content: "Впишіть сюди суть вашої цілі. Вона буде відображатися в списку ваших цілей. Після написання зліва з'явиться попередній перегляд того, як це виглядатиме. З назви вашої цілі також буде згенеровано кілька картинок, з яких ви зможете вибрати фон — персоналізуйте все під себе!",
        placement: 'top',
        animation: 'shift-away',
    });

    tippy('.tasks__hint', {
        theme: 'gradient',
        content: "Вибрана вами кількість завдань потрібна для виконання кожного тижня. Подумайте, перш ніж вибрати: намагайтеся робити якомога більше для швидшого досягнення цілі, але не перестарайтеся. Згодом у налаштуваннях ви зможете змінити цю кількість.",
        placement: 'top',
        animation: 'shift-away',
    });

    tippy('.date__hint', {
        theme: 'gradient',
        content: `Виберіть бажану для вас дату досягнення цілі. Поміркуйте, враховуючи всі "за" і "проти". Це допоможе вам налаштувати реалістичні терміни для успіху!`,
        placement: 'top',
        animation: 'shift-away',
    });

    // DEFAULT VALUE FOR DATE INPUT (LAST DAY OF THIS YEAR)
    let date = goal__create.querySelector('input[type="date"]') // input of type date
    date.value = new Date(new Date().getFullYear(), 11, 31).toISOString().split('T')[0] // default input value of format yyyy-mm-dd

    // FREEPICK IMAGE CLICK CHANGES IMAGE OF PREVIEW
    let preview__image = goal__create.querySelector('.preview img')
    let freepick__image__clickables = goal__create.querySelectorAll('.freepick__image__parent div')
    let input__image = document.querySelector('.input__image')
    freepick__image__clickables.forEach(freepick__image__clickable => {
        freepick__image__clickable.addEventListener('click', function (e)
        {
            if(goal__create.querySelector('.selected'))
            {
                goal__create.querySelector('.selected').classList.remove('selected')
            }
            freepick__image__clickables.forEach(element => {
                element.querySelector('p').innerText = `Вибрати`
            });
            e.target.classList.add('selected')
            e.target.querySelector('p').innerText = `Вибране`
            preview__image.src = e.target.parentElement.querySelector('img').src
            input__image.value = e.target.parentElement.querySelector('img').src
            fixImage(preview__image)
        })
    });

    // LOAD IMAGES FROM FREEPIK AND SET THEM TO BLOCKS
    let previousRequests = []
    async function loadImages(value)
    {
        let loader__parent = goal__create.querySelector('.loader__mini__parent') // loader
        let freepick__image__parents = goal__create.querySelectorAll('.freepick__image__parent')
        if(value.length > 4)
        {
            display_freepick()
            display_preview()
            // checking previous requests
            let page = 0
            page = previousRequests.filter(request => request === value).length+1
            // hiding available images and show loader
            freepick__image__parents.forEach(freepick__image__parent => {
                freepick__image__parent.style.opacity = '0'
            });
            loader__parent.style.opacity = '1'
            try {
                // getting images from freepik
                const response = await fetch(`${route__getImages}/${value}/4/${page}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                previousRequests.push(value)
                const data = await response.json();
                // after we get images handle them to our blocks
                let loaded = 0
                for (let i = 0; i < freepick__image__parents.length; i++) {
                    freepick__image__parents[i].querySelector('img').src = data.images[i]
                    freepick__image__parents[i].querySelector('img').onload = () => {
                        fixImage(freepick__image__parents[i].querySelector('img'))
                        loaded += 1
                        if(loaded == freepick__image__parents.length)
                        {
                            freepick__image__parents.forEach(freepick__image__parent => {
                                freepick__image__parent.style.opacity = '1'
                            });
                            loader__parent.style.opacity = '0'
                        }
                    }
                    if(i == 0)
                    {
                        if(goal__create.querySelector('.selected'))
                        {
                            goal__create.querySelector('.selected').classList.remove('selected')
                        }
                        freepick__image__clickables.forEach(element => {
                            element.querySelector('p').innerText = `Вибрати`
                        });
                        freepick__image__parents[i].querySelector('div').classList.add('selected')
                        freepick__image__parents[i].querySelector('p').innerText = `Вибране`
                        preview__image.src = freepick__image__parents[i].querySelector('img').src
                        preview__image.src = data.images[i]
                        input__image.value = data.images[i]
                        preview__image.onload = () => {
                            fixImage(preview__image)
                        }
                    }
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        } else
        {
            hide_freepick()
            preview__image.src = `${asset}/empty.jpg`
            input__image.value = ''
        }
    }

    function hide_freepick()
    {
        let freepick = document.querySelector('.goal__create .freepick')
        if(freepick.style.animation !== 'disappear_right 1s forwards' && freepick.style.animation !== '')
        {
            freepick.style.animation = 'disappear_right 1s forwards'
        }
    }

    function display_freepick()
    {
        let freepick = document.querySelector('.goal__create .freepick')
        if(freepick.style.animation !== 'appear_left 1s forwards')
        {
            freepick.style.animation = 'appear_left 1s forwards'
        }
    }

    function display_preview()
    {
        let preview = document.querySelector('.goal__create .preview')
        if(preview.style.animation !== 'appear_right 1s forwards')
        {
            preview.style.animation = 'appear_right 1s forwards'
        }
    }

    // INPUT TYPE TEXT VALUE TO PREVIEW ELEMENT
    let input = goal__create.querySelector('.form-item input[type="text"]') // input of type text
    input.focus() // on load of page focus on text input
    let preview__text = goal__create.querySelector('.preview__parent .preview .hidden__content p') // preview text element
    let typingTimer // timer of ending typing
    let input__error = goal__create.querySelector('.form-item .input__error p')
    input.addEventListener('keyup', function () {
        preview__text.innerText = input.value // set to input value preview to text
        if(input.value.length == 0) // if input is empty set default value
        {
            preview__text.innerText = `Суть цілі`
        }
        clearTimeout(typingTimer) // prevent function before text is written
        typingTimer = setTimeout(async () => {
            loadImages(input.value)
        }, 1000); // do something after text is written
    })
    // FREEPICK LOAD BUTTON
    let freepick__load = document.querySelector('.freepick__load')
    freepick__load.addEventListener('click', async () => {
        loadImages(input.value)
    })
    // PREVENT WRITING AFTER 45 SYMBOLS
    input.addEventListener('keydown', function (e) {
        if(input.value.length >= 45 && event.key !== 'Backspace' && event.key !== 'Delete')
        {
            e.preventDefault()
            display_preview()
            input__error.innerText = `max 45 symbols`
        }
    })

    // PREVENT FORM SENDING AND CHECKING FORM

    let form = goal__create.querySelector('.form')
    form.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            if(!form_check())
            {
                e.preventDefault();
            }
        }
    })

    let form__button = form.querySelector('button')
    let form__button__parent = form.querySelector('.form-button-parent')
    let form__button__events = ['mouseover', 'click']
    form__button__events.forEach(event => {
        form__button__parent.addEventListener(event, form_check)
    });

    let defaultImage = preview__image.src

    form.querySelector('input[type="text"]').addEventListener('change', form_check)
    form.querySelector('select').addEventListener('change', form_check)
    form.querySelector('input[type="date"]').addEventListener('change', form_check)

    function form_check()
    {
        let goal__name = form.querySelector('input[type="text"]')
        let goal__tasks = form.querySelector('select')
        let goal__date = form.querySelector('input[type="date"]')
        let goal__name__error = form.querySelector('.input__error p')
        let goal__select__error = form.querySelector('.select__error p')
        let goal__date__error = form.querySelector('.date__error p')
        if(goal__name.value.length < 5)
        {
            goal__name__error.innerText = `мінімум 5 символів`
            form__button.setAttribute('disabled', '')
            return false
        } else
        {
            goal__name__error.innerText = ''
        }
        if(new Date().toISOString().split('T')[0] >= goal__date.value)
        {
            goal__date__error.innerText = `бажана дата завершення цілі не може бути меншою за сьогоднішню `
            form__button.setAttribute('disabled', '')
            return false
        } else
        {
            goal__date__error.innerText = ''
        }
        if(preview__image.src == defaultImage)
        {
            form__button.setAttribute('disabled', '')
            return false
        }
        if(input__image.value == '')
        {
            return false
        }
        form__button.removeAttribute('disabled')
        return true
    }

}
)

