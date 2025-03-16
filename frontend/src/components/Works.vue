<script setup>

import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import { useAnimationStore } from '@/stores/animation';
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'

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



// const initialValue = ref({ opacity: 0, y: 300, transition: { duration: 900, ease: 'easeOut' } });
// const visibleOnceValue = ref({ opacity: 1, y: 0, transition: { duration: 900, ease: 'easeOut' } })

// const initialValueImg = ref({ opacity: 0, y: 50, transition: { duration: 600, ease: 'easeIn' } });
// const visibleOnceValueImg = ref({ opacity: 1, y: 0, transition: { duration: 600, ease: 'easeIn' } })
</script>

<template>
    <section class=" flex pt-[100px] flex-col  projects" id="works">
        <h2 class="text-2xl font-semibold py-2" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
            My Works
        </h2>

        <!-- Works Card -->
        <section class="">

            <!-- <div class="flex flex-col mt-10 gap-10 tablet:px-0 " v-for="(item, index) in works" :id="item.id"
                v-if="works.length > 0">
                <div v-motion :initial="initialValue" :visibleOnce="visibleOnceValue" v-if="index % 2 == 0"
                    class=" flex-col-reverse  justify-end tablet-large:flex-row flex tablet:justify-center  pb-0 rounded-xl  gap-3 tablet:gap-8"
                    :class="isDark ? 'bg-s-dm' : 'bg-s-lm'">
                    <div
                        class=" aspect-[3/2] min-w-[500px] pt-5   tablet:pt-10 tablet:pl-5 flex flex-col justify-end">
                        <img :src="item.image" alt="" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg"
                            class="bg-gray-200 w-full h-full tablet-large:rounded-tl-xl rounded-tr-xl object-cover">
                    </div>
                    <div class=" py-8 ">
                        <div class="flex flex-col justify-center  px-4 tablet-large:px-0">
                            <div class="flex flex-col pb-4 tablet:pb-0 pt-10  gap-2">
                                <span class="bg-gray-200 w-10 h-10 rounded-lg">
                                    <img :src="item.logo" alt="" class="w-full h-full rounded-lg object-cover">
                                </span>
                                <h2 class="text-xl  smartphone-lg:text-2xl mt-3">{{ item.title }} </h2>
                                <p class="pb-2   text-sm  smartphone-lg:text-base pr-2 ">
                                    {{ item.description }}
                                </p>
                                <div class="flex items-center gap-3 pb-4">
                                    <ButtonExt content="View" />
                                    <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-motion :initial="initialValue" :visibleOnce="visibleOnceValue" v-else
                    class=" flex-col justify-end tablet-large:flex-row flex tablet:justify-center  pb-0 rounded-xl  gap-3 tablet:gap-8"
                    :class="isDark ? 'bg-s-dm' : 'bg-s-lm'">

                    <div class="flex flex-col justify-center tablet-large:w-[50%] tablet:pl-5 px-4 ">
                        <div class="flex flex-col pb-4 tablet:pb-0 pt-10 gap-2">
                            <span class="bg-gray-200 w-11 h-11 rounded-lg">
                                <img :src="item.logo" alt="" class="w-full h-full rounded-lg object-cover">
                            </span>
                            <h2 class="text-xl  smartphone-lg:text-2xl mt-3">{{ item.title }}</h2>
                            <p class="pb-2 text-sm  smartphone-lg:text-base">
                                {{ item.description }}
                            </p>
                            <div class="flex items-center gap-3 pb-4">
                                <ButtonExt content="View" />
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle="" />
                            </div>
                        </div>
                    </div>
                    <div class="w-[70%] aspect-[3/2]   pt-5 tablet:pt-10  flex flex-col justify-end">
                        <img :src="item.image" alt="" v-motion :initial="initialValueImg" :visibleOnce="visibleOnceValueImg"
                            class="bg-gray-200 w-full h-full rounded-br-none tablet-large:rounded-br-lg rounded-tr-xl tablet-large:rounded-tr-none rounded-tl-none tablet-large:rounded-tl-xl  object-cover">
                    </div>
                </div>
            </div>
            <div class="w-full h-[20vh] flex items-center" v-else>
                <h2 class="text-xl">No Works Available</h2>
            </div> -->

            <div>
                <div class="flex flex-col  py-8" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
                    <h2 class="text-2xl ">Fee Collection System</h2>
                    <div class="flex flex-col gap-4 tablet:flex-col-reverse desktop:flex-row-reverse  ">

                        <img src="@/assets/fc.png" alt=""
                            class="rounded-lg pt-4 min-h-[210px]    tablet:pt-0 object-contain  w-full max-w-full tablet:max-w-[500px] laptop:max-w-[500px] tablet-large:h-[281px] laptop:h-[300px]">


                        <div class="flex flex-col gap-4 tablet:flex-col-reverse tablet-large:justify-end py-2">
                            <div class="flex items-center gap-3 ">
                                <ButtonExt content="View" link="https://youtu.be/eIy3Ko0ftg8" />
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle=""
                                    link="https://github.com/wallcoder/fee-collection-system" />
                            </div>

                            <div class="flex flex-col gap-2 ">
                                <h3 class="text-base pt-4 font-semibold">Tech Stack</h3>
                                <div class="flex gap-3">
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6 " src="@/assets/vue.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Vue.js
                                        </span>
                                    </span>
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6" src="@/assets/tailwind.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Tailwind
                                        </span>
                                    </span>
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6" src="@/assets/express2.svg" alt="" v-if="isDark">
                                        <img class="w-6" src="@/assets/express1.svg" alt="" v-else>
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Express
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
                                    This Fee Collection System is a web-based application developed to simplify and automate
                                    the
                                    fee collection process for college or university. This system enables students and
                                    parents to view
                                    fee details and make payments online, while providing administrative staff with tools to
                                    manage
                                    fee structures and track payments.
                                </p>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="flex flex-col  py-8" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
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


                </div>

                <div class="flex flex-col  py-8" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
                    <h2 class="text-2xl ">GymPass</h2>
                    <div class="flex flex-col gap-4 tablet:flex-col-reverse desktop:flex-row-reverse  ">

                        <img src="@/assets/ga.png" alt=""
                            class="rounded-lg pt-4 min-h-[210px]     tablet:pt-0 object-contain  w-full max-w-full tablet:max-w-[500px] laptop:max-w-[500px] tablet-large:h-[281px] laptop:h-[300px]">


                        <div class="flex flex-col gap-4 tablet:flex-col-reverse tablet-large:justify-end py-2">
                            <div class="flex items-center gap-3 ">
                                <!-- <ButtonExt content="View" link="https://youtu.be/8vvtC_0Rxi0" /> -->
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle=""
                                    link="https://github.com/wallcoder/gym-app" />
                            </div>

                            <div class="flex flex-col gap-2 ">
                                <h3 class="text-base pt-4 font-semibold">Tech Stack</h3>
                                <div class="flex gap-3">
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6 " src="@/assets/vue.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Vue.js
                                        </span>
                                    </span>
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6" src="@/assets/tailwind.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Tailwind
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
                                        <img class="w-6" src="@/assets/postgre.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Postgre
                                        </span>
                                    </span>

                                </div>
                                <p class="pt-4 ">
                                    This is a Gym Listing Web Application that connects gym-goers with gym owners.
                                    It helps people find gyms in Mizoram, explore facilities, and choose membership plans
                                    that suit their needs.
                                </p>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="flex flex-col  py-8" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
                    <h2 class="text-2xl ">Point of Sale System</h2>
                    <div class="flex flex-col gap-4 tablet:flex-col-reverse desktop:flex-row-reverse  ">

                        <img src="@/assets/pos.png" alt=""
                            class="rounded-lg pt-4 min-h-[210px]     tablet:pt-0 object-contain  w-full max-w-full tablet:max-w-[500px] laptop:max-w-[500px] tablet-large:h-[281px] laptop:h-[300px]">


                        <div class="flex flex-col gap-4 tablet:flex-col-reverse tablet-large:justify-end py-2">
                            <div class="flex items-center gap-3 ">
                                <!-- <ButtonExt content="View" link="https://youtu.be/8vvtC_0Rxi0" /> -->
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle=""
                                    link="https://github.com/wallcoder/pos" />
                            </div>

                            <div class="flex flex-col gap-2 ">
                                <h3 class="text-base pt-4 font-semibold">Tech Stack</h3>
                                <div class="flex gap-3">
                                    <span
                                        class="w-11 h-11 cursor-pointer bg-s-lm dark:bg-s-dm rounded-lg flex justify-center items-center relative group">
                                        <img class="w-6 " src="@/assets/laravel.svg" alt="">
                                        <span
                                            class="absolute top-[-45px] left-1/2 -translate-x-1/2 bg-s-lm dark:bg-s-dm text-sm p-2 rounded-md text-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                            Laravel
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
                                    This is an ongoing project. It is
                                    a simple Point of Sale (POS) system designed s to manage sales and
                                    track inventory efficiently. 
                                </p>

                            </div>
                        </div>
                    </div>


                </div>


            </div>





        </section>

    </section>
</template>

<style scoped>
.connect-btn-lm {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.connect-btn-dm {
    border: 2px #81619E solid
}</style>