import EveAppContent from './components/EveAppContent.vue'
import Assets from './components/Assets.vue'

export default {
  mode: 'history',
  routes: [
    {
      path: '/',
      component: EveAppContent
    },
    {
      path:'/assets',
      component: Assets
    }
  ]

}
