<script setup>
import { useLoaderStore } from "@/stores/loader"
import { ref } from 'vue'
import { storeToRefs } from 'pinia'

const { isLoading } = storeToRefs(useLoaderStore())

</script> 
<template>
    <div class="loader">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</template>
<style scoped>
/* From Uiverse.io by aryamitra06 */
.loader {
    display: flex;
    align-items: center;
}

.bar {
    display: inline-block;
    width: 3px;
    height: 20px;
    background-color: rgba(255, 255, 255, .5);
    border-radius: 10px;
    animation: scale-up4 1s linear infinite;
}

.bar:nth-child(2) {
    height: 35px;
    margin: 0 5px;
    animation-delay: .25s;
}

.bar:nth-child(3) {
    animation-delay: .5s;
}

@keyframes scale-up4 {
    20% {
        background-color: #ffffff;
        transform: scaleY(1.5);
    }

    40% {
        transform: scaleY(1);
    }
}
</style>