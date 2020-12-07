require('./bootstrap');

import Vue from 'vue'

import EveAppDashboard from './components/EveAppDashboard.vue'

new Vue({
  el: "#app",
  components: {EveAppDashboard}
})
