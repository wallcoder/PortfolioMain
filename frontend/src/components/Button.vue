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


    fun: {
        type: Function,
        default: () => { }
    },


})
</script>
<template>
    <button @click="fun()"
        class="bg-acc cursor-pointer px-3 py-2 active:brightness-[0.85] rounded-lg text-sm  hover:-translate-y-[1.5px]">{{
            content }}</button>
</template>

<style scoped></style>