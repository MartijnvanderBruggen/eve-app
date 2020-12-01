<template>
 <div class="assets-component">
  <AssetsNavbar/>
  <AssetsTable :user="user" :eve_token="eve_token"/>
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
  props: ['user','eve_token'],

}
</script>
