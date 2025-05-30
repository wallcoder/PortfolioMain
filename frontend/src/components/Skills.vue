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
import { useInfoStore } from '@/stores/info'
import Loader from '@/components/Loader.vue'
const { info, isLoadingInfo } = storeToRefs(useInfoStore())
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;

const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
const api = import.meta.env.VITE_STORAGE



</script>

<template>
    <div>
        <div  class="w-full h-[20vh] flex  items-center justify-center" v-if="isLoadingInfo">
            <Loader />
        </div>

        <section v-else class="flex  flex-col gap-5 md:px-[8%] px-[6%] pb-20 " v-motion :initial="initialValue"
            :visibleOnce="visibleOnceValue">
            <h2 class="text-xl text-grey-light  font-semibold " v-motion :initial="initialValue"
                :visibleOnce="visibleOnceValue">
                Skills
            </h2>
           


            <div class="flex gap-3 flex-wrap">
                <span v-for="n in info?.tech_stack"
                    class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                    <img class="w-10" :src="`${api}/${n?.tech?.logo}`" alt="">
                    <span
                        class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        {{ n?.tech?.name }}
                    </span>

                </span>



            </div>
        </section>
    </div>
</template>

