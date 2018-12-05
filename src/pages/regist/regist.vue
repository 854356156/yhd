<template>
    <div class="regist">
        <regist-header></regist-header>
        <regist-content :regist="regist"></regist-content>
    </div>
</template>

<script>
import  axios from 'axios'
import  RegistHeader from './component/header'
import  RegistContent from './component/content'
export default {
    name: 'regist',
    data(){
        return{
            regist: []
        }
    },
    components:{
        RegistHeader,
        RegistContent
    },
    methods:{
        InfoRegist(){
            axios.get('static/mock/regist.json').then(this.InfoRegistGet)
        },
        InfoRegistGet(res){
            res = res.data
            if(res.ref && res.data){
                const data = res.data
                this.regist = data.information
            }
        }
    },
    mounted(){
        this.InfoRegist()
    }
}
</script>

<style lang="stylus" scoped>
    .regist
        width: 100%
        height: 100%
        background: #fcfcfc
</style>
