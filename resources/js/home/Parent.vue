<script setup>

import { ref, markRaw, provide, onMounted, nextTick } from 'vue'
import MainNav from './MainNav.vue';
import Menu from './Menu.vue';
import Goals from './Goals.vue';

const props = defineProps(['asset'])
let previous_hash = ref(window.location.hash)

provide('manage_elements', manage_elements)
provide('image', image)
provide('fix_images', fix_images)

const MainNavComponent = markRaw(MainNav)
let currentComponent = ref(MainNavComponent)
const homeComponents = {
    '#main': markRaw(MainNav),
    '#goals': markRaw(Goals),
    '#tasks': markRaw(MainNav),
    '#week': markRaw(MainNav),
    '#completed': markRaw(MainNav),
    '#settings': markRaw(MainNav),
    '#logout': markRaw(MainNav),
    '#menu': markRaw(Menu)
}
function fix_images()
{
    setTimeout(() => {
        let block__images = document.querySelectorAll(".flex__block img")

        if(block__images)
        {
            if(block__images.length == 0) {
                block__images = document.querySelectorAll('.bigger__flex__block img')
                document.querySelector('.flex').style.overflow = 'visible'
                document.querySelector('.flex').style.justifyContent = 'center'
            }
            block__images.forEach(image => {
                if(image.offsetHeight == image.offsetWidth)
                {
                    image.style.width = '100%'
                } else if(image.offsetWidth > image.offsetHeight)
                {
                    image.style.cssText = "height: 100%; object-fit: cover;"
                    image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center;'
                } else
                {
                    image.style.cssText = "width: 100%; object-fit: cover;"
                    image.parentElement.style.cssText = 'position: relative; display: flex; justify-content: center; align-items: center;'
                }
            });
        } else
        {
            console.log('block images are not loaded')
        }

    }, 500);
}
function appear_content()
{
    document.querySelector('.moved__container').classList.add('d-none')
    document.querySelector('.menu').classList.add('d-none')
    document.querySelector('.content__container').classList.remove('d-none')
    document.querySelector('.content__container').style.animation = 'content__container__appear 1s forwards'
}
function appear_moved()
{
    document.querySelector('.content__container').classList.add('d-none')
    document.querySelector('.menu').classList.remove('d-none')
    document.querySelector('.moved__container').classList.remove('d-none')
    document.querySelector('.menu').style.animation = 'menu__appear 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards'
    document.querySelector('.moved__container').style.animation = 'moved__container__appear 1s ease-out forwards'
    fix_images()
}

function manage_elements(hash)
{
    previous_hash.value = window.location.hash
    window.location.hash = hash
    if(previous_hash.value == '' && window.location.hash.length > 1 || previous_hash.value == '#' && window.location.hash.length > 1)
    {
        document.querySelector('.content__container').style.animation = 'content__container__disappear 1s forwards'
        setTimeout(appear_moved, 1000);
    } else if(window.location.hash.length < 2 && previous_hash.value.length < 2)
    {
        appear_content()
    } else if(window.location.hash.length > 1 && previous_hash.value.length > 1)
    {
        appear_moved()
    } else if(window.location.hash.length < 2 && previous_hash.value.length > 1)
    {
        document.querySelector('.menu').style.animation = 'menu__disappear 1s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards'
        document.querySelector('.moved__container').style.animation = 'moved__container__disappear 1.5s ease-out forwards'
        setTimeout(appear_content, 1500);
    }
}

function image(src)
{
    return `${props.asset}/images/${src}`
}

onMounted(async () => {

    let wholeContent = document.querySelector('.whole__content')
    let loadingParent = document.querySelector('.loader__parent')
    wholeContent.style.display = 'none'

    manage_elements(window.location.hash)

    window.addEventListener("load", () => {

        wholeContent.style.display = 'block'
        loadingParent.style.display = 'none'

        function checkUrl()
        {
            let currentHash = window.location.hash
            // console.log(`previous hash ${previous_hash.value}`)
            // console.log(`current hash ${currentHash}`)
            if(window.location.hash !== '' || window.location.hash !== '#')
            {
                currentComponent = ref(homeComponents['#goals'])
            }
        }

        checkUrl()

        window.addEventListener('popstate', checkUrl);
        window.addEventListener('pushstate', checkUrl);
        window.addEventListener('replacestate', checkUrl);

    });

})

</script>
<template>
    <div>
        <component :is="homeComponents['#menu']"></component>
        <div @click="move" class="content__container__parent">
            <component :is="homeComponents['#main']"></component>
            <component :is="homeComponents['#goals']"></component>
        </div>
    </div>
</template>
