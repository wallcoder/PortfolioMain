<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia'
import ButtonExt from '@/components/ButtonExt.vue'
import { ref, onMounted } from 'vue'
import Skills from '@/components/Skills.vue'
const { label } = storeToRefs(useAuthStore())
const linkedIn = import.meta.env.VITE_LI
const instagram = import.meta.env.VITE_IG
const github = import.meta.env.VITE_GH

onMounted(() => {
    label.value = {
        head: 'About me',


    }
})

</script>
<template >
    <section class=" flex flex-col gap-8  " id="works">
        <div class="md:px-[8%] px-[6%] flex flex-col gap-6 ">
            <p class="">
                My name is Biakropuia. I build full-stack web applications using Vue, Laravel, and Tailwind. You can find me
                on
                <a :href="github" target="_blank" class="text-acc">GitHub</a>, <a :href="linkedIn" target="_blank"
                    class="text-acc">LinkedIn</a>, and <a :href="instagram" target="_blank" class="text-acc">Instagram</a>.
                I’m
                always working on something new. These days, I’m focused on building <a href="#" target="_blank" class="text-acc">inlist</a>,
                a rental propertly listing website.
            </p>
            <p>
                My core passion lies in creating web applications that are fast, intuitive, and enjoyable to use. I
                specialize
                in full-stack development, crafting clean interfaces and efficient backends that developers and users both
                appreciate.
            </p>
            <div class=" flex gap-2">
                <ButtonExt content="Get in touch" link="mailto:biakropuia4@gmail.com" />
                <ButtonExt content="Download CV" link="/resume.pdf" />
                
            </div>
        </div>

        <Skills />





</section></template>