<template>
    <div class="shop">
        <div class="box" v-if="login === true">
            <div class="title">
                <span class="titles"><span class="check" ref="seles" @click="sele($event)"></span>全选</span>
                <span class="titles">商品信息</span>
                <span class="titles">单价(元)</span>
                <span class="titles">数量</span>
                <span class="titles">小计(元)</span>
                <span class="titles">操作</span>
            </div>
            <div class="content" >
                <div class="shop" v-for="(item,index) in cartshop" :key="item.id" >
                    <span class="check spacing" @click="seles($event)" ref="sele"></span>
                    <div class="shopinfo spacing">
                        <img :src="item.img"
                             alt=""
                             class="shopimg">
                        <span class="name">{{item.name}}</span>
                    </div>
                    <span class="price spacing">{{item.price}}</span>
                    <div class="number spacing">
                        <span class="red" @click="red($event,item,index)">-</span>
                        <input type="text"
                               class="num-input"
                               :value="item.number"
                               oninput = "value=value.replace(/[^\d]/g,'')"
                               @input="num($event,item,index)"
                               ref="number"

                        >
                        <span class="add" @click="add($event,item,index)">+</span>
                        <!--<form action="../../../../../../incart.php" method="post">-->
                            <!--<input type="hidden" :value="item.shopid" name="delid">-->
                            <!--<input type="hidden" :value="item.user" name="deluser">-->
                            <!--<input type="submit" value="+" >-->
                        <!--</form>-->
                    </div>
                    <span class="total spacing" ref="total">{{item.price,item.number | total(item.price,item.number)}}</span>
                    <span class="iconfont del-icon" @click="del(item,index)">
                        &#xe616;
                    </span>

                </div>
            </div>
            <div class="settlement" ref="jiesuan">
                <div class="box zhidi"
                     ref="box"
                >
                    <div class="samllbox">
                        <div class="seleted">
                            <span class="check" @click="bsele($event)" ref="bsele"></span>
                            <span class="all">全选 (共<span class="all-number">{{totalshop}}</span>件)</span>
                        </div>
                        <div class="jiesuan">
                            <span class="isseleted">已选商品<span class="sele-num"> {{selshop}} </span>件</span>
                            <span>|</span>
                            <span class="total">
                        合计 :
                        <span class="curr">￥</span><span class="price">{{total}}</span>
                    </span>
                            <span class="btn" :class="{isbtn: isbtn}">去结算</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login" v-else="">
            <img src="//img.yihaodianimg.com/cart/shopping/pc/images/offline.gif"
                 alt=""
            >
            <div class="info">
                <p>购物车还是空的呢，快去采购吧~
                    或者登录查看之前加入的商品。</p>
                <div class="btn">
                    <router-link tag="div"
                                 to="/login"
                                 class="logins"
                    >登录</router-link>
                    <router-link tag="div"
                                 to="/"
                                 class="home"
                    >去逛逛</router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'shop',
    data(){
      return{
          totalshop: 0 ,
          selshop: 0,
          total: 0,
          isbtn: false
      }
    },
    props:{
      login: Boolean,
      cartshop: Array
    },
    methods:{
        //输入框数量
        num(e,item,index){
            let num = parseInt(e.target.value)
            if(num>200){
                e.target.value = 200
            }
            axios(
                {
                    url:'../../../../../../incart.php',
                    method:"post",
                    data:{
                        cartshopnumber:e.target.value,
                        cartshopuser:this.$store.state.user,
                        cartshopid: item.shopid
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
                })
        },
        //增加
        add(e,item,index){
            let price = parseFloat(item.price)
            this.$refs.number[index].value = ++item.number
            axios(
                {
                    url:'../../../../../../incart.php',
                    method:"post",
                    data:{
                        cartshopnumber:this.$refs.number[index].value,
                        cartshopuser:this.$store.state.user,
                        cartshopid: item.shopid
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
                })

            this.total = (parseFloat(this.total) + price).toFixed(2)
        },
        //减少
        red(e,item,index){
            let price = parseFloat(item.price)
            this.$refs.number[index].value = --item.number

            axios(
                {
                    url:'../../../../../../incart.php',
                    method:"post",
                    data:{
                        cartshopnumber:this.$refs.number[index].value,
                        cartshopuser:this.$store.state.user,
                        cartshopid: item.shopid
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
                })

            this.total = (parseFloat(this.total) - price).toFixed(2)
        },
        //删除
        del(item,index){
            axios(
                {
                    url:'../../../../../../incart.php',
                    method:"post",
                    data:{
                        deluser:this.$store.state.user,
                        delid: item.shopid
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
                })
            this.cartshop.splice(index,1)

            let num = item.number * item.price
            this.total = (this.total - num).toFixed(2)

            this.selshop --
        },
        //全选
        sele(e){
            let isclass = e.target
            //选中全选框
            if(isclass.className.indexOf('ischeck') === -1){
                isclass.classList.add('ischeck')
                this.$refs.bsele.classList.add('ischeck')
            }else {
                isclass.classList.remove('ischeck')
                this.$refs.bsele.classList.remove('ischeck')
            }
            //判断商品选择框有没被选中
            this.$refs.sele.forEach((item,index)=>{
                //判断全选框的选中状态
                if(isclass.className.indexOf('ischeck') === -1){
                    //取消偶有选中商品
                    item.classList.remove('ischeck')
                }else {
                    //选中所有商品
                    if(item.className.indexOf('ischeck') === -1){
                        item.classList.add('ischeck')
                    }
                }
            })
            this.selshops()
            this.totalprice()
        },
        bsele(e){
            let isclass = e.target
            if(isclass.className.indexOf('ischeck') === -1){
                isclass.classList.add('ischeck')
            }else {
                isclass.classList.remove('ischeck')
            }
            this.$refs.seles.click()
        },
        //单选
        seles(e){
            let isclass = e.target
            if(isclass.className.indexOf('ischeck') === -1){
                isclass.classList.add('ischeck')
            }else {
                isclass.classList.remove('ischeck')
            }
            this.selshops()
            this.totalprice()
        },
        //结算框是否置底
        handleScroll(){
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            let jiesuandiv = this.$refs.jiesuan.offsetTop
            let divheight = document.documentElement.offsetHeight
            if(scrollTop+divheight < jiesuandiv){
                //结算置底
                this.$refs.box.classList.add('zhidi')
            }else {
                this.$refs.box.classList.remove('zhidi')
            }
        },
        //结算框显示总商品数
        totalshops(){
            this.totalshop = this.cartshop.length
        },
        //结算框选中了多少件商品
        selshops(){
            let num = 0
            this.$refs.sele.forEach((item,index)=>{
                if(item.className.indexOf('ischeck') != -1){
                    num++
                }
            })
            this.selshop = num
        },
        //结算框总金额
        totalprice(){
            let num = 0
            this.$refs.sele.forEach((item,index)=>{
                if(item.className.indexOf('ischeck') != -1){
                    num += parseFloat(item.parentNode.children[4].innerText)
                }
            })
            this.total = num.toFixed(2)
        }

    },
    mounted(){
        window.addEventListener('scroll', this.handleScroll)

    },
    beforeUpdate(){
        this.totalshops()
    },
    computed:{
      abc(){
          return this.selshop
      }
    },
    watch:{
        abc(a){
            if(a>0){
                this.isbtn = true
            }else {
                this.isbtn = false
            }
        }
    },
    filters:{
        total(a,b){
            return (a*b).toFixed(2)
        }
    },
    destroyed(){
        window.removeEventListener('scroll', this.handleScroll)
    }

}
</script>

<style lang="stylus" scoped>
    .shop
        width: 100%
        background: #f8f8f8
        padding-bottom: 0.3rem
        .box
            .title
                width: 10.7rem
                margin: 0 auto
                height:0.4rem
                background: #FFFFFF
                border: 1px solid #dfdfdf
                border-radius: 5px
                display: flex
                justify-content: space-between
                align-items: center
            .titles
                width: 10.7rem
                margin: 0 auto
                color: #666
                display: flex
                align-items: center
                &:first-child
                    margin-left: 0.45rem
                &:last-child
                    margin-right: 0.45rem
                .check
                    width: 15px
                    height:15px
                    border: 1px solid #bfbfbf
                    border-radius: 5px
                    margin-right: 0.1rem
                    margin-top: -2px
                    cursor: pointer
                .ischeck
                    background: #ff5e5e
                    border: 1px solid transparent
            .content
                width: 10.7rem
                margin: 0 auto
                background: #fff
                border: 1px solid #bfbfbf
                border-radius: 5px
                margin-top: 0.2rem
                margin-bottom: 0.5rem
                display: flex
                flex-direction: column
                align-items: center
                .shop
                    width: 95%
                    height: 1.15rem
                    background: #fff
                    margin: 0.1rem 0
                    border-bottom: 1px dashed #aaa
                    display: flex
                    justify-content: space-between
                    align-items: center
                    .check
                        width: 15px
                        height:15px
                        border: 1px solid #bfbfbf
                        border-radius: 5px
                        margin-left: 0.19rem
                        cursor: pointer
                    .ischeck
                        background: #ff5e5e
                        border: 1px solid transparent
                    .shopinfo
                        width: 3rem
                        height: 100%
                        display: flex
                        justify-content: space-between
                        align-items: center
                        .shopimg
                            width: 0.75rem
                        .name
                            margin-left: 30px
                            line-height: 17px
                            cursor: pointer
                            &:hover
                                color: #ff5e5e
                    .number
                        width: 0.8rem
                        height: 0.25rem
                        border: 1px solid #dfdfdf
                        display: flex
                        jusitify-content: center
                        align-items: center
                        .red
                        .add
                            width: 0.2rem
                            height: 0.18rem
                            font-size: 15px
                            cursor: pointer
                            display: flex
                            justify-content: center
                            align-items: center
                        .red
                            border-right: 1px solid #dfdfdf
                        .add
                            border-left: 1px solid #dfdfdf
                        .num-input
                            width: 0.4rem
                            height: 0.18rem
                            text-align center
                    .total
                        width: 0.4rem
                        font-weight bold
                        display: inline-block
                        text-align: center
                    .del-icon
                        font-size: 20px
                        margin-right: 20px
                        color: #aaa
                        cursor: pointer
                        &:hover
                            color: #ff5e5e
            .settlement
                width: 100%
                height: 0.6rem
                .zhidi
                    position fixed
                    bottom: 0
                    box-shadow :5px 5px 30px gray
                .box
                    width: 100%
                    height: 0.6rem
                    background: #fcfcfc
                .samllbox
                    width: 10.7rem
                    height: 100%
                    box-sizing: border-box
                    margin: 0 auto
                    padding: 0 0.45rem
                    display: flex
                    justify-content: space-between
                    align-items: center
                    .seleted
                        display: flex
                        justify-content: space-between
                        align-items: center
                        .ischeck
                            background: #ff5e5e
                            border: 1px solid transparent
                        .check
                            width: 15px
                            height:15px
                            border: 1px solid #bfbfbf
                            border-radius: 5px
                            cursor: pointer
                        .all
                            width: 1.2rem
                            margin: 0 0.1rem
                            letter-spacing: 2px
                            .all-number
                                color: red
                        .del
                            color: #999
                            margin-left: 0.25rem
                            cursor: pointer
                    .jiesuan
                        display: flex
                        align-items: center
                        .isseleted
                            letter-spacing: 1px
                            width: 1rem
                            height: 0.6rem
                            display: flex
                            align-items: center
                            .sele-num
                                color: red
                        .total
                            width: 1.2rem
                            height: 0.6rem
                            margin-left: 0.2rem
                            display: flex
                            align-items: center
                            .curr
                                font-size: 13px
                                color: red
                            .price
                                font-size: 18px
                                color: red
                                font-weight: bold
                                margin-top: -2px
                    .btn
                        height: 0.6rem
                        font-size: 18px
                        background: #cccccc
                        color: #fff
                        padding: 0 0.3rem
                        cursor: pointer
                        display: flex
                        justift-content: center
                        align-items: center
                    .isbtn
                        background: #ff6c6c
                        &:hover
                            background: #ff5e5e
        .login
            width: 5.5rem
            height: 3rem
            margin: 0 auto
            padding: 0.5rem 0
            display: flex
            align-items: center
            .info
                width: 2rem
            .info p
                font-size: 13px
                line-height: 24px
                font-family: 'sumhei'
            .btn
                width: 100%
                margin-top: 0.3rem
                display: flex
                align-items: center
                .logins
                .home
                    width: 0.77rem
                    height: 0.28rem
                    border-radius: 5px
                    display: flex
                    justify-content: center
                    align-items: center
                    cursor: pointer
                .logins
                    color: #FFFFFF
                    background: #ff6c6c
                    margin-right: 10px
                .home
                    background: #fff
                    border: 1px solid #ddd

</style>
