<template>
  <div class="assets-table">
    <table><tr><td v-for="asset in assets">{{ asset }}</td></tr></table>
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
      type: Object,
  	},
    eve_token: {
      type: String
    }
  },

  data : function() {
      return {
        assets: '',
        filteredAssets: ''
      }
  },
  mounted() {
    this.$root.$on('loadDatatableEvent', data => {
        this.loadDatatable()
    });

  },
  methods: {
    loadDatatable: function() {
      axios.get('https://esi.evetech.net/latest/characters/'+this.user.eve_id+'/assets/',{
        headers: {
          'Authorization': 'Bearer '+this.eve_token
        }
      }).then(response => {
          this.assets = response.data
      })
    }
  }

}
</script>
