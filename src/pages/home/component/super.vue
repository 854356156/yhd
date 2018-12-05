<template>
    <div class="super">
        <div class="smallsuper">
            <div class="box" v-for="item in supers" :key="item.id">
                <p class="box-text">{{item.title1}} <span>{{item.title2}}</span></p>
                <div class="smallbox" v-for="items in item.abc" :key="items.id">
                    <div class="content">
                        <div class="logo" v-if="items.logo">
                            <img
                                    :src="items.logo"
                                    alt=""
                                    class="logo-img"
                            >
                        </div>
                        <div class="pinpai">
                            <span class="pinpai-name">{{items.pinpaiName}}</span>
                            <span class="pre">{{items.pre}}</span>
                            <div class="enter">{{items.enter}}</div>
                        </div>
                        <div class="shop" v-for="(itemss,index) in items.img" :key="index">
                                <img
                                        :src="itemss"
                                        alt=""
                                        class="shop-img"
                                >
                            </div>
                    </div>
                    <img
                            :src="items.bg"
                            alt=""
                            class="smallbox-bg"
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'super',
    props:{
        supers: Array
    }

}
</script>

<style lang="stylus" scoped>
    .super
        width: 100%
        background: #f5f5f5
        .smallsuper
            width: 10.7rem
            height:3.6rem
            margin: 0 auto
            padding-top: 0.4rem
            display: flex
            justify-content: space-between
            .box
                width: 5.3rem
                height: 100%
                background: #fff
                box-sizing: border-box
                padding: 0.2rem 0 0.2rem 0.2rem
                .box-text
                    font-size: 25px
                    /*font-weight: 700*/
                    margin-bottom: 0.2rem
                .box-text span
                    font-size: 15px
                    font-weight: normal
                .smallbox
                    width: 4.9rem
                    height: 1.3rem
                    overflow:hidden
                    margin-bottom: 0.2rem
                    position: relative
                    top: 0
                    left: 0
                    cursor: pointer
                    .content
                        width: 100%
                        height: 100%
                        position: absolute
                        top: 0
                        left: 0
                        background: #0000006e
                        display: flex
                        justify-content: space-around
                        align-items: center
                        padding-left: 0.2rem
                        box-sizing: border-box
                        z-index: 99
                        .logo
                            width: 0.5rem
                            height: 0.5rem
                            .logo-img
                                width: 100%
                                border-radius: 50%
                        .pinpai
                            width: 1.4rem
                            height: 1.3rem
                            color: #fff
                            font-size: 18px
                            box-sizing: border-box
                            padding-left: 0.2rem
                            display: flex
                            flex-direction: column
                            justify-content: center
                            .pinpai-name
                                font-weight: 700
                                margin-bottom: 0.1rem
                            .enter
                                width: 0.63rem
                                height: 0.23rem
                                font-size: 13px
                                box-sizing: border-box
                                border: 1px solid #fff
                                border-radius: 0.1rem
                                display: flex
                                justify-content: center
                                align-items: center
                                margin-top: 0.1rem
                                &:hover
                                    border: none
                                    background: #aaaaaab0
                        .shop
                            width: 0.8rem
                            height: 0.88rem
                            background: #fff
                            overflow: hidden
                            margin-right: 0.15rem
                            display: flex
                            justify-content: center
                            align-items: center
                            .shop-img
                                width: 0.6rem
                                height: 0.6rem
                                transition: all 0.5s
                                &:hover
                                    margin-right:0.1rem
                    .smallbox-bg
                        width: 100%
                        position: absolute
                        top: 0
                        left: 0
</style>
