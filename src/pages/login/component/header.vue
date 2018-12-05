<template>
    <div class="headers">
        <div class="box">
            <router-link to="/">
                <img
                        src="https://passport.yhd.com/front-passport/passport/images/loginlogo.jpg"
                        alt=""
                        class="logo">
            </router-link>
            <div class="right">
                <span class="hello">您好,欢迎关联1号店!</span>
                <span class="login">请登录</span>
                <div class="help">
                    <ul class="help-ul">
                        <li>
                            <span class="iconfont earth-icon">&#xe76c;</span>
                            <span class="title">帮助中心</span>
                            <span class="iconfont down-icon">&#xe64a;</span>
                        </li>
                        <li><span class="title">包裹追踪</span></li>
                        <li><span class="title">常见问题</span></li>
                        <li><span class="title">在线退换货</span></li>
                        <li><span class="title">在线投诉</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'headers'
    }
</script>

<style lang="stylus" scoped>
    .headers
        width: 100%
        height: 0.8rem
        background: #fff
        border-bottom: 3px solid rgba(225, 225, 225, 0.41)
        .box
            width: 12rem
            height: 100%
            margin: 0 auto
            display: flex
            justify-content: space-between
            align-items: center
            .right
                width: 3rem
                display: flex
                margin-top: -0.2rem
                position: relative
                box-sizing: border-box
                .hello
                    color: #999
                .login
                    color: #06c
                    cursor: pointer
                    margin: 0 0.2rem 0 0.1rem
                    &:hover
                        color: red
                .help
                    width: 1rem
                    height: 0.3rem
                    position: absolute
                    top: -10px
                    right: 0
                    overflow: hidden
                    border: 1px solid transparent
                    &:hover
                        height: 1.55rem
                        border: 1px solid #ccc
                        background: #fff
                    .help-ul li
                        height: 0.2rem
                        padding: 5px 0
                        display: flex
                        justify-content: center
                        align-items: center
                        cursor: pointer
                        border-top: 1px dashed #ccc
                        &:first-child
                            justify-content: space-around
                            border-top: none
                    .earth-icon
                    .down-icon
                        color: #c5c5c5
                    .down-icon
                        font-size: 10px
                    .title
                        color: #4b4b4b
                        &:hover
                            color: red

</style>
