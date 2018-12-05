<template>
    <div class="box">
        <div class="shop">
                <div class="shops" v-for="(item,index) in shop" :key="item.id">
                    <img  class="shop-img" :src="item.src" alt="">
                    <p class="price"><span class="price-icon">￥</span>{{item.price}}</p>
                    <div class="name"><span>自营</span>{{item.name}}</div>
                    <div class="shopping-cart">
                        <div class="number">
                            <div class="numbers" ref="number">1</div>
                            <div class="iconfont add-icon" @click="add(item,index)">+</div>
                            <div class="iconfont red-icon" @click="red(item,index)">-</div>
                        </div>
                        <!--<input type="hidden" name="src" :value="item.src">-->
                        <!--<input type="hidden" name="price" :value="item.price">-->
                        <!--<input type="hidden" name="name" :value="item.name">-->
                        <!--<input type="hidden" name="shopid" :value="item.coding">-->
                        <!--<input type="hidden" name="number" :value="1" ref="subnum">-->
                        <!--<input type="hidden" name="user" :value=null ref="user">-->
                        <input type="button"
                               class="cart"
                               value="加入购物车"
                               @click="sub(item,index)"
                        >
                    </div>
                    <div class="proprice">
                        <div class="comments">
                            <span class="iconfont comments-icon">&#xeee9;</span><span class="comments-text">11万+</span>
                            <span class="iconfont like-icon">&#xe677;</span><span class="npc">99%</span>
                        </div>
                    </div>
                    <span class="store-name">一家店铺名</span>
                </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import qs from 'qs'
export default {
    name: 'shop',
    props:{
        shop: Array
    },
    methods:{
        add(item,index){
            this.$refs.number[index].innerText = ++item.number
        },
        red(item,index){
            if(item.number <=1){
                item.number = 1
            }else {
                --item.number
            }
            this.$refs.number[index].innerText = item.number
        },
        sub(item,index){
            if(this.$store.state.user === undefined){
                alert('请登录')
            }else {
                let data = qs.stringify({
                    name: item.name,
                    price: item.price,
                    number: this.$refs.number[index].innerText,
                    src: item.src,
                    user: this.$store.state.user
                })
                axios(
                    {
                        url:'../../../../../../incart.php',
                        method:"post",
                        data:{
                            name:item.name,
                            price:item.price,
                            src:item.src,
                            number:this.$refs.number[index].innerText,
                            user:this.$store.state.user,
                            shopid: item.coding
                        },
                        //将JSON对象 转 键=值&键=值
                        /*
                        {
                          name:"david",
                          age:30
                        }
                        name=小李&age=30
                        // 在发送数据之前 将对象转键值对
                        */
                        transformRequest: [function (data) {
                            // Do whatever you want to transform the data
                            let ret = ''
                            for (let it in data) {
                                // 如果要发送中文 编码
                                ret += encodeURIComponent(it) + '=' + encodeURIComponent(data[it]) + '&'
                            }
                            return ret
                        }],
                        headers: {
                            'Content-Type':'application/x-www-form-urlencoded'
                        }
                    });
            }

        }
    }
}
</script>

<style lang="stylus" scoped>
    .box
        width: 100%
        .shop
            width: 10.7rem
            margin: 0 auto
            display: flex
            flex-wrap: wrap
            .shops
                width: 2rem
                height: 3.8rem
                margin-bottom: 0.5rem
                margin-right: 14px
                padding: 0 0.1rem
                padding-top: 0.3rem
                box-sizing border-box
                border: 1px solid transparent
                &:hover
                    border: 1px solid #eaeaea
                    box-shadow: rgba(234, 234, 234, 0.49) 0px 0px 5px 2px
                .shop-img
                    width: 100%
                .price
                    color: red
                    font-size: 16px
                    .price-icon
                        font-size: 14px
                .name
                    width: 98%
                    height: 0.36rem
                    margin-top: 0.08rem
                    overflow: hidden
                    text-overflow: ellipsis
                    font-size: 11px
                    line-height: 18px
                    letter-spacing: 1px
                .name span
                    color: red
                    border: 1px solid red
                    padding: 1px
                    margin-right: 10px
                    letter-spacing: 0px
                .shopping-cart
                    width: 100%
                    display: flex
                    align-items  center
                    margin-top: 0.08rem
                    .number
                        width: 0.55rem
                        height: 0.35rem
                        position: relative
                        .numbers
                            width: 0.3rem
                            height: 100%
                            font-size: 14px
                            border: 1px solid #aaa
                            display: flex
                            justify-content: center
                            align-items: center
                            position: absolute
                            top: 0
                            left: 0
                        .add-icon
                        .red-icon
                            width: 0.16rem
                            height: 0.14rem
                            font-size: 11px
                            border: 1px solid #aaa
                            cursor: pointer
                            position: absolute
                            display: flex
                            justify-content: center
                            align-items: center
                        .add-icon
                            top: 0
                            right: 0
                        .red-icon
                            bottom: 0
                            right: 0
                    .cart
                        width: 0.9rem
                        height: 0.3rem
                        color: #fff
                        background: #ff5c4d
                        border-radius: 3px
                        text-align: center
                        margin-left: 0.15rem
                        cursor: pointer
                        &:hover
                            background: red
                .proprice
                    margin-top: 0.1rem
                    margin-bottom: 0.05rem
                    .comments-text
                        font-size: 14px
                    .like-icon
                        color: red
                        margin-left: 0.1rem
                    .npc
                        color: red
                        margin-left: 0.03rem
                .store-name
                    color: #666666
</style>
