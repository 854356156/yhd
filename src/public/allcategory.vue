<template>
    <div class="category">
        <!--<div>-->
            <div class="bigbox" v-for="(item) in categorys" :key="item.id">
                <div class="box" v-for="(items) in item.title">
                    <span class="title">{{items.name}}</span>
                    <ul class="classifications">
                        <li v-for="(itemss,index) in items.class" :key="index">
                            <span class="classification">{{itemss}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        <!--</div>-->
    </div>
</template>

<script>
export default {
    name: 'category',
    props: {
        categorys: Array
    }
}
</script>

<style lang="stylus" scoped>
    .category
        z-index: 99
        position: absolute
        left: 0
        bottom: -4.1rem
        width: 10.7rem
        height: 4.1rem
        background: #fff
        border: 1px solid #ff4040
        box-sizing: border-box
        cursor:default
        color: black
        display: flex
        flex-wrap: wrap
        .bigbox
            border-right: 1px solid #ddd
            margin: 0 0 0.2rem 0.21rem
            box-sizing: border-box
            &:last-child
                border-right: none
            .box
                width: 1.55rem
                height: 1.75rem
                margin-top: 0.2rem
                .title
                    font-size: 14px
                    font-weight: bold
                    cursor: pointer
                    &:hover
                        color:red
                .classifications
                    width: 100%
                    height: 1.5rem
                    display:flex
                    flex-wrap: wrap
                    box-sizing: border-box
                    margin-top: 0.2rem
                    .classification
                        width: 0.7rem
                        float: left
                        font-size: 12px
                        cursor: pointer
                        &:hover
                          color:red
</style>
