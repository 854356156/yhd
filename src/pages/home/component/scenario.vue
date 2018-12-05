<template>
    <div class="scenario">
       <div class="box" v-for="item in scenario" :ket="item.id">
           <div class="left-box">
               <p class="box-title" :style="{'color':item.color}">{{item.title1}} <span >{{item.title2}}</span></p>
               <div class="directory">
                   <img
                           class="directory-img"
                           :src="item.directoryImg"
                           alt=""
                   >
                   <div class="single-directory" >
                       <router-link
                               :to="/detail/+ single.id"
                               tag="div"
                            class="single"
                            v-for="single in item.directorySingle"
                            :key="single.id"
                       >{{single.name}}</router-link>
                   </div>
               </div>
               <div class="shop-show">
                   <div
                           class="snacks"
                           v-for="(snacks,index) in item.snacks1"
                           :key="index">
                       <div class="text">
                           <span class="text-title1" :style="{'color':snacks.title1Color}">{{snacks.title1}}</span>
                           <span class="text-title2":style="{'color':snacks.title2Color}">{{snacks.title2}}</span>
                           <div
                                   class="enter"
                                   :style="{'color':snacks.enterColor,borderColor:snacks.enterBorderColor}"
                           >{{snacks.enter}}</div>
                           <div></div>
                       </div>
                       <img
                               class="shop-img"
                               :src="snacks.img"
                               alt=""
                       >
                   </div>
                   <div class="snack" v-for="(snack,index) in item.snack1" >
                       <p class="snack-title1" >{{snack.title1}}</p>
                       <p class="snack-title2" :style="{'color':snack.title2Color}">{{snack.title2}}</p>
                       <img
                               :src="snack.img"
                               alt=""
                               class="snack-img">
                   </div>
               </div>
               <div class="shop-show">
                   <div class="snack" v-for="(snack,index) in item.snack2" >
                       <p class="snack-title1" >{{snack.title1}}</p>
                       <p class="snack-title2" :style="{'color':snack.title2Color}">{{snack.title2}}</p>
                       <img
                               :src="snack.img"
                               alt=""
                               class="snack-img">
                   </div>
                   <div
                           class="snacks"
                           v-for="(snacks,index) in item.snacks2"
                           :key="index">
                       <div class="text">
                           <span class="text-title1" :style="{'color':snacks.title1Color}">{{snacks.title1}}</span>
                           <span class="text-title2":style="{'color':snacks.title2Color}">{{snacks.title2}}</span>
                           <div
                                   class="enter"
                                   :style="{'color':snacks.enterColor,borderColor:snacks.enterBorderColor}"
                           >{{snacks.enter}}</div>
                           <div></div>
                       </div>
                       <img
                               class="shop-img"
                               :src="snacks.img"
                               alt=""
                       >
                   </div>
               </div>
           </div>
           <div class="right-box" v-for="(lunbo,index) in item.lunbo" :key="index">
               <img
                       :src="lunbo.img"
                       alt=""
                       class="bg">
               <p class="right-title1">{{lunbo.title1}}</p>
               <p class="right-title2" :style="{'color':lunbo.title2Color}">{{lunbo.title2}}</p>
               <div class="right-lunbo">
                   <div class="lunbo-content" :style="{'left':lunbo.left+'px'}">
                       <div class="lunbo-img" v-for="(imgs,index) in lunbo.lunboImg" :index="index">
                           <div v-for="(imgg,index) in imgs.img" :key="index">
                               <img
                                       :src="imgg"
                                       alt="">
                           </div>
                       </div>

                   </div>
                   <span
                       class="next"
                       @click="next(lunbo)"
               > ></span>
                   <span
                           class="pre"
                           @click="pre(lunbo)"
                   > <</span>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
export default {
    name: 'scenario',
    props:{
        scenario: Array,
        shop: Array
    },
    data(){
        return{
            left: 0,
        }
    },
    methods:{
        pre(lunbo){
            let left = lunbo.left = lunbo.left-0+80
            if(left > 0){
                this.$set(lunbo,'left','-160')
                return
            }
            this.$set(lunbo,'left',left)
        },
        next(lunbo){
            let left = lunbo.left = lunbo.left-0-80
            if(left < -160){
                this.$set(lunbo,'left','0')
                return
            }
            this.$set(lunbo,'left',left)
        }
    }
}
</script>

