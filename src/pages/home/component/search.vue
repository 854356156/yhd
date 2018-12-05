<template>
    <div class="search">
        <div class="box">
            <div class="logo">
                <router-link to="/">
                    <img class="logo-left" src="//img.yihaodianimg.com/front-homepage/global/images/logo/logo_new@2x.png" alt="">
                </router-link>
                <img class="logo-right" src="//img.yihaodianimg.com/front-homepage/global/images/logo/global_headr.jpg" alt="">
            </div>
            <div class="search-input">
                <div class="sea">
                    <input type="text" placeholder="我是一个输入框">
                    <span class="iconfont">&#xe632;</span>
                </div>
                <router-link class="shopcar" tag="div" to="/cart">
                    <span class="iconfont shopcar-icon">&#xe60d;</span>
                    <span class="shopcar-text">购物车</span>
                </router-link>
                <div class="hotshop">
                    <span>商品1</span>
                    <span>商品2</span>
                    <span>商品3</span>
                    <span>商品4</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'home'

}
</script>

<style lang="stylus" scoped>
    .search
        width: 100%
        height: 1.4rem
        .box
            height: 100%
            width: 10.7rem
            margin: 0 auto
            display: flex
            justify-content: space-between
            align-items: center
            .logo
                width: 3rem
                float: left
                display: flex
                align-items: center
                .logo-left
                    height: 1.4rem
                    width: 1.4rem
                .logo-right
                    height: 0.9rem
                    width: 1.6rem
            .search-input
                height: 0.67rem
                width: 6.5rem
                float: right
                margin-top: 0.3rem
                position: relative
                .sea
                    height: 0.38rem
                    width: 5rem
                    float: left
                    display: flex
                    float: left
                    border: 1px solid #e2e2e2
                    border-radius: 0.4rem
                    &:hover
                        border: 1px solid red
                .sea input
                    width: 4.5rem
                    text-indent: 0.2rem
                    font-size: 0.12rem
                    float: left
                    border-radius: 0.4rem
                .sea span
                    float: right
                    height: 100%
                    width:0.5rem
                    display: flex
                    justify-content: center
                    align-items: center
                    cursor: pointer
                .shopcar
                    height: 0.4rem
                    width: 1.2rem
                    float: right
                    box-sizing: border-box
                    border: 1px solid #e2e2e2
                    border-radius: 0.4rem
                    font-size: 0.16rem
                    display: flex
                    justify-content: center
                    align-items: center
                    cursor: pointer
                    &:hover
                        background: #fcfcfc
                    .shopcar-icon
                        font-size: 21px
                    .shopcar-text
                        margin-left: 0.05rem
                .hotshop
                    position: absolute
                    bottom: 0
                    color: #aaa
                    margin-left: 0.2rem
                .hotshop span
                    margin-right: 0.1rem
                    cursor: pointer
                    &:hover
                        color: black

</style>
