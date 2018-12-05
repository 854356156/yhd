<template>
    <div class="paths">
        <div class="box">
            <span class="iconfont all-icon">&#xe645;</span>
            <span class="pathss">{{pathss}}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'paths',
    props:{
        pathss: String
    }
}
</script>

<style lang="stylus" scoped>
    .paths
        width: 100%
        height: 0.4rem
        border-top: 2px solid red
        .box
            width: 10.7rem
            height: 100%
            margin: 0 auto
            padding-left: 0.5rem
            display: flex
            align-items center
            .all-icon
                color: red
                margin-top:-0.05rem
                margin-right: 0.1rem
            .pathss
                font-size: 14px
                cursor: pointer
                &:hover
                    color: red
</style>
