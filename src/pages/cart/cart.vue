<template>
    <div class="cart">
        <public-header :home="home"></public-header>
        <cart-search></cart-search>
        <cart-shop :login="login" :cartshop="cartshop"></cart-shop>

    </div>
</template>

<script>
import axios from 'axios'
import PublicHeader from '@/public/Header.vue'
import CartSearch from './component/search'
import CartShop from './component/shop'
export default {
    name: 'cart',
    data(){
      return{
          home: false,
          login: false,
          cartshop: []
      }
    },
    components:{
        PublicHeader,
        CartSearch,
        CartShop
    },
    methods:{
        islogin(){
            if(this.$store.state.user === undefined){
                this.login = false
            }else {
                this.login = true
            }
        },
        CartShopInfo(){
            axios.get('../../../../../../cartshop.php').then(this.CartShopGet)
        },
        CartShopGet(res){
            res.data.forEach((item,index)=>{
                if(item.user === this.$store.state.user){
                    this.cartshop = res.data
                }
            })
        }
    },
    mounted(){
        this.islogin()
        this.CartShopInfo()
    }
}
</script>

<style lang="stylus" scoped>
    .cart
        width: 100%
        height: 100%
        background: #f8f8f8
        .abc
            width: 100%
            height: 10rem
</style>
