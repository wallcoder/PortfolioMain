<script setup>
import { RouterLink } from 'vue-router'
import { ref, onMounted, onUnmounted } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import Button from '@/components/Button.vue'
import ButtonExt from '@/components/ButtonExt.vue'

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;
const email = import.meta.env.VITE_EMAIL

const isOpen = ref(false);
const isNavbarVisible = ref(true);
let lastScrollY = window.scrollY;
let scrollTimeout = null;

const toggleIsOpen = () => {
    isOpen.value = !isOpen.value;
}

const handleScroll = () => {
    const currentScrollY = window.scrollY;

    if (currentScrollY > lastScrollY + 10) {
        isNavbarVisible.value = false; // Hide header when scrolling down
    } else if (currentScrollY < lastScrollY - 10) {
        isNavbarVisible.value = true; // Show header when scrolling up
    }

    lastScrollY = currentScrollY;

    // Ensure header reappears when scrolling stops
    if (scrollTimeout) clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(() => {
        isNavbarVisible.value = true;
    }, 180000);
};

onMounted(() => {
    window.addEventListener("scroll", handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener("scroll", handleScroll);
});


</script>

<template>
    <div class="sticky top-0 z-10">
        <header :class="[isNavbarVisible ? 'translate-y-0' : '-translate-y-full', isDark ? 'bg-bg-dm/85' : 'bg-bg-lm/70']"
            class=" transition-transform duration-300 ease-in-out z-9 flex items-center laptop:px-[15%] tablet:px-[8%] px-[2%] py-[20px] justify-between sticky absolute top-0 backdrop-blur-xl">
            

            <span class="flex items-center gap-4">
                <i class="tablet:hidden fa-solid fa-bars text-2xl cursor-pointer " @click="toggleIsOpen()"></i>
                <RouterLink to="/" class=" text-xl font-semibold">biaka.dev</RouterLink>
            </span>
            <nav class="flex text-sm items-center gap-12">
                <div class="hidden tablet:flex items-center gap-12 ">
                    <RouterLink to="/blogs">Blogs</RouterLink>
                    <RouterLink to="/#works">Projects</RouterLink>
                    <RouterLink to="/#about">About</RouterLink>
                    <ButtonExt :link="`mailto:${email}`" content="Connect" />
                </div>



                <span class="flex items-center text-xl  gap-8">
                    <i class="fa-regular fa-moon cursor-pointer dark:hover:text-bg-lm" v-if="isDark" @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : 'text-a-lm'"></i>
                    <i class="fa-regular fa-sun cursor-pointer hover:text-[#414141]" v-else @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : ''"></i>
                    


                </span>







            </nav>

        </header>

        <!-- Slider -->
        <div class="w-full h-100vh fixed top-0 z-10 slider  tablet:hidden">
            <Transition>
                <div class="absolute = w-full h-[100vh] opacity-50  bg " :class="isDark ? 'bg-bg-lm/20' : 'bg-bg-dm'"
                    @click="isOpen = false" v-if="isOpen"></div>
            </Transition>


            <div :class="[isOpen ? 'transform translate-x-[0%]' : 'transform translate-x-[-100%]'], isDark ? 'bg-bg-dm' : 'bg-bg-lm'"
                class="absolute h-[100vh]  w-full smartphone-landscape:w-[40%] top-0 left-0 flex flex-col p-4   div-all duration-200 ease-linear">
                <div class="w-full flex items-center justify-between text-xl ">

                    <i class="tablet:hidden fa-solid fa-bars text-2xl cursor-pointer " @click="toggleIsOpen()"></i>
                    <i class="fa-regular fa-moon cursor-pointer dark:hover:text-bg-lm" v-if="isDark" @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : 'text-a-lm'"></i>
                    <i class="fa-regular fa-sun cursor-pointer hover:text-[#414141]" v-else @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : ''"></i>
                </div>
                <div class="flex flex-col pt-5">
                    <RouterLink to="/blogs" class="py-4 w-full" @click="isOpen = false">Blogs</RouterLink>
                    <RouterLink to="/#works" class="py-4 w-full" @click="isOpen = false">Projects</RouterLink>
                    <RouterLink to="/#about" class="py-4 w-full" @click="isOpen = false">About</RouterLink>
                    <RouterLink :link="`mailto:${email}`" class="py-4 w-full" @click="isOpen = false">Connect</RouterLink>
                </div>
            </div>


        </div>

    </div>
</template>

<style scoped>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}

.slider:focus-within .bg {
    visibility: visible;
}
</style>