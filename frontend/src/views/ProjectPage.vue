<script setup>
import ButtonExt from '@/components/ButtonExt.vue'
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'
import { useProjectStore } from '@/stores/project';
import Loader from '@/components/Loader.vue'
const api = import.meta.env.VITE_STORAGE
const { project, isLoadingProjectPage } = storeToRefs(useProjectStore())
const { fetchProjectBySlug } = useProjectStore()

const props = defineProps({
    slug: {
        type: String,
        required: true
    }
})

onMounted(() => {
    fetchProjectBySlug(props.slug)
})
</script>

<template>
    <div>
        <div class="w-full h-[90vh] flex  items-center justify-center" v-if="isLoadingProjectPage">
            <Loader />
        </div>

        <section v-else class="laptop:px-[8%]  tablet:px-[10%] px-[6%] py-20 flex flex-col gap-12">
            <div class="flex flex-col    gap-8">

                <div class="flex w-full flex-col md:flex-row bg-grey overflow-hidden rounded-lg">
                    <div class="md:w-1/2 lg:h-[500px] h-[400px]">
                        <img :src="`${api}/${project?.image1}`" class=" w-full h-full object-cover" alt="">
                    </div>

                    <div class="flex flex-col md:w-1/2 lg:h-[500px] h-[400px]">
                        <div class="w-full h-1/2">
                            <img :src="`${api}/${project?.image2}`" class=" w-full h-full object-cover" alt="">
                        </div>
                        <div class="w-full md:h-1/2">
                            <img :src="`${api}/${project?.image3}`" class=" w-full h-full object-cover" alt="">
                        </div>


                    </div>

                </div>

                <h1 class="text-4xl capitalize w-[80%] font-semibold">The Truth Behind JavaScript And Daffodils Over the
                    Hill
                </h1>



            </div>

            <div class="flex flex-col gap-4">
                <h2 class="text-3xl font-semibold my-2">About Project</h2>

                <div class="about-content " v-html="project?.about"></div>


            </div>


            <div class="flex flex-col gap-4">
                <h2 class="text-3xl font-semibold my-2">Project Links</h2>
                <div class=" flex gap-2">

                    <ButtonExt content="Demo" :link="`${project.demo}`" />
                    <ButtonExt content="Source Code" :link="`${project.source_code}`" />

                </div>
            </div>


            <div class="flex flex-col gap-4">
                <h2 class="text-3xl font-semibold my-2">Tech Stack Used</h2>
                <div class="flex gap-3 flex-wrap">
                    <span v-for="n in project.tech_stack"
                        class="hover:-translate-y-1 w-16 h-16 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                        <img class="w-10" :src="`${api}/${n?.tech?.logo}`" alt="">
                        <span
                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            {{ n?.tech?.name }}
                        </span>

                    </span>




                </div>
            </div>
        </section>
    </div>
</template>
<style scoped>
:deep(.about-content h2) {
    line-height: 2rem;
    font-weight: 600;
    font-size: 1.5rem;
}

:deep(.about-content) {
    display: flex;
    flex-direction: column;
    gap: 10px;
    /* #FAFAFA */
}
:deep(.about-content p) {
    color: #FAFAFA;
}
</style>