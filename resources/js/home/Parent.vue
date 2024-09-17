<script setup>

import { ref, markRaw, provide, onMounted } from 'vue'
import MainNav from './MainNav.vue';

const props = defineProps(['asset'])

provide('imported', props)

const MainNavComponent = markRaw(MainNav)
const currentComponent = ref(MainNavComponent)
const homeComponents = {
    '#goals': markRaw(MainNav), 
    '#tasks': markRaw(MainNav), 
    '#week': markRaw(MainNav), 
    '#completed': markRaw(MainNav), 
    '#settings': markRaw(MainNav), 
    '#logout': markRaw(MainNav), 
}

onMounted(() => {
    
    let currentHash = window.location.hash

    function checkUrl()
    {
        if(window.location.hash = '')
        {
            currentComponent = ref(MainNavComponent)
        } else
        {
            currentComponent = ref()
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
        <component :is="currentComponent"></component>
    </div>
</template>
<style>

</style>
