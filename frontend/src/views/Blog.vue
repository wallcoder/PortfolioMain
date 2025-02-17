<script setup>
import { storeToRefs } from 'pinia'
import { useBlogStore } from '@/stores/blog'
import { ref } from 'vue'
import { useAnimationStore } from '@/stores/animation';
const anim = useAnimationStore()
const blogStore = useBlogStore()
const { getBlogs, formatDate } = blogStore;
const { blogs } = storeToRefs(blogStore);

const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)

getBlogs()
</script>
<template>
    <section class="pb-20 min-h-[100vh] laptop:px-[15%] gap-10 pt-10 tablet:px-[8%] px-[2%] flex flex-col">
        <h2 class="text-2xl font-semibold" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
            Blogs
        </h2>
        <div class="flex flex-col gap-8">
            <div v-motion :initial="initialValue" :visibleOnce="visibleOnceValue" v-for="blog in blogs.data" class="flex flex-col-reverse tablet:flex-row items-start justify-between h-[20vh] min-h-[20vh] cursor-pointer">
                <div class="flex flex-col  flex-1 justify-between gap-1 h-full">
                    <div class="flex flex-col gap-2">
                        <h2 class="font-semibold text-lg">{{ blog.title }}</h2>
                        <p class="pr-16">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet maiores earum ipsam obcaecati
                            modi! Sit maxime impedit laborum aut possimus magni ea nostrum, pariatur sequi modi, molestias
                            unde dolor ut.
                        </p>
                    </div>
                    <span class="text-[#aaaaaa]">{{ formatDate(blog.created_at) }}</span>

                </div>
                <img src="../assets/MySQL.png" alt="" class="h-full w-[250px] bg-gray-200 object-contain rounded-lg">

            </div>
        </div>
    </section>
</template>