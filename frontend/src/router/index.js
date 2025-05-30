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
      children: [{
        path: '',
        name: 'home',
        component: Home
      },
      {
        path: '/projects',
        name: 'projects',
        component: Projects
      },
      {
        path: '/about',
        name: 'about',
        component: About
      },
      {
        path: '/blogs',
        name: 'blogs',
        component: Blog
      },
      {
        path: '/blog/:slug',
        name: 'blog-page',
        props: true,
        component: BlogPage
      },
      {
        path: '/project/:slug',
        name: 'project-page',
        props: true,
        component: ProjectPage
      },

      ]
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminLayout,
      meta: { requiresAuth: true },

      children: [
        {
          path: '',
          name: 'dashboard',
          component: Dashboard
        },
        {
          path: 'blogs',
          name: 'admin-blogs',
          component: AdminBlogs
        },
        {
          path: 'blog/create',
          name: 'create-blog',
          component: AdminCreateBlog
        },
        {
          path: 'blog/:id/edit',
          name: 'edit-blog',
          component: AdminEditBlog,
          props: true
        }
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {
        requiresLogout: true
      }

    },
    {
      path: '/maintenance',
      name: 'maintenance',
      component: SiteMaintain,
      meta: { requiresCheck: true }

    },
    { path: "/404", component: NotFound},
    { path: "/500", component: ServerError},
    
    { path: "/:pathMatch(.*)*", component: NotFound }, // Catch-all 404 route


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

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token');
  const site = useAuthStore();

 
  if (site.siteMaintain && to.path !== '/maintenance') {
    return next('/maintenance');
  }


  if (to.meta.requiresAuth && !token) {
    return next('/login');
  }

  else if (to.meta.requiresLogout && token){
    return next('/admin')
  }

  

  if (!site.siteMaintain && to.path == '/maintenance') {
    return next('/')
  }

  next();
});



export default router
