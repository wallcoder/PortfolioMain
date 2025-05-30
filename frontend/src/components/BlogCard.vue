<script setup>
import { useAnimationStore } from '@/stores/animation';
import { storeToRefs } from 'pinia'
import { RouterLink } from 'vue-router'
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
    <div class="relative  bg  py-8 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 3xl:grid-cols-3 gap-3  " >
        
        <RouterLink :to="`/blog/${n.slug}`" v-motion
        :initial="initialValue" :visibleOnce="visibleOnceValue"
            class="relative top-0 left-0 overflow-hidden h-[250px] rounded-lg flex flex-col justify-end group cursor-pointer "
            v-for="n in item">
            <!-- Gradient Shadow Overlay (left to right) -->
            <div class="absolute top-0 left-0 w-full h-full z-10  group-hover:bg-black/20" style="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full z-10"
                style="background: linear-gradient(80deg, rgba(0,0,0,0.75), rgba(0,0,0,0.4), transparent);">
            </div>



            <div
                class="absolute flex flex-col py-4 h-full w-full z-20 px-4 gap-1 group-hover:translate-x-1 tracking-tighter leading group-hover:brightness-120">

                <h3 class="text-acc text-sm font-semibold drop-shadow-lg uppercase leading-none">
                    {{ n?.categories[0].name }}
                </h3>

                <h3 class="text-white text-2xl font-semibold drop-shadow-lg leading-none line-clamp-2 w-full">
                    {{ n?.title }}
                </h3>

                <p class="text-grey-light text-sm font-semibold drop-shadow-lg leading-none">
                    {{ formatDate(n?.published_at) }}
                </p>

            </div>



            <div class=" w-full h-full">
                <img :src="`${api}/${n?.cover_photo_path}`" :alt="n?.photo_alt_text" alt=""
                    class="w-full object-cover  h-full rounded-t-lg group-hover:scale-[1.05] transition-transform duration-300 ease-in-out" />
            </div>
        </RouterLink>









    </div>
</template>