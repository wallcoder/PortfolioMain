import { createRouter, createWebHistory } from 'vue-router'
import Layout from '../views/Layout.vue'
import Home from '@/views/Home.vue'
import Blog from '@/views/Blog.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'layout',
      component: Layout,
      children: [{
        path: '',
        name: 'home',
        component: Home
      },
    {
      path: '/blogs',
      name: 'blogs',
      component: Blog
    }]
    },

  ],
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return {
        el: to.hash,
        behavior: 'smooth', // Smooth scroll
      };
    }
    return savedPosition || { top: 0 };
  },
})

export default router
