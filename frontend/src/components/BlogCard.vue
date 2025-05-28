<script setup>
import { useAnimationStore } from '@/stores/animation';
import { storeToRefs } from 'pinia'
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
</script>
<template>
    <div class="relative  bg  py-8 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 3xl:grid-cols-3 gap-3  " v-motion
        :initial="initialValue" :visibleOnce="visibleOnceValue">

        <div class="relative top-0 left-0 overflow-hidden h-[250px] rounded-lg flex flex-col justify-end group cursor-pointer "
            v-for="n in 4">
            <!-- Gradient Shadow Overlay (left to right) -->
            <div class="absolute top-0 left-0 w-full h-full z-10  group-hover:bg-black/20" style="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full z-10"
                style="background: linear-gradient(80deg, rgba(0,0,0,0.75), rgba(0,0,0,0.4), transparent);">
            </div>



            <div
                class="absolute flex flex-col py-4 h-full w-full z-20 px-4 gap-1 group-hover:translate-x-1 tracking-tighter leading group-hover:brightness-120">

                <h3 class="text-acc text-sm font-semibold drop-shadow-lg uppercase leading-none">
                    coding
                </h3>

                <h3 class="text-white text-2xl font-semibold drop-shadow-lg leading-none line-clamp-2 w-full">
                    The Truth Behind JavaScript And Daffodils Over the Hill
                </h3>

                <p class="text-grey-light text-sm font-semibold drop-shadow-lg leading-none">
                    12 April 2020
                </p>

            </div>



            <div class=" w-full h-full">
                <img src="@/assets/wall.webp" alt=""
                    class="w-full object-cover  h-full rounded-t-lg group-hover:scale-[1.05] transition-transform duration-300 ease-in-out" />
            </div>
        </div>









    </div>
</template>