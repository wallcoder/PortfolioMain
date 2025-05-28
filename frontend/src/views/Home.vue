<script setup>

import { RouterLink } from 'vue-router'
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import { useAuthStore } from '@/stores/auth';
import Hero from '@/components/Hero.vue'
import Works from '@/components/Works.vue'
import About from '@/components/About.vue'
import Skills from '@/components/Skills.vue'
import RecentBlogs from '@/components/RecentBlogs.vue'
const {label} = storeToRefs(useAuthStore())

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;

onMounted(()=>{
    label.value = {
        head: 'biaka',
        headsec: 'dev',
        sub: 'software developer'
    }
})

</script>

<template>
    <section class="min-h-[100vh]  flex flex-col gap-16">
        <!-- <Hero /> -->
        <Works />
        <RecentBlogs />
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