import Vue from 'vue'
import Router from 'vue-router'
import AdminPage from '@/components/AdminPage'
import Register from '@/components/Register'
import Login from '@/components/Login'
import DataUser from '@/components/DataUser'
import AddUser from '@/components/AddUser'
import EditUser from '@/components/EditUser'
import UserPage from '@/components/UserPage'

Vue.use(Router)

const router = new Router({
  routes: [
    {
      path: '/admin',
      name: 'AdminPage',
      component: AdminPage,
      meta: { requiresAuth: true }
    },
    {
      path: '/user',
      name: 'UserPage',
      component: UserPage,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/data-user',
      name: 'DataUser',
      component: DataUser,
      meta: { requiresAuth: true }
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/admin/add-user',
      name: 'AddUser',
      component: AddUser,
      meta: { requiresAuth: true }
    },
    {
      path: '/admin/edit-user/:id?',
      name: 'EditUser',
      component: EditUser
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    }

  ]
})

router.beforeEach((to, from, next) => {
  if(to.matched.some(record => record.meta.requiresAuth)){
    if(!localStorage.getItem('jwt')){
      next({
        path: '/login',
        query: { redirect: to.fullPath}
      });
    }else{
      next()
    }
  }else{
    next()
  }
})

export default router