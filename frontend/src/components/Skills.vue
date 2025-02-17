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
    <section class="flex flex-col gap-5 pb-20" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
        <h2 class="text-2xl" v-motion-fade-visible-once>Skills</h2>
        <section v-motion-fade-visible-once class="rounded-lg w-full min-h-32 flex gap-6 items-center p-4 justify-center flex-wrap"
            :class="isDark ? 'bg-s-dm' : 'bg-s-lm'">
            <img src="../assets/C++.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/JavaScript.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/Vue.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/Node.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/Express.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/Tailwind.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/MySQL.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">
            <img src="../assets/PostgreSQL.png" alt="" class="w-[70px] h-[70px]" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg">

        </section>
    </section>
</template>

