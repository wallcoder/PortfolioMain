<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { storeToRefs } from 'pinia'
import { Pagination } from 'swiper/modules'; // Import Pagination module
import 'swiper/css';
import { useMotion } from "@vueuse/motion";

import { useAnimationStore } from '@/stores/animation';
import { ref } from 'vue'
import { useThemeStore } from '@/stores/theme'
import 'swiper/css/pagination'; // Import Pagination styles

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)

const onSwiper = (swiper) => {
    // console.log('Swiper initialized:', swiper);
};

const onSlideChange = () => {
    // console.log('Slide changed');
};



</script>

<template>
    <section class="py-32 " id="about" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
        <Swiper :modules="[Pagination]" :slides-per-view="1" :space-between="50" :pagination="{ clickable: true }"
            @swiper="onSwiper" @slideChange="onSlideChange">
            <SwiperSlide>
                <div class="flex flex-col tablet-large:flex-row gap-6 pb-10">
                    <div class="flex flex-col w-full tablet-large:w-1/2 gap-5" v-motion-fade-visible-once>
                        <h3 class="text-gray-400 flex items-center gap-2 text-lg">
                            <img class="w-8 h-3" src="../assets/Arrow.png" alt="" />
                            Hello Again
                        </h3>
                        <div class="flex flex-col gap-3">
                            <h2 class="text-2xl font-semibold">I'm Biaka</h2>
                            <p class="text-base leading-relaxed">
                                I'm a Full-Stack Developer based in Aizawl, currently studying at Mizoram
                                University. I have a strong interest in web application development and love finding new
                                ways to create intuitive and engaging digital experiences. Always eager to grow, I
                                continuously explore new technologies to enhance my skills and stay updated with the latest
                                trends.
                            </p>
                        </div>
                    </div>
                    <div class="w-full tablet-large:w-[50%] flex items-center justify-center  pt-2 " v-motion-fade-visible-once>
                        <div class="relative  ">
                            <img src="/pro.jpeg" alt=""
                                class="w-[200px] h-[250px] bg-gray-100 rounded-lg object-cover">
                            <div class="glowing-circle top-5 left-4" v-if="isDark"></div>
                        </div>

                    </div>
                </div>
            </SwiperSlide>

            <SwiperSlide>
                <div class="flex flex-col tablet-large:flex-row  gap-6">
                    <div class="flex flex-col w-full tablet:w-1/2 gap-5" v-motion-fade-visible-once>
                        <!-- <h3 class="text-gray-400 flex items-center gap-2 text-lg">
                            <img class="w-8 h-3" src="../assets/Arrow.png" alt="" />
                            Hello Again
                        </h3> -->
                        <div class="flex flex-col gap-3 mt-16">
                            <h2 class="text-2xl font-semibold">Beyond Coding,</h2>
                            <p class="text-base leading-relaxed">
                                I enjoy music production, gaming, and fitness. I like learning new things and gradually
                                improving my skills, whether it's in tech or my hobbies. I'm always looking for
                                opportunities to grow and apply what I learn in meaningful ways.
                            </p>
                        </div>
                    </div>
                    <div class="w-full tablet-large:w-[50%] flex items-center justify-center h-[200px] " v-motion-fade-visible-once>
                        <div src="" alt=""
                            class="w-[190px] h-[200px]  rounded-lg object-cover "> </div>
                    </div>
                </div>
            </SwiperSlide>

            <!-- <SwiperSlide>
                <div class="flex flex-col smartphone-landscape:flex-row gap-6">
                    <div class="flex flex-col w-full tablet:w-1/2 gap-5" v-motion-fade-visible-once>
                        <h3 class="text-gray-400 flex items-center gap-2 text-lg">
                            <img class="w-8 h-3" src="../assets/Arrow.png" alt="" />
                            Hello Again
                        </h3>
                        <div class="flex flex-col gap-3">
                            <h2 class=" pb-2 text-xl  smartphone-lg:text-2xl font-semibold">I'm Biaka</h2>
                            <p class="pb-2 text-sm  smartphone-lg:text-base leading-relaxed ">
                                I’m a software developer passionate about creating intuitive, efficient, and impactful
                                applications.
                                I thrive on solving problems and turning ideas into seamless digital experiences.
                            </p>
                        </div>
                    </div>
                    <div class="w-full tablet:w-[50%] flex items-center justify-center relative" v-motion-fade-visible-once>
                        <img src="../assets/halloween_background.png.jpg" alt=""
                            class="w-[190px] h-[200px] bg-gray-100 rounded-lg object-cover">

                    </div>

                </div>
            </SwiperSlide> -->

        </Swiper>


    </section>
</template>
<style scoped>
:deep(.swiper-pagination-bullet) {
    background-color: #707070;
    /* Gray color */

    opacity: 0.5;
    transition: all 0.3s ease-in-out;
}

/* Active dot */
:deep(.swiper-pagination-bullet-active) {
    background-color: #2563eb;
    /* Blue color */

    opacity: 1;
}

@keyframes flicker {

    0%,
    100% {
        background-color: rgb(255, 204, 0);
        /* Dim yellow */
        filter: brightness(1);
        box-shadow: 0 0 15px rgba(255, 204, 0, 0.8), 0 0 30px rgba(255, 204, 0, 0.6);
    }

    50% {
        background-color: rgb(252, 234, 72);
        /* Bright yellow */
        filter: brightness(1);
        box-shadow: 0 0 25px rgba(255, 255, 100, 1), 0 0 30px rgba(255, 255, 100, 0.8);
    }
}

.glowing-circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    position: absolute;

    transform: translate(-50%, -50%);
    animation: flicker 2s infinite ease-in-out;
}
</style>
