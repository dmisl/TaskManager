<script setup>

import { ref, inject } from 'vue'

console.clear()

const props = inject('imported')

function image(src)
{
    return `${props.asset}/images/${src}`
}

function change_view(event)
{
    // let all_blocks = document.querySelectorAll('.content__flex__block')
    // all_blocks.forEach(block => {
    //     block.classList.add('fade-out')
    // });
    // document.querySelector('.content__container').style.animation = 'dissappear-in-right 1s ease-out forwards'
    // setTimeout(() => {
    //     document.querySelector('.content__title').style.display = 'none'
    //     document.querySelector('.content__flex').style.display = 'none'
    //     document.querySelector('.content__container').style.animation = 'slide-in-right 1s ease-out forwards'
    //     document.querySelector('.content__container').style.width = '1000px'
    //     document.querySelector('.menu').style.display = 'block'
    //     document.querySelector('.menu').style.animation = 'slide-in-left 1.5s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards'
    // }, 1000);
}


</script>
<template>
    <div>

    </div>
</template>
<style scoped>

</style>
