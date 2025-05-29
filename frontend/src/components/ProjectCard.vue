<script setup>
import { useAnimationStore } from '@/stores/animation';
import { RouterLink } from 'vue-router'
import { storeToRefs } from 'pinia'
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
</script>
<template>
    <div class="relative  bg  py-8 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 3xl:grid-cols-3 gap-3  " v-motion
        :initial="initialValue" :visibleOnce="visibleOnceValue">

        <RouterLink to="/project/abc"
            class="relative top-0 left-0 overflow-hidden h-[250px] rounded-lg flex flex-col justify-end group cursor-pointer "
            v-for="n in 4" style="background: #4345A6;">
            <!-- Gradient Shadow Overlay (left to right) -->
            <div class="absolute top-0 left-0 w-full h-full z-10  group-hover:bg-black/20" style="">
            </div>
            <div class="absolute top-0 left-0 w-full h-full z-10"
                style="background: linear-gradient(80deg, rgba(0,0,0,0.75), rgba(0,0,0,0.4), transparent);">
            </div>



            <div
                class="absolute flex flex-col py-4 h-full w-full z-20 px-4 gap-1 group-hover:translate-x-1 tracking-tighter leading group-hover:brightness-120">

                <h3 class="text-acc text-sm font-semibold drop-shadow-lg uppercase leading-none">Web App</h3>
                <h3 class="text-white text-2xl font-semibold drop-shadow-lg leading-none line-clamp-2">GymPass</h3>
                <p class="text-grey-light text-sm font-semibold drop-shadow-lg leading-none">12 April 2020</p>

            </div>


            <div class="px-4 ">
                <img src="@/assets/fc.png" alt=""
                    class="w-full object-cover rounded-t-lg translate-y-3 group-hover:translate-y-0 transition-transform duration-300 ease-in-out" />
            </div>
        </RouterLink>









    </div>
</template>