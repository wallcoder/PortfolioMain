<script setup>

import { ref, onMounted, watch, computed } from 'vue'
import {RouterLink} from 'vue-router'
import { storeToRefs } from 'pinia'
import { useBlogStore } from '@/stores/blog'
const blogStore = useBlogStore()
const { blogsAll, searchTerm } = storeToRefs(blogStore)
const { getBlogsAll, formatDate2, delBlog } = blogStore


onMounted(() => {
    getBlogsAll()
})

watch(searchTerm, ()=>{
    if(!searchTerm.value){
        getBlogsAll(undefined, true);
    }
})

const visiblePages = computed(() => {
    const totalPages = blogsAll.value.last_page;
    const currentPage = blogsAll.value.current_page;
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
    <section class="p-8 flex flex-col w-full min-h-[100vh] gap-2 " v-motion-fade-visible-once>
        <h2 class="uppercase font-semibold text-xl">BLOG POSTS</h2>
        <div class="flex gap-2 py-2">
            <input @keydown.enter="getBlogsAll()" type="text" name="" id="" placeholder="Search Post" class="p-2 outline-none" v-model="searchTerm">
            
            <button type="button" @click="getBlogsAll()"
                class=" p-2 px-4 bg-[#b67dd1] hover:bg-[#c386df] font-semibold text-white rounded-lg uppercase">Search</button>

        </div>
        <table class="w-full  border-collapse overflow-y-auto bg-white " v-if="blogsAll.data.length > 0">
            <thead class="uppercase text-left text-sm text-gray-800">
                <tr>

                    <th class=" px-4 py-2">TITLE</th>
                    <th class=" px-4 py-2">description</th>
                    <th class=" px-4 py-2">status</th>
                    <th class=" px-4 py-2">created at</th>
                    <th class=" px-4 py-2">modified at</th>
                    <th></th>
                    <th class=""></th>
                    <th class=""></th>
                </tr>
            </thead>
            <tbody>
                <tr class="" v-for="blog in blogsAll.data" :id="blog.id" v-motion-fade-visible-once>
                    <td class=" px-4 py-2 w-[200px] h-20"><span>{{ blog.title }}</span></td>
                    <td class=" px-4 py-2 max-w-[400px]  h-20">{{ blog.description }} </td>
                    <td class=" px-4 py-2  h-20"><span class="uppercase  p-2 rounded-lg cursor-pointer"
                            :class="blog.status == 'published' ? 'bg-[#BFE4C3] text-[#1e5a24]' : 'bg-[#e4cdbf] text-[#774d2a]'">{{
                                blog.status }}</span>
                    </td>
                    <td class=" px-4 py-2 h-20">{{ formatDate2(blog.created_at) }}</td>
                    <td class=" px-4 py-2 h-20">{{ formatDate2(blog.updated_at) }}</td>

                    <td class="px-4 py-2 h-20"><i class="fa-solid fa-delete-left cursor-pointer" @click="delBlog(blog.id)"></i></td>
                    <td class="px-4 py-2 h-20"><RouterLink :to="`/admin/blog/${blog.id}/edit`" class="fa-solid fa-pen-to-square cursor-pointer" ></RouterLink></td>
                </tr>



            </tbody>
        </table>
        <div v-else class="text-xl w-full flex items-center justify-center h-40 text-gray-500 ">
            <h2 >Sorry, No blogs Available</h2>
        </div>
        <div class="w-full flex items-center justify-center" v-motion-fade-visible-once v-if="blogsAll.links?.length > 0">
                <div class="flex gap-2"  v-if="blogsAll.last_page != 1">
                    
                    <!-- Previous Page Button -->
                    <button v-if="blogsAll.current_page > 1" 
                        @click="getBlogsAll(blogsAll.current_page - 1)" 
                        aria-label="Previous Page">
                        &laquo;
                    </button>

                    <!-- Page Numbers -->
                    <button  v-for="(page, index) in visiblePages" 
                        :key="index" 
                        @click="getBlogsAll(page)" 
                        :class="page === blogsAll.current_page ? 'font-semibold text-a-dm' : ''"
                        :disabled="page === '...'">
                        {{ page }}
                    </button>

                    <!-- Next Page Button -->
                    <button v-if="blogsAll.current_page < blogsAll.last_page" 
                        @click="getBlogsAll(blogsAll.current_page + 1)" 
                        aria-label="Next Page">
                        &raquo;
                    </button>

                </div>
            </div>
    </section>
</template>
<style scoped>
td {

    min-height: 100px;
    vertical-align: middle;
}

tr:nth-of-type(2n) {
    background-color: #f7f7f7;
}
</style>
