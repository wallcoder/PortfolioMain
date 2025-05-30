<script setup>
import { useAnimationStore } from '@/stores/animation';
import { RouterLink } from 'vue-router'
import { storeToRefs } from 'pinia'
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
const api = import.meta.env.VITE_STORAGE
const props = defineProps({
    item: {
        type: Array,
        default: []
    }
})
function formatDate(isoString) {
    const date = new Date(isoString);
    const day = date.getUTCDate();
    const month = date.toLocaleString('en-US', { month: 'long', timeZone: 'UTC' });
    const year = date.getUTCFullYear();

    return `${day} ${month} ${year}`;
}
function formatDate2(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}


</script>
<template>
    <div class="relative  bg  py-8 grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 3xl:grid-cols-4 gap-3  ">

     

        <RouterLink v-for="n in item" :to="`/project/${n.slug}`" :style="{ backgroundColor: n.background_color }" v-motion
            :initial="initialValue" :visibleOnce="visibleOnceValue"
            class="relative   overflow-hidden aspect-[16/9] rounded-lg flex flex-col justify-end group cursor-pointer">
            <!-- IMAGE -->
            <div class="absolute w-full h-full px-4  ">
                <img :src="`${api}/${n?.image1}`" :alt="n?.title"
                    class=" inset-0 w-full rounded-t-lg bg-red-20 bg-grey  h-full object-cover transition-transform duration-300 ease-in-out translate-y-6 group-hover:translate-y-2" />
            </div>
            <!-- Gradient Overlays -->
            <div class="absolute inset-0 z-10 group-hover:bg-black/20"></div>
            <div class="absolute inset-0 z-10"
                style="background: linear-gradient(80deg, rgba(0,0,0,0.8), rgba(0,0,0,0.7), transparent);"></div>

            <!-- Overlay Text -->
            <div
                class="absolute  top-0 group-hover:translate-x-1  flex flex-col justify-end py-4 px-4 gap-1 z-20 tracking-tighter">
                <h3 class="text-acc text-sm font-semibold drop-shadow-lg uppercase leading-none">
                    {{ n?.category?.name }}
                </h3>
                <h3 class="text-white text-2xl font-semibold drop-shadow-lg leading-none line-clamp-2">
                    {{ n?.title }}
                </h3>
                <p class="text-grey-light text-sm font-semibold drop-shadow-lg leading-none">
                    {{ formatDate(n.created_at) }}
                </p>
            </div>
        </RouterLink>










    </div>
</template>