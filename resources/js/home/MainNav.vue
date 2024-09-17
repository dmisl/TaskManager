<script setup>

import { ref, inject } from 'vue'

console.clear()

const props = inject('imported')
const move_container = inject('move_container')

function image(src)
{
    return `${props.asset}/images/${src}`
}


</script>
<template>
    <div class="content__container">
        <div class="content">
            <h1 class="content__title">Твій навігатор</h1>
            <div class="content__flex">
                <a @click="move_container('#goals')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('goals.png')" style="height: 100%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2>Мої цілі</h2>
                    </div>
                </a>
                <a @click="move_container('#tasks')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('todays tasks.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 20px;">Сьогоднішні завдання</h2>
                    </div>
                </a>
                <a @click="move_container('#week')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('my_week.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2>Мій тиждень</h2>
                    </div>
                </a>
                <a @click="move_container('#completed')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('completed_tasks.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 20px;">Виконані завдання</h2>
                    </div>
                </a>
                <a @click="move_container('#settings')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('settings.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 28px;">Налаштування</h2>
                    </div>
                </a>
                <a @click="move_container('#logout')" class="content__flex__block">
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
</template>
<style scoped>

</style>
