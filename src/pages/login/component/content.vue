<template>
    <div class="content">
        <img    class="img"
                src="https://passport.yhd.com/front-passport/passport/images/login_pic.png"
                alt="">
        <div class="login">
            <div class="title">
                <h3 class="title1">1号店用户登录</h3>
                <router-link to="/regist" class="new-regist">注册新用户</router-link>
            </div>
            <form action="../../../../../../login.php" method="post">
                <div class="from">
                    <div class="item">
                        <span class="iconfont user-icon">&#xe66c;</span>
                        <input class="user"
                               type="text"
                               placeholder="邮箱/手机/用户名"
                               name="user"
                               ref="user"
                        >
                    </div>
                    <div class="item">
                        <span class="iconfont pwd-icon">&#xe639;</span>
                        <input class="pwd"
                               type="password"
                               placeholder="密码"
                               name="pwd"
                        >
                    </div>
                </div>
                <div class="forget">忘记密码?</div>
                <input type="button" class="login-btn" value="登录" ref="login" @click="login">
            </form>

        </div>

    </div>
</template>

<script>
export default {
    name: 'login',
    methods:{
        login(e){
            let login = this.$refs.login
            let user = this.$refs.user
            if(user.value.length>0){
                e.target.type = 'submit'
            }


        }
    }
}
</script>

<style lang="stylus" scoped>
    .content
        width: 9.8rem
        margin: 0 auto
        margin-top: 0.26rem
        display: flex
        justify-content: space-between
        align-items: center
        .login
            width: 4rem
            height: 4rem
            background: #fff
            box-sizing: border-box
            padding: 0.45rem 0.35rem
            .title
                width: 100%
                display: flex
                justify-content: space-between
                align-items: center
                .title1
                    font-size: 14px
                    color: #666
                    font-weight: bold
                .new-regist
                    color: #06c
            .from
                margin: 0.1rem 0 0 0
                .item
                    width: 3.3rem
                    height: 0.54rem
                    border: 1px solid #dedede
                    margin-bottom: 0.1rem
                    display: flex
                    justify-content: flex-start
                    align-items: center
                    &:hover
                        border: 1px solid #aaa
                    .user-icon
                    .pwd-icon
                        font-size: 20px
                        margin: 0 0.2rem
                    .pwd-icon
                        color: #3333339e
                    .user
                    .pwd
                        width: 2.5rem
                        height: 0.25rem
                        font-size: 14px
            .forget
                display: flex
                justify-content: flex-end
                color: #999
                cursor: pointer
            .login-btn
                width: 3.3rem
                height: 0.52rem
                color: #FFFFFF
                font-size: 16px
                margin-top: 0.2rem
                background: #ff3c3c
                cursor: pointer
                display: flex
                justify-content: center
                align-items: center
</style>
