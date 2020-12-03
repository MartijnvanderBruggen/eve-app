<template>
 <div class="assets-component">
  <AssetsNavbar/>
  <AssetsTable :user="user" :token="token"/>
 </div>
</template>

<style>

</style>

<script>
import AssetsNavbar from './AssetsNavbar.vue'
import AssetsTable from './AssetsTable.vue'

export default {
  components: {
    AssetsNavbar,
    AssetsTable
  },
  name:'Assets',
  props: ['user','token'],

}
</script>
