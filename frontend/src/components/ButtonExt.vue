<script setup>
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';


const props = defineProps({
    content: {
        type: String,
        required: true
    },


    link: {
        type: String,
        required: false
    },


})
</script>
<template>
    <a :href="link" target="_blank" class="bg-acc cursor-pointer px-3 py-2 active:brightness-[0.85] rounded-lg text-sm  hover:-translate-y-[1.5px]">{{
        content }}</a>
</template>

<style scoped></style>