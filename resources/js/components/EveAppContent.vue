<template>
  <div class="container">
    <component :user="user" :token="token" v-bind:is="currentTab"></component>
    
  </div>
</template>

<style>
 .container {
   background-color:yellow;
   color: black;
 }
</style>

<script>
import Assets from './Assets.vue'
import Home from './Home.vue'

export default {
  components: {
    Assets, Home
  },
  name: 'EveAppContent',
  props: ['user','token'],
  data: function() {
    return {
      currentTab: 'Home'
    }
  },
  mounted() {
    this.$root.$on('loadComponentEvent', data => {
      console.log(data)
        this.currentTab = data
    });

  },
}
</script>
