<script setup>
import {useLoaderStore} from "@/stores/loader"
import {ref} from 'vue'
import {storeToRefs} from 'pinia'

const {isLoadingSpinner} = storeToRefs(useLoaderStore())
</script>
<template>
    <span class="loader" v-if="isLoadingSpinner"></span>
</template>
<style scoped>
.loader {
    width: 48px;
    height: 48px;
    border: 5px solid #B67DD1;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>
