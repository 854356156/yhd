<template>
  <div class="Header">
    <div class="box">
      <div class="address"
           v-if="home === true"
           @mouseenter="changecolor($event)"
           @mouseleave="initcolor($event)"
      >
        <span class="iconfont add-icon">&#xe65e;</span>
        <span>送货地址：</span>
        <span>广州市</span>
      </div>
      <router-link class="back"
                   v-if="home === false"
                   tag="div"
                   to="/"
      ><span class="iconfont back-icon">&#xe618;</span>1号店首页
      </router-link>
      <div class="announcement"
           v-if="home === true"
           @mouseenter="changecolor($event)"
           @mouseleave="initcolor($event)"
      >
        <span class="iconfont ann-icon">&#xe600;</span>
        <span class="ann-text" >我是一条公告</span>
      </div>
      <div class="right-info">
        <div class="login" v-if="user === true">
          <span>HI! </span>
          <router-link
                  class="logins"
                  to="/login"
          >请登录</router-link>
          <router-link
                  class="registered"
                  to="/regist"
                  @mouseenter.native="changecolor($event)"
                  @mouseleave.native="initcolor($event)"
          >注册</router-link>
        </div>
        <div class="login" v-else="">
          <span>您好 ! </span>
          <span class="user">{{this.$store.state.user}}</span>
          <span class="registered" @click="out">退出</span>
        </div>
        <div class="vip"
             @mouseenter="changecolor($event)"
             @mouseleave="initcolor($event)"
        >
          <span class="iconfont vip-icon">&#xe630;</span>
          <span>会员俱乐部</span>
        </div>
        <router-link
                class="order"
                to="#"
                @mouseenter.native="changecolor($event)"
                @mouseleave.native="initcolor($event)"
        >
          <span class="iconfont order-icon">&#xe607;</span>
          <span>我的订单</span>
        </router-link>
      </div>

    </div>
  </div>
</template>

<script>
  export default {
    name: 'Header',
      data(){
        return{
          changered:'red',
          user: true,
          home: true
        }
      },
      methods:{
        changecolor(e){
            e.path[0].style.color = this.changered
        },
        initcolor(e){
            e.path[0].style.color = ''
        },
        out(){
            // this.$store.state.user = ' '
            document.cookie = "user="+ " " + "; expires=Thu, 01 Jan 1970 00:00:00 GMT";
            this.user = true
            this.$router.go(0)
        },
        back(){
            if(this.$route.name === 'Home'){
                this.home = true
            }else {
                this.home = false
            }
        },
        login(){
            let cookieArr = document.cookie
            // console.log(cookieArr.length);
            // console.log(cookieArr.substring(5,8));
            // let userLength = 'user'.length+1
            // let totalLength = cookieArr.indexOf('user') + userLength
            // let user = cookieArr.split('')[totalLength]
            let userLength = 'user'.length+1
            let totalLength = cookieArr.length
            let user = cookieArr.substring(userLength,totalLength)
            if(user.length===0){
                user = undefined
            }
            this.$store.commit("changeUser",user)
        },
        abc() {
            if(this.$store.state.user === undefined){
                this.user=true
            }else {
                this.user=false
            }
        }
      },
      mounted(){
        this.back()
        this.login()
        this.abc()
      }
  }
</script>

<style lang="stylus" scoped>
  .Header
    width: 100%
    height: 0.3rem
    background-color: #f4f4f4
    border-bottom: 2px solid #f1f1f1
    .box
      height: 100%
      width: 10.7rem
      margin: 0 auto
      .address
        height: 100%
        width: 1.3rem
        font-size: 0.1rem
        float: left
        display:flex
        justify-content:center
        align-items:center
        cursor: pointer
        .add-icon
          color: red
          margin-right: 0.05rem
      .back
        height: 100%
        color: #8c8c8c
        float: left
        cursor: pointer
        display: flex
        align-items: center
        &:hover
          color: #ff4040
        .back-icon
          color: #ff4040
          margin-top: -2px
          margin-right: 1px
      .announcement
        float: left
        height: 100%
        width: 1.3rem
        display:flex
        justify-content: flex-start
        align-items: center
        margin-left: 0.2rem
        cursor: pointer
        .ann-icon
          color: red
          font-size: 0.05rem
        .ann-text
          margin-left: 0.05rem
      .right-info
        float: right
        height: 100%
        width: 3.2rem
        .login
          height: 100%
          width: 1.2rem
          line-height: 0.3rem
          float: left
          .logins
            color: red
          .user
            cursor: pointer
            &:hover
              color red
          .registered
            float: right
            color: #aaa
            cursor pointer
            &:hover
              color red
        .vip
          height: 100%
          width: 1rem
          float: left
          display:flex
          justify-content:center
          align-items:center
          margin-left: 0.15rem
          .vip-icon
            color: red
        .order
          height: 100%
          float: right
          display:flex
          justify-content: flex-start
          align-items: center
          color: black
          .order-icon
            padding-right: 0.03rem
</style>
