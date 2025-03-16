<script setup>

import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'
import Loader from '@/components/Loader.vue'

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;
const email = import.meta.env.VITE_EMAIL

const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH


</script>

<template>
    <section v-motion-fade-visible-once class=" justify-center  h-[400px] mb-36 smartphone-xl:h-[600px] py-6 smarthpone-xl:mb-0 flex   smartphone-landscape:mt-0  ">

        <div
            class="flex-col flex  smartphone-xl:flex-row items-center justify-center  relative w-full  ">
            <div class="flex flex-col gap-1 z-[2]">
                <div class="text-3xl tablet:text-4xl">Biakropuia</div>
                <div class="text-xl tablet:text-2xl flex gap-1 "><i class="fa-solid fa-code "
                        :class="isDark ? 'text-a-dm' : 'text-a-lm'"></i><span>Software Developer</span></div>
                <div class="flex gap-2 items-center text-[28px]">
                    <a :href="linkedIn" target="_blank"><i class="fa-brands fa-linkedin "></i></a>
                    <a :href="github" target="_blank"><i class="fa-brands fa-github "></i></a>
                    <a :href="instagram" target="_blank"><i class="fa-brands fa-instagram "></i></a>

                </div>
                <span class="flex">
                    <a target="_blank" :href="`mailto:${email}`"
                        class="smartphone-xl:hidden cursor-pointer flex items-center gap-1  py-2 px-3 rounded-lg shadow-[]  connect-btn text-center  transition-all duration-200  dark:text-white dark:hover:text-bg-lm dark:hover:border-bg-lm dark:hover:bg-none"
                        :class="[isDark ? 'border-2 border-white ' : 'connect-btn-lm bg-bg-lm hover:bg-[#e7e7e7]']">
                        Connect </a>
                    <ButtonExt :link="`mailto:${email}`" content="Connect" class="hidden smartphone-xl:block" />
                </span>
            </div>
            <img src="@/assets/halloween.png" alt=""
                class=" smartphone-xl:hidden top-[210px] z-1 ml-2 w-[400px] absolute smartphone-xl:static smartphone-xl:w-[300px] tablet:w-[300px] laptop:w-[400px]"
                v-if="isDark" style="
        -webkit-mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
     ">
            <img src="@/assets/halloween.png" alt=""
                class=" hidden smartphone-xl:block top-[210px] z-1 ml-2 w-[400px] absolute smartphone-xl:static smartphone-xl:w-[300px] tablet:w-[300px] laptop:w-[400px]"
                v-if="isDark">



            <img src="@/assets/tokyobg.png" alt=""
                class="top-[210px] z-1 ml-2 w-[400px] absolute smartphone-xl:static smartphone-xl:w-[300px] tablet:w-[300px] laptop:w-[400px]"
                v-else>
        </div>



    </section>
</template>

<style scoped>
.connect-btn-lm {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.connect-btn-dm {
    border: 2px #81619E solid
}
</style>