import { createRouter, createWebHistory } from 'vue-router'

import Dashboard from '@/Pages/Dashboard/Index.vue'
import Blank from '@/Pages/Blank.vue'
import SettingsView from '@/Pages/SettingsView.vue'
import ProfileView from '@/Pages/Profile/Edit.vue'
import SigninView from '@/Pages/Authentication/SigninView.vue'
import SignupView from '@/Pages/Authentication/SignupView.vue'

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      title: 'Dashboard'
    }
  },
  {
    path: '/blank',
    name: 'blank',
    component: Blank,
    meta: {
      title: 'Blank Page'
    }
  },
  {
    path: '/settings',
    name: 'settings',
    component: SettingsView,
    meta: {
      title: 'Settings'
    }
  },
  {
    path: '/profile',
    name: 'profile.edit',
    component: ProfileView,
    meta: {
      title: 'Profile'
    }
  },
  {
    path: '/login',
    name: 'login',
    component: SigninView,
    meta: {
      title: 'Login'
    }
  },
  {
    path: '/register',
    name: 'register',
    component: SignupView,
    meta: {
      title: 'Register'
    }
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  // scrollBehavior(to, from, savedPosition) {
  //   return savedPosition || { left: 0, top: 0 }
  // }
})

router.beforeEach((to, from, next) => {
  document.title = import.meta.env.VITE_APP_NAME
  next()
})

export default router
