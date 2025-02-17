<script setup>

import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import Hero from '@/components/Hero.vue'
import Works from '@/components/Works.vue'
import About from '@/components/About.vue'
import Skills from '@/components/Skills.vue'
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;
</script>

<template>
    <section class="min-h-[100vh] laptop:px-[15%]  tablet:px-[8%] px-[2%]">
        <Hero />
        <Works />
        <About />
        <Skills />


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