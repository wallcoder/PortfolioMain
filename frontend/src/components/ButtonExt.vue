<script setup>
import { RouterLink } from 'vue-router'
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useThemeStore } from '@/stores/theme';

const theme = useThemeStore()
const { isDark } = storeToRefs(theme)
const { toggleDark } = theme;

const props = defineProps({
    content: {
        type: String,
        required: true
    },

    extraStyle: {
        type: String,
        required: false
    },
    link: {
        type: String,
        required: false
    },

    iconStyle: {
        type: String,
        required: false

    }
})
</script>
<template>
    <a target="_blank" :href="link" class="cursor-pointer flex items-center gap-1  py-2 px-3 bg-acc '">
        <i :class="props.iconStyle" class="" v-if="props.iconStyle"></i> {{ props.content }}</a>
</template>

<style scoped>
.connect-btn-lm {
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}

.connect-btn-dm {
    border: 2px #81619E solid
}
</style>