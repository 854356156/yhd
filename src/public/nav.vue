<template>
    <div class="box">
        <div class="nav">
            <div
                    class="total"
                    @mouseenter="showcategory"
                    @mouseleave="hidecategory"
            >
                <span class="iconfont all-icon">&#xe664;</span>
                <span class="total-text">{{alltitle}}</span>
                <span class="iconfont arrow-icon" >&#xe610;</span>
                <all-category
                        :categorys="category"
                        v-show="categoryShow"
                ></all-category>
            </div>
            <ul class="titles">
                <li class="title" v-for="(item) in title">{{item}}</li>
            </ul>
        </div>
    </div>

</template>

<script>
import axios from 'axios'
import AllCategory from './allcategory.vue'
export default {
    name: 'Nav',
    data(){
        return{
            alltitle: "全部类目",
            title:[
                "领金币",
                "领券中心",
                "充值",
                "超级单品",
                "超级品牌",
                "超级品类"
            ],
            categoryShow: false,
            category: [],
        }
    },
    components:{
        AllCategory
    },
    methods:{
        showcategory(){
            this.categoryShow = !this.categoryShow
        },
        hidecategory(){
            this.categoryShow = !this.categoryShow
        },
        InfoCategory(){
            axios.get('static/mock/category.json').then(this.InfoCategoryGet)
        },
        InfoCategoryGet(res){
            res = res.data
            if(res && res.ref){
                const data = res.data
                this.category = data.content
            }
        }
    },
    mounted(){
        this.InfoCategory()
    }
}
</script>

<style lang="stylus" scoped>
    .box
        width: 100%
        height: 0.4rem
        .nav
            width: 10.7rem
            height: 0.4rem
            margin: 0 auto
            position: relative
            .total
                height: 100%
                width: 1.4rem
                background: #ff4040
                float: left
                color: #fff
                display: flex
                justify-content: center
                align-items: center
                cursor: pointer
                &:hover .arrow-icon
                    transform:rotate(180deg)
                .total-text
                    font-size: 16px
                    margin:0 0.1rem
                .all-icon,.arrow-icon
                    font-size: 5px
            .titles
                height: 100%
                width: rem
                float: left
                display: flex
                flex-direction: row
                justify-content: center
                align-items: center
                .title
                    font-size: 16px
                    margin-left: 0.2rem
                    cursor: pointer
                    &:hover
                        color: red
</style>
