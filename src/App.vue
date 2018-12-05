<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
// import Home from '@/pages/home/home.vue'
//import Header from '@/pages/home/component/header.vue'
export default {
  name: 'App',
  components:{
    // Home,
//    Header
  }

}
</script>

<style lang="stylus" scoped>
  #app
    width: 100%
    height: 100%
</style>
