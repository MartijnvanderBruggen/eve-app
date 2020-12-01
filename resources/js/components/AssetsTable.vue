<template>
  <div class="assets-table">
    <vuetable ref="vuetable"
    :fields = "fieldsDef"
    :api-mode="false"
    :data ="eveData"></vuetable>
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
    data: {
      type: Object
    },
    eve_token: {
      type: String
    },
  },
  data: function () {
    return {
      eveData: {},
      fieldsDef: [
        {
          title: 'ID',
          name: 'item_id',
          sortField: 'item_id'
        },
        {
          title: 'Location',
          name: 'location_id',
          sortField: 'location_id'
        },
        {
          title: 'Quantity',
          name: 'quantity',
          sortField: 'quantity'
        }
      ]
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
          this.eveData = response.data
      })
    }
  }

}
</script>
