// GOAL CREATE

window.addEventListener('load', function () {

    let goal__create = document.querySelector('.freepick__parent').parentElement

    // DEFAULT VALUE FOR DATE INPUT (LAST DAY OF THIS YEAR)
    let date = goal__create.querySelector('input[type="date"]') // input of type date
    date.value = new Date(new Date().getFullYear(), 11, 31).toISOString().split('T')[0] // default input value of format yyyy-mm-dd

    // FREEPICK IMAGE CLICK CHANGES IMAGE OF PREVIEW
    let preview__image = goal__create.querySelector('.preview img')
    let freepick__image__clickables = goal__create.querySelectorAll('.freepick__image__parent div')
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
            fixImage(preview__image)
        })
    });

    // INPUT TYPE TEXT VALUE TO PREVIEW ELEMENT
    let input = goal__create.querySelector('.form-item input[type="text"]') // input of type text
    input.focus() // on load of page focus on text input
    let preview__text = goal__create.querySelector('.preview__parent .preview .hidden__content p') // preview text element
    let typingTimer // timer of ending typing
    let input__error = goal__create.querySelector('.form-item .input__error p')
    let images_limit = 1
    let images_page = 1
    let loader__parent = goal__create.querySelector('.loader__mini__parent') // loader
    let freepick__image__parents = goal__create.querySelectorAll('.freepick__image__parent')
    input.addEventListener('keyup', function () {
        preview__text.innerText = input.value // set to input value preview to text
        if(input.value.length == 0) // if input is empty set default value
        {
            preview__text.innerText = `Суть цілі`
        }
        clearTimeout(typingTimer) // prevent function before text is written
        typingTimer = setTimeout(async () => { // do something after text is written
            if(input.value.length > 1)
            {
                freepick__image__parents.forEach(freepick__image__parent => {
                    freepick__image__parent.style.opacity = '0'
                });
                loader__parent.style.opacity = '1'
                let imagess = [
                    'https://ichef.bbci.co.uk/news/976/cpsprodpb/4A05/production/_105794981_55davidlammyfinalimagesmaller.jpg',
                    'https://www.rollingstone.com/wp-content/uploads/2022/10/Get-Out.jpg?w=1581&h=1054&crop=1',
                    'https://preview.redd.it/wsm1n5t735o31.jpg?width=1080&crop=smart&auto=webp&s=5cd59f4aaf5c2989bbc8002589697fbf04e88a7e',
                    'https://as1.ftcdn.net/v2/jpg/01/28/33/44/1000_F_128334454_D9RvJn8RDG17P7wPPmv6qHnChR9IcPif.jpg',
                ]
                let loaded = 0
                for (let i = 0; i < freepick__image__parents.length; i++) {
                    freepick__image__parents[i].querySelector('img').src = imagess[i]
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
                        preview__image.src = imagess[i]
                        preview__image.onload = () => {
                            fixImage(preview__image)
                        }
                    }
                }
                // try {
                //     const response = await fetch(`{{ route('home.getImages') }}/${input.value}/${images_limit}/${images_page}`, {
                //         method: 'GET',
                //         headers: {
                //             'Content-Type': 'application/json',
                //         },
                //     });
                //     if (!response.ok) {
                //         throw new Error(`HTTP error! Status: ${response.status}`);
                //     }
                //     const data = await response.json();
                //     console.log(data.images[0]);
                //     images_page += 1
                // } catch (error) {
                //     console.error('Error fetching data:', error);
                // }
            } else
            {
                preview__image.src = `{{ asset('storage/images/empty.jpg') }}`
            }
        }, 1000);
    })
    input.addEventListener('keydown', function (e) { // prevent writing more than 45 symbols
        if(input.value.length >= 45 && event.key !== 'Backspace' && event.key !== 'Delete')
        {
            e.preventDefault()
            input__error.innerText = `max 40 symbols`
        }
    })
}
)

