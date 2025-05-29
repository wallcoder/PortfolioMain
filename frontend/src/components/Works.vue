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
import ProjectCard from '@/components/ProjectCard.vue'
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
                Recent Projects
            </h2>
            <RouterLink to="/projects" class="text-grey-light text-sm font-semibold cursor-pointer hover:text-white ">VIEW
                MORE <i class="fa-solid fa-arrow-right"></i></RouterLink>

        </div>
        <div class="w-full h-[20vh] flex  items-center justify-center" v-if="isLoading">
            <Loader />
        </div>



        <!-- Works Card -->
        <section class="md:px-[8%] px-[6%]" v-else>



           
                <ProjectCard />
                <!-- <div class="flex flex-col  py-8" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
                    <h2 class="text-2xl ">Beat Shop</h2>
                    <div class="flex flex-col gap-4 tablet:flex-col-reverse desktop:flex-row-reverse  ">

                        <img src="@/assets/dp.png" alt=""
                            class="rounded-lg pt-4 min-h-[210px]     tablet:pt-0 object-contain  w-full max-w-full tablet:max-w-[500px] laptop:max-w-[500px] tablet-large:h-[281px] laptop:h-[300px]">


                        <div class="flex flex-col gap-4 tablet:flex-col-reverse tablet-large:justify-end py-2">
                            <div class="flex items-center gap-3 ">
                                <ButtonExt content="View" link="https://youtu.be/8vvtC_0Rxi0" />
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle=""
                                    link="https://github.com/wallcoder/beat-shop-old" />
                            </div>

                            <div class="flex flex-col gap-2 ">
                                <h3 class="text-base pt-4 font-semibold">Tech Stack</h3>
                                <div class="flex gap-3">
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6 " src="@/assets/nodejs.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Node.js
                                        </span>
                                    </span>

                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6" src="@/assets/express2.svg" alt="" v-if="isDark">
                                        <img class="w-6" src="@/assets/express1.svg" alt="" v-else>
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Express.js
                                        </span>
                                    </span>
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6" src="@/assets/mysql.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            MySQL
                                        </span>
                                    </span>

                                </div>
                                <p class="pt-4 ">
                                    A single vendor beat selling website that allows producer to showcase and sell their
                                    beats online. The platform provides a
                                    custom music player that enables beat playback and previewing before
                                    purchase.
                                </p>

                            </div>
                        </div>
                    </div>


                </div> -->






          





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