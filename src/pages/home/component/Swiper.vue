<template>
    <div class="lunbo">
        <!--<div class="nav">-->
            <!--<div-->
                    <!--class="total"-->
                    <!--@mouseenter="showcategory"-->
                    <!--@mouseleave="hidecategory"-->
            <!--&gt;-->
                <!--<span class="iconfont all-icon">&#xe664;</span>-->
                <!--<span class="total-text">{{alltitle}}</span>-->
                <!--<span class="iconfont arrow-icon" >&#xe610;</span>-->
                <!--<all-category-->
                        <!--:categorys="category"-->
                        <!--v-show="categoryShow"-->
                <!--&gt;</all-category>-->
            <!--</div>-->
            <!--<ul class="titles">-->
                <!--<li class="title" v-for="(item) in title">{{item}}</li>-->
            <!--</ul>-->
        <!--</div>-->
        <div class="swipers">
            <swiper :options="swiperOption" >
                <!-- slides -->
                <swiper-slide v-for="(item,index) in lunbo" :key="index"><img
                        class="lunbo-img"
                        :src="item"
                        alt=""
                ></swiper-slide>
                <!-- Optional controls -->
                <div class="swiper-pagination"  slot="pagination"></div>
            </swiper>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'lunbo',
        props:{
            category: Array
        },
        components:{
        },
        data(){
            return{
                swiperOption:{
                    pagination:".swiper-pagination",
                    loop:true,
                    autoplay:3000,
                    autoplayDisableOnInteraction:false,
                    simulateTouch: false,
                    paginationClickable: true,
                },
                lunbo:[
                    "//img10.360buyimg.com/img/jfs/t25378/81/2599682216/101115/2f29dc48/5bea82b2N84c13eb5.jpg",
                    "//img14.360buyimg.com/img/jfs/t26956/144/1670311987/101275/167ace59/5bea82ffN333a2247.jpg",
                    "//img20.360buyimg.com/img/jfs/t27877/343/1694992151/100319/4aff7034/5bea8332N43b702f3.jpg",
                    "//img14.360buyimg.com/img/jfs/t26650/253/1682321596/86430/3dd1962e/5bea835aN26a6b176.jpg"
                ],
            }
        },

    }
</script>

<style lang="stylus" scoped>
    .lunbo>>>.swiper-pagination-bullet
        background: #fff
    .lunbo
        width: 100%
        height: 4.4rem
        .swipers
            text-aligncd: center
</style>
