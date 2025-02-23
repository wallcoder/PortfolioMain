<script setup>
import { storeToRefs } from 'pinia'
import { RouterView, RouterLink } from 'vue-router'
import { useBlogStore } from '@/stores/blog'
import { ref, onMounted, computed } from 'vue'
import { useAnimationStore } from '@/stores/animation';
import { useLoaderStore } from "@/stores/loader"
import Loader from '@/components/Loader.vue'

const { isLoading } = storeToRefs(useLoaderStore())
const anim = useAnimationStore()
const blogStore = useBlogStore()
const { getBlogs, formatDate } = blogStore;
const { blogs } = storeToRefs(blogStore);
const api = import.meta.env.VITE_STORAGE;
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)

onMounted(() => {
    getBlogs()
})

const truncate = (text, limit=100)=>{
    function truncateText(text, maxLength = 100) {
    if (text.length > maxLength) {
        return text.slice(0, maxLength) + "...";
    }
    return text;
}
}

// Computed property to handle pagination logic
const visiblePages = computed(() => {
    const totalPages = blogs.value.last_page;
    const currentPage = blogs.value.current_page;
    let pages = [];

    if (totalPages <= 5) {
        pages = Array.from({ length: totalPages }, (_, i) => i + 1);
    } else {
        if (currentPage <= 3) {
            pages = [1, 2, 3, "...", totalPages - 1, totalPages];
        } else if (currentPage >= totalPages - 2) {
            pages = [1, 2, "...", totalPages - 2, totalPages - 1, totalPages];
        } else {
            pages = [1, "...", currentPage - 1, currentPage, currentPage + 1, "...", totalPages];
        }
    }
    return pages;
});
</script>

<template>
    <section class="pb-20 min-h-[100vh] laptop:px-[15%] gap-10 pt-10 tablet:px-[8%] px-[2%] flex flex-col">
        <h2 class="text-2xl font-semibold" v-motion-fade-visible-once> Blogs </h2>

        <!-- Loading State -->
        <div class="w-full flex items-center justify-center h-[70vh]" v-if="isLoading">
            <Loader />
        </div>

        <div class="flex flex-col gap-8" v-else>
            <RouterLink :to="`/blog/${blog.slug}`" :id="blog.id" v-motion-fade-visible-once v-for="blog in blogs.data"
                class="flex flex-col-reverse gap-2 smartphone-xl:flex-row items-start justify-between smartphone-xl:h-[160px] min-h-[20vh] cursor-pointer border-b-[#cecece] dark:border-b-[#373737] border-b ">
                <div class="flex flex-col flex-1 justify-between  gap-1 h-full">
                    <div class="flex flex-col  flex-wrap">
                        <h2 class="font-semibold text-lg ">{{ blog.title }}</h2>
                        <p class="pr-16 hidden smartphone-xl:block"> {{ blog.description }} </p>
                    </div>
                    <span class="text-[#aaaaaa]">{{ formatDate(blog.created_at) }}</span>
                </div>
                <img :src="`${api}/${blog.image}`" alt="" class="w-full h-[200px]  smartphone-xl:h-[150px] smartphone-xl:w-[250px] bg-gray-200 object-cover rounded-lg">
            </RouterLink>

            <!-- Pagination UI -->
            <div class="w-full flex items-center justify-center" v-motion-fade-visible-once v-if="blogs.links?.length > 0">
                <div class="flex gap-2"  v-if="blogs.last_page != 1">
                    
                    <!-- Previous Page Button -->
                    <button v-if="blogs.current_page > 1" 
                        @click="getBlogs(blogs.current_page - 1)" 
                        aria-label="Previous Page">
                        &laquo;
                    </button>

                    <!-- Page Numbers -->
                    <button  v-for="(page, index) in visiblePages" 
                        :key="index" 
                        @click="getBlogs(page)" 
                        :class="page === blogs.current_page ? 'font-semibold text-a-lm dark:text-a-dm' : ''"
                        :disabled="page === '...'">
                        {{ page }}
                    </button>

                    <!-- Next Page Button -->
                    <button v-if="blogs.current_page < blogs.last_page" 
                        @click="getBlogs(blogs.current_page + 1)" 
                        aria-label="Next Page">
                        &raquo;
                    </button>

                </div>
            </div>
        </div>
    </section>
</template>
