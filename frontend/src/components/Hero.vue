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
    <section v-motion-fade-visible-once
        class="min-h-[80vh]  flex justify-center smartphone-landscape:items-center mt-40 smartphone-landscape:mt-0 ">
        
        <div
            class="flex-col flex smartphone-landscape:flex-row items-center  relative w-full smartphone-landscape:justify-center ">
            <div class="flex flex-col gap-1 z-[2]">
                <div class="text-3xl tablet:text-4xl">Biaka Vaiphei</div>
                <div class="text-xl tablet:text-2xl flex gap-1 "><i class="fa-solid fa-code "
                        :class="isDark ? 'text-a-dm' : 'text-a-lm'"></i><span>Software Developer</span></div>
                <div class="flex gap-2 items-center text-[28px]">
                    <a :href="linkedIn" target="_blank"><i class="fa-brands fa-linkedin "></i></a>
            <a :href="github" target="_blank"><i class="fa-brands fa-github "></i></a>
            <a :href="instagram" target="_blank"><i class="fa-brands fa-instagram "></i></a>
        
                </div>
                <span class="flex">
                    <ButtonExt :link="`mailto:${email}`" content="Connect" />
                </span>
            </div>
            <img src="@/assets/halloween_background.png" alt=""
                class="hidden smartphone-landscape:block top-[180px] z-1  ml-2 w-[300px] absolute smartphone-landscape:static smartphone-landscape:w-[300px] tablet:w-[400px]"
                v-if="isDark">


            <img src="@/assets/tokyobg.png" alt=""
                class="top-[50px] z-1 ml-2 w-[500px] absolute smartphone-landscape:static smartphone-landscape:w-[300px] tablet:w-[400px]"
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
}</style>