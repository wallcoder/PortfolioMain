<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia'
import { ref, onMounted } from 'vue'
import ProjectCard from '@/components/ProjectCard.vue'
import { useProjectStore } from '@/stores/project';
import Loader from '@/components/Loader.vue'
import Button from '@/components/Button.vue'
const { label } = storeToRefs(useAuthStore())
const { projects, nextCursor, loading, hasMore, } = storeToRefs(useProjectStore());
const { fetchProjects } = useProjectStore()





onMounted(() => {
    label.value = {
        head: 'Projects',


    }
    if (projects.value.length === 0) {
        nextCursor.value = null
        hasMore.value = true
        fetchProjects(6)
    }
})

</script>
<template >
    <section class=" flex  flex-col  projects" id="works">


        <div v-if="projects.length === 0 && !loading" class="md:px-[8%] px-[6%] text-xl text-grey-light py-2">
            No Project Available
        </div>
        <section v-else class="md:px-[8%] px-[6%]">

            <ProjectCard :item="projects" />

        </section>
        <div class="flex justify-center items-center " v-if="hasMore && !loading" >
            <Button content="Load More" :fun="()=>{fetchProjects(6)}"/>
            
        </div>

        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="loading">
            <Loader />
        </div>

    </section>
</template>