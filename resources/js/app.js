require('./bootstrap');
let Vue;
Vue = require('vue');
import Assets from './components/Assets';

new Vue({
  el: "#app",
  components: { Assets }
})
