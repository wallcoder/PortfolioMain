<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { RouterLink } from 'vue-router'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme'
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'
import Loader from '@/components/Loader.vue'
import { useAnimationStore } from '@/stores/animation';
import { useAuthStore } from '@/stores/auth';
const {label} = storeToRefs(useAuthStore())
const anim = useAnimationStore()
const { targetEls, initialValue, initialValueImg, visibleOnceValue, visibleOnceValueImg } = storeToRefs(anim)
// Theme Store
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme

// Environment Variables
const email = import.meta.env.VITE_EMAIL
const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH

// Props


// Parallax Scroll
const scrollY = ref(0)

const handleScroll = () => {
    scrollY.value = window.scrollY
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<template>
    <section class="  laptop:px-[8%]  tablet:px-[10%] px-[6%] py-[30vh] 2xl:py-[20vh] h-[550px] px-[10%] md:px-0 text-white overflow-hidden">
        <!-- Skewed Background -->
        <div class="absolute top-0 left-0 w-full h-0 bg-red-200 ">
            <div
                class="bg-gradient-to-br from-[#288cff] to-[#C06C84] w-[80%] md:w-1/2 h-[700px] skew-x-[3.3rad] -translate-x-32 skew-y-[3.18rad] -translate-y-[210px]">
            </div>
        </div>

        

       
        <div class="relative z-20  h-10 w-full" >
            <div  class="flex flex-col transition-transform duration-100 ease-out will-change-transform "
                :style="{ transform: `translateY(${scrollY * 0.23}px)` }">
                <h1 class="text-4xl font-semibold leading-none"  v-motion :initial="initialValue" :visibleOnce="visibleOnceValue">
                    {{ label.head }}<span class="opacity-60 leading-none" v-if="label.headsec">{{ label.headsec }}</span>
                </h1>
                <h1 class="text-2xl font leading-none" v-motion :initial="initialValue" :visibleOnce="visibleOnceValue"  >{{ label.sub }}</h1>
               
                <div class="flex gap-2 items-center text-[28px] " v-motion :initial="initialValue" :visibleOnce="visibleOnceValue"  >
                    <a :href="linkedIn" class="hover:-translate-y-[2px] transition-transform duration-300 ease-in-out "
                        target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a :href="github" class="hover:-translate-y-[2px] transition-transform duration-300 ease-in-out "
                        target="_blank"><i class="fa-brands fa-github"></i></a>
                    <a :href="instagram" class="hover:-translate-y-[2px] transition-transform duration-300 ease-in-out "
                        target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>
</template>


<style scoped>
.connect-btn-lm {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
        rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.connect-btn-dm {
    border: 2px #81619e solid;
}
</style>
