<script setup>
import {ref, onMounted} from 'vue'
import {storeToRefs} from 'pinia'
import {useBlogStore} from '@/stores/blog'
const blogStore = useBlogStore()
const {blogsAll } = storeToRefs(blogStore)
const {getBlogsAll} = blogStore


onMounted(()=>{
    getBlogsAll()
})
</script>
<template>

<section class="relative flex flex-col gap-4">
    <!-- Image -->
    <img src="../assets/wall.webp" alt="" class="w-full object-cover h-full">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-white bg-opacity-15"></div>
</section>


</template>
<style scoped></style>
