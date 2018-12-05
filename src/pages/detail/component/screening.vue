<template>
    <div class="box">
        <div class="screening">
            <div class="top">
                <div class="title">综合</div>
                <div class="title">销量 <span class="iconfont down-icon">&#xe6c5;</span></div>
                <div class="title">新品 <span class="iconfont down-icon">&#xe6c5;</span></div>
                <div class="title">评论 <span class="iconfont down-icon">&#xe6c5;</span></div>
                <div class="title">价格 <span class="iconfont down-icon">&#xe6c5;</span></div>
                <div class="search">
                    <input type="text" class="input" placeholder="搜索">
                    <span class="iconfont search-icon">&#xe632;</span>
                </div>
            </div>
            <div class="bottom">
                <div class="model"><div class="selected"></div>1号店自营</div>
                <div class="model"><div class="selected"></div>仅显示有货</div>
            </div>
        </div>
    </div>
</template>

<script>
 export default {
     name: 'screening'
 }
</script>

<style lang="stylus" scoped>
    .box
        width: 100%
        .screening
            width: 10.7rem
            height: 0.8rem
            margin: 0 auto
            border: 1px solid #ddd
            display: flex
            flex-direction: column
            .top
                width: 100%
                height: 50%
                background: #f5f5f5
                border-bottom: 1px solid #ddd
                float: left
                .title
                    height: 100%
                    padding: 0 0.1rem
                    line-height: 0.4rem
                    cursor: pointer
                    display: inline-block
                    &:first-child
                        background: #fff
                        color: red
                    &:hover
                        background: #fff
                        color: red
                        .down-icon
                            color:red
                    .down-icon
                        color: #cccccc
                        font-size: 10px
                        margin: 0.01rem 0 0 0.01rem
                .search
                    float: right
                    width: 1.6rem
                    height: 0.3rem
                    background: #fff
                    margin-top: 0.05rem
                    margin-right: 0.1rem
                    display: flex
                    align-items: center
                    .input
                        width: 80%
                        margin-left: 0.1rem
                    .search-icon
                        width: 20%
                        color: red
            .bottom
                height: 50%
                display: flex
                align-items: center
                .model
                    margin-left: 0.2rem
                    cursor: pointer
                    display: flex
                    align-items: center
                    &:hover
                        color: red
                    .selected
                        width: 0.12rem
                        height: 0.12rem
                        border: 1px solid #aaa
                        margin-right: 0.1rem
    </style>