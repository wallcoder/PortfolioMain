<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia'
import { ref, onMounted } from 'vue'
import ProjectCard from '@/components/ProjectCard.vue'
const { label } = storeToRefs(useAuthStore())
onMounted(() => {
    label.value = {
        head: 'Projects',

        
    }
})

</script>
<template >
    <section class=" flex  flex-col  projects" id="works">

        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="isLoading">
            <Loader />
        </div>



        <!-- Works Card -->
        <section class="md:px-[8%] px-[6%]" v-else>
            <ProjectCard />


            





        </section>

    </section>
</template>