<template>
    <div class="login">
        <login-header></login-header>
        <login-contnet></login-contnet>
    </div>
</template>

<script>
import axios from 'axios'
import LoginHeader from './component/header.vue'
import LoginContnet from './component/content.vue'
export default {
    name: 'login',
    components:{
        LoginHeader,
        LoginContnet
    }
}
</script>

<style lang="stylus" scoped>
    .login
        width: 100%
        height: 100%
        background: #fcfcfc
</style>
