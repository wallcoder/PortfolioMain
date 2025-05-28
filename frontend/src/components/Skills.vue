<script setup>
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import { useAnimationStore } from '@/stores/animation';
import Hero from '@/components/Hero.vue'
import Works from '@/components/Works.vue'
import About from '@/components/About.vue'
import Skills from '@/components/Skills.vue'

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;

const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)




</script>

<template>
    <section class="flex flex-col gap-5 md:px-[8%] px-[6%] pb-20 " v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
        <h2 class="text-xl text-grey-light  font-semibold " v-motion :initial="initialValue"
                :visibleOnce="visibleOnceValue">
                Skills
            </h2>

        <div class="flex gap-3 flex-wrap">
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/vue.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Vue.js
                </span>

            </span>
            <span v-if="!isDark"
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/express1.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Express.js
                </span>

            </span>
            <span v-else
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/express2.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Express.js
                </span>

            </span>
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/tailwind.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Tailwind
                </span>

            </span>

            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/js.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    JavaScript
                </span>

            </span>
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-16" src="@/assets/cplusplus.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    C++
                </span>

            </span>

            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/laravel.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Laravel
                </span>

            </span>
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/mysql.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    MySQL
                </span>

            </span>
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/postgre.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    PostgreSQL
                </span>

            </span>
            <span
                class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                <img class="w-10" src="@/assets/nodejs.svg" alt="">
                <span
                    class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    Node.js
                </span>

            </span>


        </div>
    </section>
</template>

