<script setup>

import { storeToRefs } from 'pinia'
import { useBlogStore } from '@/stores/blog'
import { ref } from 'vue'
import { useAnimationStore } from '@/stores/animation';
const anim = useAnimationStore()
const blogStore = useBlogStore()
const { getBlogs, formatDate } = blogStore;
const { blogs } = storeToRefs(blogStore);
</script>
<template>
    <section class="min-h-[100vh] laptop:px-[15%]  tablet:px-[8%] px-[2%]">
        
    </section>
</template>

