import { createRouter, createWebHistory } from 'vue-router'
import Layout from '../views/Layout.vue'
import Home from '@/views/Home.vue'
import Blog from '@/views/Blog.vue'
import BlogPage from '@/views/BlogPage.vue'
import ProjectPage from '@/views/ProjectPage.vue'
import AdminLayout from '@/views/AdminLayout.vue'
import Dashboard from '@/views/Dashboard.vue'
import AdminBlogs from '@/views/AdminBlogs.vue'
import AdminCreateBlog from '@/views/AdminCreateBlog.vue'
import AdminEditBlog from '@/views/AdminBlogEdit.vue'
import Login from '@/views/Login.vue'
import NotFound from '@/views/NotFound.vue'
import ServerError from '@/views/ServerError.vue'
import SiteMaintain from '@/views/SiteMaintain.vue'
import Projects from '@/views/Projects.vue'
import About from '@/views/About.vue'
import { useAuthStore } from '@/stores/auth'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'layout',
      component: Layout,
      children: [
        {
          path: '',
          name: 'home',
          component: Home,
          meta: { title: 'Home - biakadev' }
        },
        {
          path: '/projects',
          name: 'projects',
          component: Projects,
          meta: { title: 'Projects - biakadev' }
        },
        {
          path: '/about',
          name: 'about',
          component: About,
          meta: { title: 'About - biakadev' }
        },
        {
          path: '/blogs',
          name: 'blogs',
          component: Blog,
          meta: { title: 'Blogs - biakadev' }
        },
        {
          path: '/blog/:slug',
          name: 'blog-page',
          props: true,
          component: BlogPage,
          meta: { title: 'Blog - biakadev' }
        },
        {
          path: '/project/:slug',
          name: 'project-page',
          props: true,
          component: ProjectPage,
          meta: { title: 'Project - biakadev' }
        }
      ]
    },
    {
      path: '/maintenance',
      name: 'maintenance',
      component: SiteMaintain,
      meta: {
        requiresCheck: true,
        title: 'Site Maintenance - biakadev'
      }
    },
    {
      path: '/404',
      component: NotFound,
      meta: { title: 'Page Not Found - biakadev' }
    },
    {
      path: '/500',
      component: ServerError,
      meta: { title: 'Server Error - biakadev' }
    },
    {
      path: '/:pathMatch(.*)*',
      component: NotFound,
      meta: { title: 'Page Not Found - biakadev' }
    }
  ],
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return {
        el: to.hash,
        behavior: 'smooth'
      }
    }
    return savedPosition || { top: 0 }
  }
})

// Guard for login/maintenance logic
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')
  const site = useAuthStore()

  if (site.siteMaintain && to.path !== '/maintenance') {
    return next('/maintenance')
  }

  if (to.meta.requiresAuth && !token) {
    return next('/login')
  }

  if (to.meta.requiresLogout && token) {
    return next('/admin')
  }

  if (!site.siteMaintain && to.path === '/maintenance') {
    return next('/')
  }

  next()
})

// Set document title globally
router.afterEach((to) => {
  const defaultTitle = 'biakadev'
  document.title = to.meta.title || defaultTitle
})

export default router
