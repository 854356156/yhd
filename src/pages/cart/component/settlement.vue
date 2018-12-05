<template>
    <div class="settlement" ref="jiesuan">
        <div class="box zhidi"
             ref="box"
        >
            <div class="samllbox" ref="jiesuan">
                <div class="seleted">
                    <span class="check"></span>
                    <span class="all">全选 (共<span class="all-number">0</span>件)</span>
                    <span class="del">批量删除</span>
                </div>
                <div class="jiesuan">
                    <span class="isseleted">已选商品<span class="sele-num"> 0 </span>件</span>
                    <span>|</span>
                    <span class="total">
                        合计 :
                        <span class="curr">￥</span><span class="price">0.00</span>
                    </span>
                    <span class="btn">去结算</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'settlement',
    methods:{
        handleScroll(){
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            let jiesuandiv = this.$refs.jiesuan.offsetTop
            let divheight = document.documentElement.offsetHeight
            // console.log(this.$refs.jiesuan.offsetTop)
            // console.log('屏幕高度'+document.documentElement.offsetHeight);
            // console.log('被卷去'+scrollTop);
            // console.log(scrollTop + jiesuandiv);
            if(scrollTop+divheight < jiesuandiv){
                //结算置底
                this.$refs.box.classList.add('zhidi')
            }else {
                this.$refs.box.classList.remove('zhidi')
            }
        }
    },
    mounted(){
        window.addEventListener('scroll', this.handleScroll)
    }
}
</script>

<style lang="stylus" scoped>
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
                    .check
                        width: 15px
                        height:15px
                        border: 1px solid #bfbfbf
                        border-radius: 5px
                    .all
                        width: 1.2rem
                        margin: 0 0.1rem
                        border-right: 1px solid #999
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
</style>
