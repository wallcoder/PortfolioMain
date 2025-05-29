<script setup>

import { RouterLink } from 'vue-router'
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import { useAnimationStore } from '@/stores/animation';
import { useLoaderStore } from '@/stores/loader';
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'
import Loader from '@/components/Loader.vue'
import BlogCard from '@/components/BlogCard.vue'
const { isLoading } = storeToRefs(useLoaderStore())
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;
const works = ref([
    {
        id: 1,
        title: 'GymPass',
        description: 'A gym listing app made for gym-owners and gym enthusiasts that enables membership booking.',
        logo: '/logo.svg',
        image: '/ex.png',
        demo: '',
        source: ''

    },
    {
        id: 2,
        title: 'GymPass',
        description: 'A gym listing app made for gym-owners and gym enthusiasts that enables membership booking.',
        logo: '/logo.svg',
        image: '/yo.png',
        demo: '',
        source: ''

    },
    {
        id: 2,
        title: 'GymPass',
        description: 'A gym listing app made for gym-owners and gym enthusiasts that enables membership booking.',
        logo: '/logo.svg',
        image: '/yo.png',
        demo: '',
        source: ''

    }
])

onMounted(() => {
    isLoading.value = true

    setTimeout(() => {
        isLoading.value = false
    }, 1000)
})



</script>

<template>
    <section class=" flex  flex-col  projects" id="works">
        <div class="flex justify-between items-center px-[8%]">
            <h2 class="text-xl text-grey-light  font-semibold py-2" v-motion :initial="initialValue"
                :visibleOnce="visibleOnceValue">
                Recent Blogs
            </h2>
            <RouterLink to="/blogs" class="text-grey-light text-sm font-semibold cursor-pointer hover:text-white ">VIEW
                MORE <i class="fa-solid fa-arrow-right"></i></RouterLink>
        </div>
        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="isLoading">
            <Loader />
        </div>



        <!-- Works Card -->
        <section class="md:px-[8%] px-[6%]" v-else>



            
                <BlogCard />
                











        </section>

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