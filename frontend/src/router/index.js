import { createRouter, createWebHistory } from 'vue-router'
import Layout from '../views/Layout.vue'
import Home from '@/views/Home.vue'
import Blog from '@/views/Blog.vue'
import BlogPage from '@/views/BlogPage.vue'
import AdminLayout from '@/views/AdminLayout.vue'
import Dashboard from '@/views/Dashboard.vue'
import AdminBlogs from '@/views/AdminBlogs.vue'
import AdminCreateBlog from '@/views/AdminCreateBlog.vue'
import AdminEditBlog from '@/views/AdminBlogEdit.vue'
import Login from '@/views/Login.vue'
import NotFound from '@/views/NotFound.vue'

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
      },
      {
        path: '/blog/:slug',
        name: 'blog-page',
        props: true,
        component: BlogPage
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

    },
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

  if (to.meta.requiresAuth && !token) {
    next('/login');
  } else {
    next();
  }
});


export default router
