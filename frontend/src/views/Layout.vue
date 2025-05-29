<script setup>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import Hero from '@/components/Hero.vue'
import { RouterView } from 'vue-router'


</script>

<template>
  <main class="bg-bg-lm dark:bg-bg-dm text-p-lm dark:text-p-dm transition-all duration-500 ease-in-out ">
    <Navbar />
    <Hero />

    <RouterView />
    <Footer />

  </main>
</template>
