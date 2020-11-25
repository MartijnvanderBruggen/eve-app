require('./bootstrap');

Vue.component('getAssets',{
  template: '<button type="button" class="success button" v-model="value">{{ value }}</button>',
  data() {
    return {
      value: "testing 123"
    }
  }
})
new Vue({
  el: "#app"
})
