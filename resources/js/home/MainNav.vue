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
    <div class="content__container__parent">
        <div class="content__container">
            <div class="content">
                <h1 class="content__title">Твій навігатор</h1>
                <div class="content__flex">
                    <a @click="move_container" href="#goals" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('goals.png')" style="height: 100%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2>Мої цілі</h2>
                        </div>
                    </a>
                    <a @click="move_container" href="#tasks" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('todays tasks.jpg')" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 20px;">Сьогоднішні завдання</h2>
                        </div>
                    </a>
                    <a @click="move_container" href="#week" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('my_week.jpg')" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2>Мій тиждень</h2>
                        </div>
                    </a>
                    <a @click="move_container" href="#completed" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('completed_tasks.jpg')" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 20px;">Виконані завдання</h2>
                        </div>
                    </a>
                    <a @click="move_container" href="#settings" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('settings.jpg')" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 28px;">Налаштування</h2>
                        </div>
                    </a>
                    <a @click="move_container" href="#logout" class="content__flex__block">
                        <div class="content__flex__block-image">
                            <img :src="image('logout.jpg')" style="width: 101%;">
                        </div>
                        <div class="content__flex__block-title">
                            <h2 style="font-size: 25px;">Вийти з системи</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>

</style>
