require('./bootstrap');
Vue = require('vue')
Vue.component('assets',{
  data: function () {
    return {
      count: 0
    }
  },
  template:'<div class="assets-component"><assets-navbar></assets-navbar><assets-table></assets-table></div>',  
})

Vue.component('assets-table', {
  data: function () {
    return {
      count: 0
    }
  },
  template:'<div class="assets-table"><h1>hi im assets table</h1></div>',
})
Vue.component('assets-navbar', {
  data: function () {
    return {
      count: 0
    }
  },
  template:'<div class="assets-navbar"><button class="button">Load Assets</button></div>',
})

new Vue({
  el: "#app"
})
