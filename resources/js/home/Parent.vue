<script setup>

import { ref, markRaw, provide, onMounted } from 'vue'
import MainNav from './MainNav.vue';

const props = defineProps(['asset'])
let previous_hash = ref(window.location.hash)

provide('imported', props)
provide('move_container', move_container)

const MainNavComponent = markRaw(MainNav)
let currentComponent = ref(MainNavComponent)
const homeComponents = {
    '#main': markRaw(MainNav),
    '#goals': markRaw(MainNav), 
    '#tasks': markRaw(MainNav), 
    '#week': markRaw(MainNav), 
    '#completed': markRaw(MainNav), 
    '#settings': markRaw(MainNav), 
    '#logout': markRaw(MainNav), 
}

function move_container(hash)
{
    previous_hash.value = window.location.hash
    window.location.hash = hash
    console.log(previous_hash !== '' || previous_hash !== '#' && window.location.hash == '' || window.location.hash == '#')
    if(previous_hash == '' || previous_hash == '#')
    {
        document.querySelector('.content__container').style.animation = 'content__container__disappear 1s forwards'
        setTimeout(() => {
            
        }, 1000);
    } else if(previous_hash !== '' || previous_hash !== '#' && window.location.hash == '' || window.location.hash == '#')
    {
        document.querySelector('.content__container').style.animation = 'content__container__appear 1s forwards'
    }
}

onMounted(() => {
    
    function checkUrl()
    {
        let currentHash = window.location.hash
        // console.clear()
        console.log(`previous hash ${previous_hash.value}`)
        console.log(`current hash ${currentHash}`)
        if(window.location.hash == '' || window.location.hash == '#')
        {
            currentComponent = ref(homeComponents['#main'])
        } else
        {
            currentComponent = ref(homeComponents[currentHash])
        }
    }

    checkUrl()
    
    window.addEventListener('popstate', checkUrl);
    window.addEventListener('pushstate', checkUrl);
    window.addEventListener('replacestate', checkUrl);
})

</script>
<template>
    <div>
        <div @click="move" class="content__container__parent">
            <component :is="currentComponent"></component>
        </div>
    </div>
</template>
