<template>
  <div id="container">
    <eve-app-navbar :image="image" class="navbar"></eve-app-navbar>
    <div class="columns">
      <div class="column is-one-quarter">
        <eve-app-sidebar class="sidebar"></eve-app-sidebar>
      </div>
      <div class="column is-three-quarters">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<style>
 .container {
   background-color:black;
   color: orange;
 }
</style>

<script>
import EveAppNavbar from './EveAppNavbar.vue'
import EveAppSidebar from './EveAppSidebar.vue'
import EveAppContent from './EveAppContent.vue'

export default {
  components: {
    EveAppNavbar,EveAppContent,EveAppSidebar
  },
  name: 'Dashboard',
  props: ['user','eve_token','image'],
  data: function() {
    return {

    }
  }
}
</script>
