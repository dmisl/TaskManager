<script setup>

import { ref, markRaw, provide } from 'vue'
import Welcoming from './Welcoming.vue';

const props = defineProps(['asset'])

provide('imported', props)

const WelcomingComponent = markRaw(Welcoming)

const currentComponent = ref(WelcomingComponent)

</script>
<template>
    <div>

    </div>
</template>
<style>

</style>
