<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { storeToRefs } from 'pinia'
import { Pagination } from 'swiper/modules'; // Import Pagination module
import 'swiper/css';
import { useMotion } from "@vueuse/motion";
import { RouterLink } from 'vue-router'
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
    <section class=" md:px-[8%] px-[6%]" id="about" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">

        <div class="flex flex-col tablet-large:flex-row gap-6 pb-10">
            <div class="flex flex-col w-full tablet-large:w-1/2 gap-5" v-motion-fade-visible-once>
                <h3 class="text-gray-400 flex items-center gap-2 text-lg">
                    <img class="w-8 h-3" src="../assets/Arrow.png" alt="" />
                    Hello Again
                </h3>
                <div class="flex flex-col gap-3">
                    <h2 class="text-2xl font-semibold">I'm Biaka</h2>
                    <p class="text-base leading-relaxed">
                        I'm a full-stack developer with a growing passion for building web applications that are clean,
                        fast, and easy to use. While I’m still early in my journey, I’ve spent a lot of time learning how to
                        create tools that not only work well, but also feel good to use — especially for developers.




                    </p>
                    <p>
                        Along the way, I’ve started to develop my own perspective on what makes good software: clarity,
                        structure, and a focus on the user. I’m always experimenting, asking questions, and refining my
                        skills as I go.

                    </p>
                    <p>
                        Right now, I’m focused on learning by building — turning ideas into projects, and projects into
                        experience.
                    </p>
                    <div>
                        <RouterLink to="/about"
                            class="text-grey-light text-sm font-semibold cursor-pointer hover:text-white ">KNOW MORE <i
                                class="fa-solid fa-arrow-right  more"></i></RouterLink>
                    </div>

                </div>
            </div>
            <div class="w-full tablet-large:w-[50%] flex items-center justify-center  pt-2 " v-motion-fade-visible-once>
                <div class="relative  ">
                    <img src="@/assets/fracturedjinx.jpg" alt="" class="animated-border-radius" />
                    <div class="glowing-circle top-8 left-6"></div>
                </div>

            </div>
        </div>


    </section>
</template>
<style scoped>
.more {
    animation: ping 1.5s ease-in-out infinite;

}

@keyframes ping {
    0% {
        transform: translateX(0);
    }

    50% {
        transform: translateX(2px);

    }

    100% {
        transform: translateX(0);
    }
}

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


@keyframes borderRadiusMorph {
    0% {
        border-top-left-radius: 20%;
        border-bottom-left-radius: 40%;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    50% {
        border-radius: 40px;
    }

    100% {
        border-top-left-radius: 20%;
        border-bottom-left-radius: 40%;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
}

.animated-border-radius {
    width: 280px;
    height: 250px;
    background-color: #f3f4f6;
    object-fit: cover;
    animation: borderRadiusMorph 3s ease-in-out infinite;
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
