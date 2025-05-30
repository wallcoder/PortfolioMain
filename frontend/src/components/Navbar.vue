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
const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH

const toggleIsOpen = () => {
    isOpen.value = !isOpen.value;
}

const scrollY = ref(window.scrollY);

const handleScroll = () => {
    const currentScrollY = window.scrollY;
    scrollY.value = currentScrollY;

    if (currentScrollY > lastScrollY + 10) {
        isNavbarVisible.value = false;
    } else if (currentScrollY < lastScrollY - 10) {
        isNavbarVisible.value = true;
    }

    lastScrollY = currentScrollY;

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
    <div>
        <div class="fixed w-full top-0 left-0 z-30" :class="[
            isNavbarVisible ? 'translate-y-0' : '-translate-y-full',
            scrollY < 400 && $route.name !== 'blog-page' && $route.name !== 'project-page'
                ? 'bg-transparent '
                : 'bg-bg-dm/85 backdrop-blur-xl'
        ]">
            <header
                class="transition-all duration-300 ease-in-out z-9 flex items-center py-[18px] justify-between sticky px-[4%] top-0 ">



                <span class="flex items-center gap-4">
                    <div class="tablet:hidden flex justify-center items-center">
                        <i class=" bx bx-menu text-2xl cursor-pointer active:bg-grey/50  rounded-full p-2 active:scale-[0.9] transition-all ease-in"
                            @click="toggleIsOpen()"></i>
                    </div>

                    <RouterLink to="/" v-if="scrollY > 400 || ($route.name == 'blog-page' || $route.name == 'project-page')" class=" text-[1.3rem] hidden md:block">biaka<span
                            class=" text-gray-300">dev</span>
                    </RouterLink>

                </span>

                <div class="hidden tablet:flex items-center gap-6 text-[1rem] font-semibold">

                    <RouterLink to="/" :class="[
                        $route.path === '/'
                            ? 'text-acc hover:text-acc'
                            : 'hover:text-white',
                        'w-full flex gap-2 items-center group'
                    ]" @click="isOpen = false">
                        <span>Home</span>
                    </RouterLink>
                    <RouterLink to="/blogs" :class="[
                        $route.path === '/blogs'
                            ? 'text-acc hover:text-acc'
                            : 'hover:text-white',
                        'w-full flex gap-2 items-center group'
                    ]" @click="isOpen = false">
                        <span>Blogs</span>
                    </RouterLink>
                    <RouterLink to="/projects" :class="[
                        $route.path === '/projects'
                            ? 'text-acc hover:text-acc'
                            : 'hover:text-white',
                        'w-full flex gap-2 items-center group'
                    ]" @click="isOpen = false">
                        <span>Projects</span>
                    </RouterLink>
                    <RouterLink to="/about" :class="[
                        $route.path === '/about'
                            ? 'text-acc hover:text-acc'
                            : 'hover:text-white',
                        'w-full flex gap-2 items-center group'
                    ]" @click="isOpen = false">
                        <span>About</span>
                    </RouterLink>
                </div>



                <!-- <span class="flex items-center text-xl  gap-8">
                <i class="fa-regular active:bg-gray-500 fa-moon p-1 size-8 flex justify-center rounded-full items-center cursor-pointer hover:bg-[#383838]" v-if="isDark" @click="toggleDark()"
                    :class="isDark ? 'text-gray-400' : 'text-a-lm'"></i>
                <i class="fa-regular active:bg-white fa-sun p-1 size-8 flex justify-center rounded-full items-center cursor-pointer hover:bg-gray-200" v-else @click="toggleDark()"
                    :class="isDark ? 'text-a-dm' : ''"></i>

                <ButtonExt :link="`mailto:${email}`" content="Connect" />

            </span> -->









            </header>

            

        </div>
        <!-- Slider -->
            <div class="w-full h-100vh fixed top-0 z-30 slider  tablet:hidden back">
                <Transition>
                    <div class="absolute = w-full h-[100vh] opacity-60  bg bg-black " @click="isOpen = false" v-if="isOpen">
                    </div>
                </Transition>


                <div :class="[isOpen ? 'transform translate-x-[0%]' : 'transform translate-x-[-100%]']"
                    class="absolute h-[100vh] bg-bg-dm/80 backdrop-blur-md  w-full smartphone-landscape:w-[60%] top-0 left-0 flex flex-col px-2 py-6 justify-between    div-all duration-200 ease-linear">
                    <div>
                        <div class="w-full flex items-center gap-2 text-xl ">

                            <i class="tablet:hidden fa-solid fa-arrow-left p-2 rounded-full flex items-center justify-center size-9  active:bg-grey cursor-pointer text-sm"
                                @click="toggleIsOpen()"></i>
                            <!-- <i class="fa-regular fa-moon cursor-pointer hover:text-bg-lm" v-if="isDark" @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : 'text-a-lm'"></i>
                    <i class="fa-regular fa-sun cursor-pointer hover:text-[#414141]" v-else @click="toggleDark()"
                        :class="isDark ? 'text-a-dm' : ''"></i> -->
                            <RouterLink to="/" class=" text-[1.2rem] ">biaka<span class=" text-gray-300">dev</span>
                            </RouterLink>
                        </div>

                        <div class="flex flex-col pt-8  gap-8">
                            <div class="flex flex-col gap-3">
                                <h3 class="text-grey-light font-bold pl-3">NAVIGATION</h3>

                                <nav class="flex flex-col text-grey-light font-semibold">
                                    <!-- <RouterLink to="/blogs" class="py-4 w-full" @click="isOpen = false">Blogs</RouterLink> -->
                                    <RouterLink to="/" exact-active-class="text-acc hover:text-acc"
                                        :class="[$route.path === '/' ? 'text-accent hover:text-accent' : 'hover:text-white']"
                                        class="py-2   w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"
                                        @click="isOpen = false"><i class="bx bx-home text-xl"></i> <span>Home</span>
                                    </RouterLink>
                                    <RouterLink to="/projects" exact-active-class="text-acc hover:text-acc"
                                        :class="[$route.path === '/projects' ? 'text-accent hover:text-accent' : 'hover:text-white']"
                                        class="py-2   w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"
                                        @click="isOpen = false"><i class="bx bx-briefcase text-xl"></i>
                                        <span>Projects</span>
                                    </RouterLink>
                                    <RouterLink to="/blogs" exact-active-class="text-acc hover:text-acc"
                                        :class="[$route.path === '/blogs' ? 'text-accent hover:text-accent' : 'hover:text-white']"
                                        class="py-2   w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"
                                        @click="isOpen = false"><i class="bx bx-pen text-xl"></i> <span>Blogs</span>
                                    </RouterLink>
                                    <RouterLink to="/about" exact-active-class="text-acc hover:text-acc"
                                        :class="[$route.path === '/about' ? 'text-accent hover:text-accent' : 'hover:text-white']"
                                        class="py-2   w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"
                                        @click="isOpen = false"><i class="bx bx-pencil text-xl"></i> <span>About</span>
                                    </RouterLink>



                                </nav>
                            </div>
                            <div class="flex flex-col gap-3">
                                <h3 class="text-grey-light font-bold pl-3">OTHERS</h3>

                                <nav class="flex flex-col text-grey-light font-semibold">
                                    <!-- <RouterLink to="/blogs" class="py-4 w-full" @click="isOpen = false">Blogs</RouterLink> -->


                                    <a :href="`mailto:${email}`"
                                        class="py-2 hover:text-white  w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"
                                        @click="isOpen = false"><i class="bx bx-link text-xl"></i> <span>Connect</span></a>
                                    <!-- <a href="/resume.pdf" download
                                        class="py-2 hover:text-white  w-full flex gap-2 items-center group pl-[20px] hover:bg-grey-dark hover:pl-[24px]"><i
                                            class="bx bx-bulb text-xl"></i> <span>Download CV</span></a> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pl-3 text-grey-light flex gap-3 text-lg">
                        <a :href="linkedIn" target="_blank"><i class="fa-brands fa-linkedin "></i></a>
                        <a :href="github" target="_blank"><i class="fa-brands fa-github "></i></a>
                        <a :href="instagram" target="_blank"><i class="fa-brands fa-instagram "></i></a>
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