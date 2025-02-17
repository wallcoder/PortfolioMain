<script setup>
import { RouterLink } from 'vue-router'
import { onMounted, onUnmounted, ref } from "vue";
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';
import Button from '@/components/Button.vue'
import Toast from '@/components/Toast.vue'
import Scrollbar from 'smooth-scrollbar';

const scrollContainer = ref(null);
let scrollbarInstance = null;
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;
// onMounted(() => {
//     scrollbarInstance = Scrollbar.init(scrollContainer.value, {
//         damping: 0.1, // Controls smoothness (0.05 - 0.3 recommended)
//         thumbMinSize: 20,
//         continuousScrolling: true,
//     });
// });

// onUnmounted(() => {
//     if (scrollbarInstance) {
//         scrollbarInstance.destroy();
//     }
// });
</script>

<template>
    <div class="min-w-[360px] max-w-[1920px] my-0 mx-auto bg-bg-lm dark:bg-bg-dm text-p-lm dark:text-p-dm">
        <RouterView />
        <Toast />
    </div>
</template>
