<template>
    <div class="home">
      <home-header></home-header>
      <home-search></home-search>
      <public-nav></public-nav>
      <home-swiper></home-swiper>
      <home-super :supers="supers"></home-super>
      <home-scenario :scenario="scenario"></home-scenario>
    </div>
</template>

<script>
    import axios from 'axios'
  import HomeHeader from '../../public/Header.vue'
  import HomeSearch from './component/search.vue'
  import PublicNav from '@/public/nav'
  import HomeSwiper from './component/swiper.vue'
  import HomeSuper from './component/super.vue'
  import HomeScenario from './component/scenario'


export default {
    name: 'home',
    data(){
      return{
          supers: [],
          scenario: []
      }
    },
    components:{
      HomeHeader,
      HomeSearch,
      PublicNav,
      HomeSwiper,
      HomeSuper,
      HomeScenario,

    },
    methods:{
        InfoSuper(){
            axios.get('static/mock/super.json').then(this.InfoSuperGet)
        },
        InfoSuperGet(res){
            res = res.data
            if(res.ref && res.data){
                const data = res.data
                this.supers = data.content
            }
        },
        InfoScenario(){
            axios.get('static/mock/scenario.json').then(this.InfoScenarioGet)
        },
        InfoScenarioGet(res){
            res = res.data
            if(res.ref && res.data){
                const data = res.data
                this.scenario = data.scenario
            }
        },
    },
    mounted(){
        this.InfoSuper()
        this.InfoScenario()
    }

}
</script>

<style lang="stylus" scoped>
</style>
