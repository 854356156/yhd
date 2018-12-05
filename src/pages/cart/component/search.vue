<template>
    <div class="search">
        <div class="box">
            <router-link to="/">
                <img src="//img.yihaodianimg.com/front-homepage/global/images/logo/logo_new@2x.png"
                     alt=""
                     class="logo"
                >
            </router-link>
            <div class="search-right">
                <input type="text" placeholder="请输入关键词">
                <span class="iconfont sea-icon">&#xe632;</span>
            </div>
        </div>
    </div>
</template>

<script>
    import PublicHeader from '@/public/Header.vue'
    export default {
        name: 'search'
    }
</script>

<style lang="stylus" scoped>
    .search
        width: 100%
        height: 0.8rem
        background: #f8f8f8
        .box
            width: 10.7rem
            height: 100%
            margin: 0 auto
            display: flex
            justify-content: space-between
            align-items: center
            .logo
                width: 0.7rem
            .search-right
                width: 2.8rem
                height: 0.3rem
                border: 1px solid #eceaea
                background: #fcfbfb
                padding: 0 0.1rem
                display: flex
                justify-content: space-between
                align-items: center
            .search-right input
                width: 2rem
                background: #fcfbfb
</style>
