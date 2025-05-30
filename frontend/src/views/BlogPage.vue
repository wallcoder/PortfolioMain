<script setup>
import ButtonExt from '@/components/ButtonExt.vue'
import { ref, onMounted, computed } from 'vue'
import { storeToRefs } from 'pinia'
import { useBlogStore } from '@/stores/blog';
import Loader from '@/components/Loader.vue'
const api = import.meta.env.VITE_STORAGE
const { blog, isLoadingBlogPage } = storeToRefs(useBlogStore())
const { fetchBlogBySlug } = useBlogStore()

const props = defineProps({
    slug: {
        type: String,
        required: true
    }
})

onMounted(() => {
    fetchBlogBySlug(props.slug)
})

const formattedBody = computed(() => {
    if (!blog.value?.body) return ''
    return blog.value.body.replace(/src="\/storage/g, `src="${api}`)
})
</script>

<template>
    <div>


        <div class="w-full h-[90vh] flex  items-center justify-center" v-if="isLoadingBlogPage">
            <Loader />
        </div>
        <section v-else class="laptop:px-[8%]  tablet:px-[10%] px-[6%] py-20 flex flex-col gap-12">
            <div class="flex flex-col   gap-8">
                <h1 class="text-4xl capitalize w-[80%] font-semibold">
                    {{ blog?.title }}
                </h1>
                <p class="text-grey-light w-[80%]">
                    {{ blog?.sub_title }}
                </p>
                <div
                    class="w-full h-[200px] sm:h-[300px] md:h-[400px] lg:h-[500px] xl:h-[600px] max-w-[90%] md:max-w-4xl ">
                    <img :src="`${api}/${blog?.cover_photo_path}`" class="w-full h-full object-cover rounded-lg" alt="" />
                </div>



            </div>


            <div class="body-content" v-html="formattedBody"></div>
        </section>
    </div>
</template>
<style scoped>
:deep(.body-content) {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
    color: #e4e4e7;
    /* Tailwind's zinc-200 */
    font-size: 1rem;
    line-height: 1.75rem;
}

:deep(.body-content h2) {
    font-size: 1.75rem;
    font-weight: 700;
    color: #fafafa;
    margin-top: 1.5rem;
    margin-bottom: 0.5rem;
}

:deep(.body-content p) {
    color: #d4d4d8;
    line-height: 1.75rem;
}

:deep(.body-content ul) {
    padding-left: 1.5rem;
    list-style-type: disc;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

:deep(.body-content li p) {
    margin: 0;
}

:deep(.body-content img) {
    max-width: 100%;
    border-radius: 0.5rem;
    object-fit: cover;
    margin: 1rem 0;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

:deep(.body-content pre) {
    background-color: #18181b;
    padding: 1rem;
    border-radius: 0.5rem;
    overflow-x: auto;
    color: #f5f5f5;
    font-size: 0.9rem;
    line-height: 1.5rem;
}

:deep(.body-content code) {
    font-family: 'Fira Code', 'Courier New', monospace;
    color: #d1d5db;
}

:deep(.body-content img) {
    max-width: 100%;
    border-radius: 0.5rem;
    object-fit: cover;
    margin: 1rem 0;
}
</style>