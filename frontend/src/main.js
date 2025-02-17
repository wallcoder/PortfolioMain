import './assets/main.css'
import { MotionPlugin } from '@vueuse/motion'
import axios from 'axios'
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import Particles from 'vue3-particles';
import { createNotivue } from 'notivue'
import App from './App.vue'
import router from './router'
import 'notivue/notification.css' // Only needed if using built-in notifications
import 'notivue/animations.css' // Only needed if using built-in animations
const api = import.meta.env.VITE_API
const app = createApp(App)
const notivue = createNotivue({
  position: 'bottom',
  limit: 4,
  enqueue: true,
  avoidDuplicates: true,
  notifications: {
    global: {
      duration: 10000
    }
  }
})
axios.defaults.baseURL = api; // Laravel API URL
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.withCredentials = true; // For authentication (e.g., Sanctum)
app.use(MotionPlugin)
app.use(createPinia())
app.use(Particles)
app.use(notivue)
app.use(router)

app.mount('#app')
