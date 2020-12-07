<template>
  <div class="assets-navbar">
    <button class="button" @click="loadDatatable">Load Assets</button>
  </div>
</template>

<style>

</style>

<script>
export default {
  name: 'AssetsNavbar',
  methods: {
    loadDatatable : function() {
      this.$root.$emit('loadDatatableEvent')
    }
  }

}
</script>
