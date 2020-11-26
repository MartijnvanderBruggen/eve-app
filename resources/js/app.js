require('./bootstrap');
let Vue;
Vue = require('vue');
import Assets from './components/Assets';
import AssetsNavbar from './components/AssetsNavbar.vue';
import AssetsTable from './components/AssetsTable.vue';

new Vue({
  el: "#app",
  components: { Assets, AssetsTable, AssetsNavbar }
})
