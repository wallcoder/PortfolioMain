<script setup>

import { storeToRefs } from 'pinia'
import { useBlogStore } from '@/stores/blog'
import { ref, onMounted } from 'vue'
import { useAnimationStore } from '@/stores/animation';
import Loader from '@/components/Loader.vue'
import { useLoaderStore } from "@/stores/loader"
import 'quill/dist/quill.snow.css'; 
const anim = useAnimationStore()
const blogStore = useBlogStore()
const { getBlogs, formatDate, getBlogBySlug } = blogStore;
const { blogs, blog } = storeToRefs(blogStore);
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
const { isLoading } = storeToRefs(useLoaderStore())
const api = import.meta.env.VITE_STORAGE;

const props = defineProps({
    slug: {
        type: String,
        required: true
    }
})
onMounted(() => {
    getBlogBySlug(props.slug);
})

</script>
<template>
    <section class="min-h-[100vh] laptop:px-[15%]  tablet:px-[8%] px-[2%] pt-8 flex flex-col gap-10">
        <div class="h-[70vh] flex items-center justify-center w-full" v-if="isLoading">

            <Loader />
        </div>
        <div class="flex flex-col " v-else v-motion-fade-visible-once>
            <h2 class="text-3xl py-2">
                {{ blog.title }}
            </h2>
            <img :src="`${api}/${blog.image}`" :alt="blog.title"
                class="bg-gray-200 w-full h-[40vh] tablet:h-[60vh] object-cover">
        </div>
        <div v-html="blog.content" class="ql-editor ">

        </div>

    </section>
</template>
<style>
/* Ensure the content inside v-html gets styled */
.ql-editor {

    font-size: 16px;
    line-height: 1.5;
    word-wrap: break-word;

    overflow-wrap: break-word;
}

/* Headings */
.ql-editor h1,
.ql-editor h2,
.ql-editor h3,
.ql-editor h4,
.ql-editor h5,
.ql-editor h6 {
    margin: 10px 0;
    font-weight: semi-bold;
}

/* For each heading, apply specific font sizes and margins */
.ql-editor h1 {
    font-size: 1.8rem;
    

}

.ql-editor h2 {
    font-size: 1.4rem;
    
}

.ql-editor h3 {
    font-size: 1.5rem;
    
}

.ql-editor h4 {
    font-size: 1.25rem;
    
}

.ql-editor h5 {
    font-size: 1.125rem;
    
}

.ql-editor h6 {
    font-size: 1rem;
   
}

/* Paragraphs */
.ql-editor p {
    font-size: 1rem;
    line-height: 1.6;
    
}

/* Blockquotes */
.ql-editor blockquote {
    border-left: 4px solid #007bff;
    font-style: italic;
    padding-left: 16px;
    margin-top: 16px;
    margin-bottom: 16px;
    background-color: #f9f9f9;
    font-size: 1.125rem;
}

/* Unordered Lists */
.ql-editor ul {
    list-style-type: disc;
    padding-left: 24px;
    
}

.ql-editor ul li {
    font-size: 1rem;
    
}

/* Nested Unordered Lists */
.ql-editor ul ul {
    padding-left: 24px;
}

.ql-editor ul ul li {
    font-size: 1rem;
}

/* Ordered Lists */
.ql-editor ol {
    list-style-type: decimal;
    padding-left: 24px;
    margin-top: 16px;
    margin-bottom: 16px;
}

.ql-editor ol li {
    font-size: 1rem;
    margin-bottom: 8px;
}

/* Nested Ordered Lists */
.ql-editor ol ol {
    padding-left: 24px;
}

.ql-editor ol ol li {
    font-size: 1rem;
}

/* Links */
.ql-editor a {
    color: #007bff;
    text-decoration: none;
}

.ql-editor a:hover {
    text-decoration: underline;
}

/* Images */
.ql-editor img {
    max-width: 100%;
    height: auto;
    margin-top: 16px;
    margin-bottom: 16px;
}

/* Code Block */
.ql-editor pre {
    background-color: #f0f0f0;
    padding: 16px;
    border-radius: 4px;
    font-size: 0.875rem;
    font-family: 'Courier New', Courier, monospace;
    margin-top: 16px;
    margin-bottom: 16px;
}

.ql-editor code {
    background-color: #f0f0f0;
    padding: 2px 4px;
    border-radius: 4px;
    font-size: 0.875rem;
    font-family: 'Courier New', Courier, monospace;
}

/* Bold Text */
.ql-editor strong {
    font-weight: bold;
}

/* Italic Text */
.ql-editor em {
    font-style: italic;
}

/* Underlined Text */
.ql-editor u {
    text-decoration: underline;
}

/* Strikethrough Text */
.ql-editor s {
    text-decoration: line-through;
}

/* Highlighted Text */
.ql-editor mark {
    background-color: #fff100;
}

/* Superscript */
.ql-editor sup {
    font-size: 0.75rem;
    vertical-align: super;
}

/* Subscript */
.ql-editor sub {
    font-size: 0.75rem;
    vertical-align: sub;
}

/* Horizontal Rule */
.ql-editor hr {
    border-top: 1px solid #ddd;
    margin-top: 32px;
    margin-bottom: 32px;
}

/* Tables */
.ql-editor table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 16px;
    margin-bottom: 16px;
}

.ql-editor th,
.ql-editor td {
    padding: 8px;
    border: 1px solid #ddd;
    text-align: left;
}

/* Nested Lists */
.ql-editor ul ul,
.ql-editor ol ol {
    padding-left: px;
}

/* List Markers (Bullet/Number) */
.ql-editor ul li::marker,
.ql-editor ol li::marker {
    color: #007bff;
}

/* Form elements (if Quill outputs input elements) */
.ql-editor input[type="text"],
.ql-editor textarea,
.ql-editor select {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    margin-top: 16px;
    margin-bottom: 16px;
}

.ql-editor input[type="checkbox"],
.ql-editor input[type="radio"] {
    margin-right: 8px;
}
</style>
