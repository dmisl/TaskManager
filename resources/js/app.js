import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import HomeParent from './home/Parent.vue';

const app = createApp({});

app.component('HomeParent', HomeParent);

app.mount("#app");
