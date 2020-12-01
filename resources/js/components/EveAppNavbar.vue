<template>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <router-link to="home" class="navbar-item">
          Home
        </router-link>
        <router-link to="assets" class="navbar-item">
          Assets
        </router-link>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a href="https://login.eveonline.com/v2/oauth/authorize/?response_type=code&redirect_uri=https://eve-app.test/callback&client_id=b72d20af7ccd4b11a7d04b9d73b36bb5&scope=esi-assets.read_assets.v1&state=0"><img :src="image"></a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<style>
 .container {
   background-color:orange;
   color: black;
 }
</style>

<script>
export default {
  components: {

  },
  name: 'eve-app-navbar',
  props:['image'],
  data: function() {
    return {

    }
  }
}
</script>
