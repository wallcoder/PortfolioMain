<script setup>
import {useLoaderStore} from "@/stores/loader"
import {ref} from 'vue'
import {storeToRefs} from 'pinia'

const {isLoading} = storeToRefs(useLoaderStore())

</script> 
<template>
    <div class="w-10 h-10  flex items-center justify-center" v-if="isLoading">
        <div class="circle  rounded-full bg-a-lm dark:bg-a-dm"></div>
    </div>
</template>
<style scoped>
@keyframes scaling {

    0%,
    100% {
        width: 30px;
        height: 30px;
    }

    50% {
        width: 10px;
        height: 10px;
    }
}

.circle {
    animation: scaling 2s infinite ease-in-out;
}</style>