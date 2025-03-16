<script setup>
import { ref, onMounted, watch, nextTick } from 'vue';
import Quill from 'quill';
import { storeToRefs } from 'pinia';
import 'quill/dist/quill.snow.css';
import { useBlogStore } from '@/stores/blog';
import SpinnerLoader from "@/components/SpinnerLoader.vue";
import { useLoaderStore } from "@/stores/loader"

const api = import.meta.env.VITE_STORAGE;
const blogStore = useBlogStore();
const { handleImage, handleSubmit, getBlogById, updateBlog, handleImageEdit } = blogStore;
const { editBlogDetails, blogEdit } = storeToRefs(blogStore);
const { isLoading, isError, isLoadingSpinner } = storeToRefs(useLoaderStore())
const quillInstance = ref(null);
const editorContainer = ref(null);
const isOpenDetails = ref(false);

const props = defineProps({
    id: {
        type: String,
        required: true
    }
});

const toggleDetails = () => {
    isOpenDetails.value = !isOpenDetails.value;
};

onMounted(async () => {
    // Fetch blog details first
    await getBlogById(parseInt(props.id));

    // Wait for the DOM to update
    await nextTick();

    // Initialize Quill
    quillInstance.value = new Quill(editorContainer.value, {
        theme: 'snow',
        placeholder: 'Write something...',
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['code-block'],
            ],
        },
    });

    // Set content after Quill is initialized
    if (editBlogDetails.value.content) {
        quillInstance.value.root.innerHTML = editBlogDetails.value.content;
    }

    // Sync Quill content with Vue state
    quillInstance.value.on('text-change', () => {
        editBlogDetails.value.content = quillInstance.value.root.innerHTML;
    });
});

</script>

<template>
    <section class="p-8 flex flex-col w-full gap-3 transition-all duration-200 ease-linear" v-motion-fade-visible-once>
        <h2 class="uppercase font-semibold text-xl">Edit Blog</h2>
        <!-- {{ editBlogDetails }}
        {{ blogEdit }} -->
        <div v-if="isError || isLoadingSpinner">
            <div v-if="isLoadingSpinner" class="w-full flex items-center justify-center h-[40vh]">
                <SpinnerLoader />
            </div>
            <div v-if="isError" class="w-full flex items-center justify-center text-base">
                <h2>Network Error! Try refreshing the page.</h2>

            </div>
        </div>
        <form action="" @submit.prevent="updateBlog(parseInt(props.id))" v-else>
            <div class="flex justify-between items-center gap-2">
                <div class="flex items-center gap-2">
                    <h3 @click="toggleDetails()" class="cursor-pointer">Blog Details</h3>
                    <i @click="toggleDetails()" class="fa-solid fa-caret-up cursor-pointer"
                        :class="isOpenDetails ? '' : 'rotate-180'"></i>
                </div>
                <div class="flex gap-2">
                    <button type="submit"
                        class="p-2 px-4 bg-[#b67dd1] hover:bg-[#c386df] font-semibold text-white rounded-lg uppercase">
                        Save
                    </button>
                </div>
            </div>
            <div class="flex gap-4 flex-col" :class="isOpenDetails ? '' : 'hidden'">
                <div class="flex flex-col">
                    <label for="title">Title</label>
                    <input v-model="editBlogDetails.title" required type="text" id="title"
                        class=" w-[400px] p-2 outline-none" placeholder="Give a Title">
                    <label for="status">Status</label>
                    <select  name="" id="status" class="w-40 p-2" v-model="editBlogDetails.status">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>

                    <label for="image">Image</label>
                    <input type="file" @change="handleImageEdit" id="image" class="p-2 outline-none w-[400px]">
                </div>
                <div class="flex flex-col">
                    <label for="description">Description</label>
                    <textarea v-model="editBlogDetails.description" required cols="60" rows="3"
                        placeholder="Write description.." class="p-2 outline-none"></textarea>
                </div>
                <img v-if="blogEdit.image && !editBlogDetails.imageUrl" class="w-full h-[70vh] object-cover"
                    :src="`${api}/${blogEdit.image}`" alt="">
                <img v-else class="w-full h-[70vh] object-cover" :src="editBlogDetails.imageUrl" alt="">
            </div>

            <h3 class="mt-4">Blog Content</h3>
            <div class="mt-4 relative" v-motion-fade-visible-once>
                <div ref="editorContainer" class="w-full bg-white"></div>
            </div>

        </form>
    </section>
</template>

<style scoped>
::v-deep(.ql-editor) {
    min-height: 500px;
}

::v-deep(.ql-toolbar) {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: white;
}
</style>
