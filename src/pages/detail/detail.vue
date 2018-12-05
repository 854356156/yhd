<template>
    <div class="detail">
        <home-header></home-header>
        <home-search></home-search>
        <public-nav></public-nav>
        <detail-path :pathss="pathss"></detail-path>
        <detail-screening></detail-screening>
        <detail-shop :shop="shop"></detail-shop>
    </div>
</template>

<script>
import axios from 'axios'
import HomeHeader from '@/public/Header.vue'
import HomeSearch from '@/pages/home/component/search.vue'
import PublicNav from '@/public/nav.vue'
import DetailPath from './component/paths'
import DetailScreening from './component/screening'
import DetailShop from './component/shop'
export default {
    name: 'detail',
    data(){
        return{
            shop: [],
            pathss: ''
        }
    },
    components:{
        HomeHeader,
        HomeSearch,
        PublicNav,
        DetailPath,
        DetailScreening,
        DetailShop
    },
    methods:{
       InfoShop(){
           axios.get("../../../../../../shop.php?id=",{
               params:{
                   id: this.$route.params.id
               }
           }).then(this.InfoShopGet)
       },
        InfoShopGet(res){
            res.data.forEach((item,index)=>{
                if(item.coding === this.$route.params.id){
                    this.pathss = item.name
                }
                const data = item.coding.slice(0,3)
                if(data === this.$route.params.id){
                    if(item.src.length >0){
                        this.shop.push(item)
                    }

                }
            })

        }
    },
    mounted(){
        this.InfoShop()
    }
}
</script>

<style lang="stylus" scoped>
</style>
