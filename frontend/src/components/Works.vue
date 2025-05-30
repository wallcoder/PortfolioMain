<script setup>

import { RouterLink } from 'vue-router'
import { ref, onMounted, onBeforeUnmount } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import { useAnimationStore } from '@/stores/animation';
import { useLoaderStore } from '@/stores/loader';
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'
import Loader from '@/components/Loader.vue'
import ProjectCard from '@/components/ProjectCard.vue'
import { useProjectStore } from '@/stores/project';

const { isLoading } = storeToRefs(useLoaderStore())
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
const theme = useThemeStore()
const { projects, nextCursor, loading, hasMore, } = storeToRefs(useProjectStore());
const { fetchProjects } = useProjectStore()

onMounted(() => {
    if (projects.value.length === 0) {
        nextCursor.value = null
        hasMore.value = true
        fetchProjects(6)
    }
})


onBeforeUnmount(() => {

})



</script>

<template>
    <section class=" flex  flex-col  projects" id="works">

        <div class="flex justify-between items-center px-[8%]">
            <h2 class="text-xl text-grey-light  font-semibold py-2" v-motion :initial="initialValue"
                :visibleOnce="visibleOnceValue">
                Recent Projects



            </h2>
            <RouterLink to="/projects" class="text-grey-light text-sm font-semibold cursor-pointer hover:text-white ">VIEW
                MORE <i class="fa-solid fa-arrow-right"></i></RouterLink>

        </div>

        
        <div v-if="projects.length === 0 && !loading" class="md:px-[8%] px-[6%] text-xl text-grey-light py-2">
            No Project Available
        </div>

        <section v-else class="md:px-[8%] px-[6%]">

            <ProjectCard :item="projects" />

        </section>
        <!-- <button v-if="hasMore && !loading" @click="() => fetchProjects(1)"
            class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
            Load More
        </button> -->

        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="loading">
            <Loader />
        </div>


    </section>
</template>

<style scoped>
.connect-btn-lm {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.connect-btn-dm {
    border: 2px #81619E solid
}
</style>