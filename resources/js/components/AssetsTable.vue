<template>
  <div class="assets-table">
    <vuetable ref="vuetable"
    :fields = "fieldsDef"
    :api-mode="false"
    :data="eveData"></vuetable>
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
    data: {
      type: Object
    },
    token: {
      type: String
    }
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
          title: 'Name',
          name: 'item_name',
          sortField: 'item_name'
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
      let user = JSON.parse(this.user);
      let assetIds = [];
      axios.get('https://esi.evetech.net/latest/characters/'+user.eve_id+'/assets/',{
        headers: {
          'Authorization': 'Bearer '+this.token
        }
      }).then(response => {
          this.eveData = response.data
          //put all typeIds into an array
          this.eveData.forEach( asset => {
            assetIds.push(asset.type_id)
          })
          //send typeId array to AssetController->getAssetNames()
          axios.post('eveAssetNames/', {'ids':JSON.stringify(assetIds)} )
          .then( response => {
            //todo: add typenames to datatable
            console.log(response.data)
          })
          //console.log(assetIds)
      })


    }
  }

}
</script>
