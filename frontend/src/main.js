import './assets/main.css'
import { MotionPlugin } from '@vueuse/motion'
import axios from 'axios'
import 'boxicons'
import 'boxicons/css/boxicons.min.css';
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import Particles from 'vue3-particles';
import { createNotivue } from 'notivue'
import App from './App.vue'
import router from './router'
import { useRouter } from 'vue-router';
import {push} from 'notivue';
import 'notivue/notification.css' // Only needed if using built-in notifications
import 'notivue/animations.css' // Only needed if using built-in animations
const api = import.meta.env.VITE_API
const app = createApp(App)
const route = useRouter()
const notivue = createNotivue({
  position: 'bottom',
  limit: 4,
  enqueue: true,
  avoidDuplicates: true,
  notifications: {
    global: {
      duration: 5000
    }
  }
})

window.addEventListener('storage', (event) => {
  if (event.key === 'token') {
    if (!event.newValue) {
      // 🔹 Token was removed (user logged out in another tab)
      window.location.href = '/login';
    } else if (event.oldValue && event.newValue !== event.oldValue) {
      // 🔹 Token changed (user logged in on another tab)
      window.location.href = '/login';
    }
  }
});

axios.defaults.baseURL = api; // Laravel API URL
axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Content-Type"] = "application/json";
axios.defaults.withCredentials = true; // For authentication (e.g., Sanctum)



app.use(MotionPlugin)
app.use(createPinia())
app.use(Particles)
app.use(notivue)
app.use(router)

axios.interceptors.response.use(
  response => response,
  error => {
    const status = error.response?.status

    if (status === 400) {
      push.error('Bad Request: Please check your input.')
    } else if (status === 401) {
      push.error('Unauthorized')
      router.push('/login')  // Use the imported router instance here
    } else if (status === 403) {
      push.error('Forbidden: You do not have access.')
      router.push('/403')
    } else if (status === 404) {
      
      router.push('/404')
    } else if (status === 500) {
      router.push('/500')
    } else {
      push.error('An unexpected error occurred.')
    }

    return Promise.reject(error)
  }
)


app.mount('#app')
