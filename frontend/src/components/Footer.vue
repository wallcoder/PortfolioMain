<script setup>
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import Button from '@/components/Button.vue'
import { Notivue, Notification, push } from 'notivue'
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;

const email = import.meta.env.VITE_EMAIL
const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH


const copy = async ()=>{
    try{
        await navigator.clipboard.writeText(email);
        push.success('Copied to clipboard');

    }catch(e){
        push.error('Cannot copy to clipboard')
        
    }
}
</script>
<template>
    <footer class="w-full flex flex-col gap-2 laptop:px-[15%]  tablet:px-[8%] px-[2%] py-[20px]  py-14">
        <h2 class="text-xl">Let's Connect</h2>
        <div class="text-[#aaaaaa]">Any questions, proposals, or collaborations? Feel free to reach out</div>
        <div class="flex items-center gap-1 " :class="isDark ? 'text-a-dm' : 'text-a-lm'"><i
                class="fa-regular fa-copy text-2xl cursor-pointer" @click="copy()"></i><a target="_blank" :href="`mailto:${email}`"
                class="cursor-pointer">{{ email }}</a></div>
        <div class="flex items-center text-[28px] gap-2">
            <a :href="linkedIn" target="_blank"><i class="fa-brands fa-linkedin "></i></a>
            <a :href="github" target="_blank"><i class="fa-brands fa-github "></i></a>
            <a :href="instagram" target="_blank"><i class="fa-brands fa-instagram "></i></a>
        </div>
        
        
    </footer>
</template>