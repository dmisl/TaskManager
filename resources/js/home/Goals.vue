<script setup>

import { inject, onMounted, defineEmits } from 'vue';

const image = inject('image')
const manage_elements = inject('manage_elements')
const fix_images = inject('fix_images')

onMounted(() => {
    let flex__blocks = document.querySelectorAll('.flex__block')
    if(flex__blocks.length == 4)
    {
        flex__blocks.forEach(block => {
            block.classList.remove('flex__block')
            block.classList.add('bigger__flex__block')
        });
    }

    window.onload = fix_images

    document.querySelectorAll('.flex__block, .bigger__flex__block').forEach(block => {
        block.addEventListener('mouseenter', () => {
            document.querySelector('.right__part__hint p').classList.add('active');
        });

        block.addEventListener('mouseleave', () => {
            document.querySelector('.right__part__hint p').classList.remove('active');
        });
    });
})

</script>
<template>
    <div class="moved__container">
        <div class="left__part">
            <a @click="manage_elements('#')" role="button" class="left__part__back">
                <img :src="image('back.png')" alt="">
                <p>назад</p>
            </a>
        </div>
        <div class="right__part">
            <h1 class="right__part__title">Список моїх цілей</h1>
            <div class="right__part__hint">
                <p>нажміть пкм для висвітлення меню</p>
            </div>
            <div class="flex" id="custom__scrollbar">
                <div class="flex__block">
                    <img :src="image('new goal.jpg')" alt="">
                    <div class="hidden__block">
                        <p style="color: white;">Створити нову ціль</p>
                    </div>
                </div>
                <div class="flex__block">
                    <div class="img__parent">
                        <img :src="image('freelance.jpg')" alt="">
                    </div>
                    <div class="hidden__content">
                        <p>Фріланс і ще щось</p>
                    </div>
                </div>
                <div class="flex__block">
                    <div class="img__parent">
                        <img :src="image('freelance.jpg')" alt="">
                    </div>
                    <div class="hidden__content">
                        <p>Фріланс і ще щось</p>
                    </div>
                </div>
                <div class="flex__block">
                    <div class="img__parent">
                        <img :src="image('freelance.jpg')" alt="">
                    </div>
                    <div class="hidden__content">
                        <p>Фріланс і ще щось</p>
                    </div>
                </div>
                <div class="flex__block">
                    <div class="img__parent">
                        <img :src="image('freelance.jpg')" alt="">
                    </div>
                    <div class="hidden__content">
                        <p>Фріланс і ще щось</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
