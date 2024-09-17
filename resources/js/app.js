import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import HomeParent from './home/Parent.vue';

const app = createApp({});

app.config.warnHandler = () => {};

app.component('HomeParent', HomeParent);

app.mount("#app");

document.querySelectorAll('*').forEach(el => {
    el.setAttribute('draggable', 'false');
    el.style.userSelect = 'none';
});
