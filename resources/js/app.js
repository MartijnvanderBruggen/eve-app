require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import routes from './routes.js'
import EveAppDashboard from './components/EveAppDashboard.vue'

new Vue({
  el: "#app",
  components: {EveAppDashboard},
  router: new VueRouter(routes)
})
