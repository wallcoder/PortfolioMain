<script setup>
import Navbar from '@/components/Navbar.vue'
import Footer from '@/components/Footer.vue'
import Sidebar from '@/components/Sidebar.vue'
import { RouterView } from 'vue-router'


</script>

<template>
  <main class=" font-sans flex bg-admin-bg text-p-lm transition-all duration-500 ease-in-out w-full min-h-[100vh] ">
    
    <Sidebar />
    
    <RouterView />
    

  </main>
</template>
