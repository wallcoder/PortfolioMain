<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia'
import { ref, onMounted } from 'vue'
import BlogCard from '@/components/BlogCard.vue'
import { useBlogStore } from '@/stores/blog';
import Loader from '@/components/Loader.vue'
import Button from '@/components/Button.vue'
const { label } = storeToRefs(useAuthStore())
const { blogs, nextCursor, loading, hasMore, } = storeToRefs(useBlogStore());
const { fetchBlogs } = useBlogStore()



onMounted(() => {
    label.value = {
        head: 'Blogs',


    }
    if (blogs.value.length === 0) {
        nextCursor.value = null
        hasMore.value = true
        fetchBlogs(6)
    }
})

</script>
<template >
    <section class=" flex  flex-col  blogs" id="works">
        <div v-if="blogs.length === 0 && !loading" class="md:px-[8%] px-[6%] text-xl text-grey-light py-2">
            No Blog Available
        </div>
        <section v-else class="md:px-[8%] px-[6%]">

            <BlogCard :item="blogs" />

        </section>
        <div class="flex justify-center items-center " v-if="hasMore && !loading" >
            <Button content="Load More" :fun="()=>{fetchBlogs(6)}"/>
            
        </div>

        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="loading">
            <Loader />
        </div>

    </section>
</template>