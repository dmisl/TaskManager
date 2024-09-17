<script setup>

import { ref, inject } from 'vue'

const manage_elements = inject('manage_elements')

const image = inject('image')

</script>
<template>
    <div class="content__container">
        <div class="content">
            <h1 class="content__title">Твій навігатор</h1>
            <div class="content__flex">
                <a @click="manage_elements('#goals')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('goals.png')" style="height: 100%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2>Мої цілі</h2>
                    </div>
                </a>
                <a @click="manage_elements('#tasks')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('todays tasks.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 20px;">Сьогоднішні завдання</h2>
                    </div>
                </a>
                <a @click="manage_elements('#week')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('my_week.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2>Мій тиждень</h2>
                    </div>
                </a>
                <a @click="manage_elements('#completed')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('completed_tasks.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 20px;">Виконані завдання</h2>
                    </div>
                </a>
                <a @click="manage_elements('#settings')" class="content__flex__block">
                    <div class="content__flex__block-image">
                        <img :src="image('settings.jpg')" style="width: 101%;">
                    </div>
                    <div class="content__flex__block-title">
                        <h2 style="font-size: 28px;">Налаштування</h2>
                    </div>
                </a>
                <a @click="manage_elements('#logout')" class="content__flex__block">
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
