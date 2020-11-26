<template>
  <div class="assets-table">
    <table><tr><td>{{ user.eve_id }}</td><td>{{ user.name }}</td></tr></table>
  </div>
</template>

<style>

</style>

<script>
import Vuetable from 'vuetable-2'

export default {
  components: { Vuetable },
  name: 'AssetsTable',
  props: {
  	user: {
      type: String,
  	},
  },

  data : function() {
      return {
        assets: '',
      }
  },
  mounted() {

    axios.get('https://esi.evetech.net/latest/characters/'+user.eve_id+'/assets/',{
      headers: {
        'Authorization': 'Bearer '+user.password
      }
    }).then(response => (this.assets = response))
  }

}
</script>
