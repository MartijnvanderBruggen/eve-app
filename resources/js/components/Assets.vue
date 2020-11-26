<template>
 <div class="assets-component">
  {{ test }}
  <AssetsNavbar/>
  <AssetsTable/>
 </div>
</template>

<style>

</style>

<script>
import AssetsNavbar from './AssetsNavbar.vue'
import AssetsTable from './AssetsTable.vue'

export default {
  name: 'Assets',
  data : function() {
      return {
        test: 'test'
      }
  },
  components: {
    AssetsNavbar, AssetsTable
  }
}
</script>
