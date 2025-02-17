<script setup>
import {ref} from 'vue'
import {storeToRefs} from 'pinia'
import { useThemeStore } from '@/stores/theme';
const theme = useThemeStore()
const { isDark } = storeToRefs(theme)

import { Notivue, Notification, push, lightTheme, // Applied by default
  pastelTheme,
  materialTheme,
  darkTheme,
  slateTheme } from 'notivue'
</script>
<template>
    <Notivue v-slot="item">
        <Notification :item="item" :theme="materialTheme" />
    </Notivue>
</template>