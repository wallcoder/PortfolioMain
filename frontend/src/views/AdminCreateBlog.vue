<script setup>

import { ref, onMounted } from 'vue';
import Quill from 'quill';
import { storeToRefs } from 'pinia';
import 'quill/dist/quill.snow.css'; // Import Quill's styles
import { useBlogStore } from '@/stores/blog';

const blogStore = useBlogStore();
const { handleImage, handleSubmit, handleSubmitDraft } = blogStore;
const { blogDetails } = storeToRefs(blogStore);
const editor = ref(null);
const quillInstance = ref(null);
const isOpenDetails = ref(false);

const toggleDetails = () => {
    isOpenDetails.value = !isOpenDetails.value;
}
onMounted(() => {
    quillInstance.value = new Quill(editor.value, {
        theme: 'snow',
        placeholder: 'Write something...',
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                // ['image'], // Image button
                ['code-block'],
            ],
        },
    });

    quillInstance.value.on('text-change', () => {
        blogDetails.value.content = quillInstance.value.root.innerHTML
    })
});

</script>
<template>
    <section class=" p-8 flex flex-col w-full gap-3 transition-all duration-200 ease-linear" v-motion-fade-visible-once>
        <h2 class="uppercase font-semibold text-xl">create blog</h2>

        <form action="" @submit.prevent>
            <div class="flex justify-between items-center gap-2  ">
                <div class="flex items-center gap-2">
                    <h3 @click="toggleDetails()" class="cursor-pointer">Blog Details </h3><i @click="toggleDetails()"
                        class=" fa-solid fa-caret-up cursor-pointer" :class="isOpenDetails ? '' : 'rotate-180'"></i>
                </div>
                <div class="flex gap-2">
                    <button type="submit" @click="handleSubmit('published')"
                        class=" p-2 px-4 bg-[#b67dd1] hover:bg-[#c386df] font-semibold text-white rounded-lg uppercase">Publish</button>
                    <button type="submit" @click="handleSubmit('draft')"
                        class=" p-2 px-4 bg-[#b67dd1] hover:bg-[#c386df] font-semibold text-white rounded-lg uppercase">Draft</button>
                </div>
            </div>
            <div class="flex gap-2 " :class="isOpenDetails ? '' : 'hidden'">
                <div class="flex flex-col">
                    <label for="title">Title</label>
                    <input v-model="blogDetails.title" required type="text" name="" id="title" class="p-2 outline-none"
                        placeholder="Give a Title">
                    <label for="title">Image</label>
                    <input required type="file" @change="handleImage" name="" id="title" class="p-2 outline-none"
                        placeholder="Give a Title">

                </div>
                <div class="flex flex-col">
                    <label for="title">Description</label>
                    <textarea v-model="blogDetails.description" required name="" id="" cols="60" rows="5"
                        placeholder="Write description.." class="p-2 outline-none"></textarea>
                </div>

            </div>
            <h3 class="mt-4">Blog Content </h3>
            <div class="mt-4 " v-motion-fade-visible-once>
                <div ref="editor" class="w-full bg-white ">
                    <div class="ql-toolbar sticky top-0 bg-white z-10 border-b "></div>
                </div>
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