<style lang="stylus" scoped>
    .scenario
        width: 100%
        background: #f5f5f5
        padding-top: 0.4rem
        .box
            width: 10.7rem
            height: 4.21rem
            background: #fff
            box-sizing: border-box
            margin: 0 auto
            margin-bottom: 0.4rem
            .left-box
                width: 8.7rem
                float: left
                padding: 0.2rem 0 0.2rem 0.2rem
                .box-title
                    font-size: 25px
                    /*font-weight: bold*/
                .box-title span
                    font-size: 15px
                    font-weight: normal
                .directory
                    width: 1.89rem
                    margin-top: 0.2rem
                    float: left
                    position: relative
                    top: 0
                    left: 0
                    .directory-img
                        width: 100%
                    .single-directory
                        width: 1.76rem
                        height: 0.9rem
                        color: #fff
                        position: absolute
                        top: 0.2rem
                        right: 0
                        display: flex
                        flex-wrap: wrap
                        .single
                            width: 0.76rem
                            height: 0.25rem
                            font-size: 14px
                            border: 1px solid #fff
                            margin: 0 9px 9px 0
                            display: flex
                            justify-content: center
                            align-items: center
                            cursor: pointer
                            &:hover
                                background: #ffffff30
                .shop-show
                    width: 6.8rem
                    float: left
                    margin-top: 0.2rem
                    display: flex
                    flex-wrap: wrap
                    .snacks
                        width:3.35rem
                        height: 1.67rem
                        background: #faf9f8
                        box-sizing: border-box
                        padding: 0 0.3rem
                        display: flex
                        justify-content: space-between
                        align-items: center
                        cursor: pointer
                        .text
                            height: 100%
                            display: flex
                            flex-direction: column
                            justify-content: center
                            align-items: flex-start
                            font-size:14px
                            .text-title2
                                margin: 0.1rem 0
                            .enter
                                width: 0.8rem
                                height: 0.29rem
                                color: #c0845c
                                border: 1px solid #c0845c
                                display: flex
                                justify-content: center
                                align-items: center
                                &:hover
                                    background: #fff
                        .shop-img
                            width: 1.1rem
                            height: 1.1rem
                            transition: all 0.3s
                            &:hover
                                margin-right: 0.1rem
                    .snack
                        width: 1.67rem
                        height: 1.67rem
                        box-sizing: border-box
                        border-right: 1px solid #f6f6f6
                        position: relative
                        top: 0
                        left: 0
                        cursor: pointer
                        &:nth-child(odd)
                            border: none
                        .snack-title1
                        .snack-title2
                            font-size: 14px
                            padding: 0.1rem 0 0 0.2rem
                        .snack-img
                            widht: 0.9rem
                            height: 0.9rem
                            position: absolute
                            bottom: 0.1rem
                            right: 0.2rem
                            transition: all 0.3s
                            &:hover
                                right: 0.3rem
            .right-box
                width: 1.70rem
                height: 4.21rem
                float: right
                border-left: 1px solid #f6f6f6
                position: relative
                top: 0
                left: 0
                display: flex
                flex-direction: column
                align-items: center
                .bg
                    width: .71rem
                    position: absolute
                    top: 0
                    right: 0.2rem
                .right-title1
                    font-size: 16px
                    margin-top: 0.2rem
                .right-title2
                    font-size: 14px
                    margin-top: 0.1rem
                .right-lunbo
                    width: 0.9rem
                    height: 3.2rem
                    margin-top: 0.2rem
                    box-sizing: border-box
                    overflow: hidden
                    position: relative
                    display: flex
                    justify-content: center
                    align-items: center
                    .lunbo-content
                        width: 1.8rem
                        height: 3rem
                        position: absolute
                        top: 0
                        left:0
                        display: flex

                        .lunbo-img
                            width: 0.9rem
                            height: 100%
                            display: flex
                            flex-direction: column
                            align-items: center
                        .lunbo-img div
                            width: 0.8rem
                            height: 0.8rem
                            background: #fff
                            box-shadow: 1px 1px 5px rgba(0,0,0,0.07)
                            margin-top: 0.1rem
                            display:flex
                            justify-content: center
                            align-items: center
                    .pre
                    .next
                        width: 0.2rem
                        height: 0.2rem
                        background: #aaaaaa29
                        border-radius: 50%
                        display: flex
                        justify-content: center
                        align-items: center
                        position: absolute
                        bottom: 0
                        cursor: pointer
                    .next
                        right: 0.2rem
                    .pre
                        left: 0.2rem


</style>
