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
    <section class=" flex pt-[100px] flex-col pb-20 projects" id="works">
        <h2 class="text-2xl" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
            My Works
        </h2>

        <!-- Works Card -->
        <section class="">

            <div class="flex flex-col mt-10 gap-10 tablet:px-0" v-for="(item, index) in works" :id="item.id" v-if="works.length > 0" >
                <div v-motion :initial="initialValue" :visibleOnce="visibleOnceValue" v-if="index % 2 == 0"
                    class="  tablet:items-start flex-col-reverse justify-end tablet-large:flex-row flex tablet:justify-center  pb-0 rounded-xl  gap-3 tablet:gap-8"
                    :class="isDark ? 'bg-s-dm' : 'bg-s-lm'">
                    <div
                        class=" w-[70%] aspect-[3/2] min-w-[320px]  pt-10 tablet:pt-10 tablet:pl-5 flex flex-col justify-end">
                        <img :src="item.image" alt="" v-motion :initial="initialValueImg"
                            :visibleOnce="visibleOnceValueImg"
                            class="bg-gray-200 w-full h-full tablet-large:rounded-tl-xl rounded-tr-xl object-cover">
                    </div>
                    <div class="flex flex-col justify-center tablet-large:w-[50%] px-4 tablet:px-0">
                        <div class="flex flex-col pb-4 tablet:pb-0 pt-10 gap-2">
                            <span class="bg-gray-200 w-11 h-11 rounded-lg">
                                <img :src="item.logo" alt="" class="w-full h-full rounded-lg object-cover">
                            </span>
                            <h2 class="text-2xl mt-3">{{ item.title }} </h2>
                            <p class="min-h-[80px] text-md">
                                {{ item.description }}
                            </p>
                            <div class="flex items-center gap-3 pb-4">
                                <ButtonExt content="View" />
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div v-motion :initial="initialValue" :visibleOnce="visibleOnceValue" v-else
                    class="tablet:items-start flex-col justify-end tablet-large:flex-row flex tablet:justify-center  pb-0 rounded-xl  gap-3 tablet:gap-8"
                    :class="isDark ? 'bg-s-dm' : 'bg-s-lm'">

                    <div class="flex flex-col justify-center tablet-large:w-[50%] tablet:pl-5 px-4 ">
                        <div class="flex flex-col pb-4 tablet:pb-0 pt-10 gap-2">
                            <span class="bg-gray-200 w-11 h-11 rounded-lg">
                                <img :src="item.logo" alt=""
                                    class="w-full h-full rounded-lg object-cover">
                            </span>
                            <h2 class="text-2xl mt-3">{{ item.title }}</h2>
                            <p class="min-h-[80px] text-md">
                                {{ item.description }}
                            </p>
                            <div class="flex items-center gap-3 pb-4">
                                <ButtonExt content="View" />
                                <ButtonExt content="Github" iconStyle="fa-brands fa-github" extraStyle="" />
                            </div>
                        </div>
                    </div>
                    <div class="w-[70%] aspect-[3/2] min-w-[320px]  pt-10 tablet:pt-10  flex flex-col justify-end">
                        <img :src="item.image" alt="" v-motion :initial="initialValueImg"
                            :visibleOnce="visibleOnceValueImg"
                            class="bg-gray-200 w-full h-full rounded-tr-xl tablet-large:rounded-tr-none rounded-tl-none tablet-large:rounded-tl-xl  object-cover">
                    </div>
                </div>
            </div>
            <div class="w-full h-[20vh] flex items-center" v-else>
                <h2 class="text-xl">No Works Available</h2>
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
}
</style>