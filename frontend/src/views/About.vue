<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia'
import ButtonExt from '@/components/ButtonExt.vue'
import { ref, onMounted } from 'vue'
import Skills from '@/components/Skills.vue'
import { useInfoStore } from '@/stores/info'
import Loader from '@/components/Loader.vue'
const { info, isLoadingInfo } = storeToRefs(useInfoStore())


const { label } = storeToRefs(useAuthStore())
const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH
const api = import.meta.env.VITE_STORAGE
onMounted(() => {
    label.value = {
        head: 'About me',


    }
})

</script>
<template >
    <div>
        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="isLoadingInfo">
            <Loader />
        </div>

        <section v-else class=" flex flex-col gap-8  " id="works">
            <div class="md:px-[8%] px-[6%] flex flex-col gap-6 ">
                <div class="about-content " v-html="info?.main_about"></div>
                <div class=" flex gap-2">
                    <ButtonExt content="Get in touch" link="mailto:biakropuia4@gmail.com" />
                    <ButtonExt content="Download CV" :link="`${api}/${info?.resume}`" />

                </div>
            </div>

            <Skills />





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
    gap: 20px;

}
</style>