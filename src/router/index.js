import Vue from 'vue'
import Router from 'vue-router'
import Home from '../pages/home/home.vue'
import Login from '../pages/login/login.vue'
import Regist from '../pages/regist/regist.vue'
import Detail from '../pages/detail/detail.vue'
import Cart from '../pages/cart/cart.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    }, {
          path: '/login',
          name: 'Login',
          component: Login
    }, {
        path: '/regist',
        name: 'Regist',
        component: Regist
    }, {
          path: '/detail/:id',
          name: 'Detail',
          component: Detail
    }, {
          path: '/cart',
          name: 'Cart',
          component: Cart
    }
  ]
})
