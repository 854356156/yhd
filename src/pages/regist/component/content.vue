<template>
    <div class="contents">
        <h1 class="title">1号店注册</h1>
        <form action="../../../../../../regist.php" method="post">
            <div class="item" v-for="items in regist" :ket="items.id">
                <span class="name">{{items.textName}}</span>
                <input :type="items.type"
                       class="item-inp"
                       :name="items.name"
                       :placeholder="items.placeholder"
                       :ref="items.name"
                >
            </div>
            <input type="button"
                   value="注册"
                   class="submit"
                   @click="submit"
            >
        </form>
    </div>
</template>

<script>
export default {
    name: 'contents',
    props:{
        regist: Array
    },
    methods:{
        submit(e){
            let pwd = this.$refs.pwd[0];
            let pwd1 = this.$refs.pwd1[0];
            let user = this.$refs.user[0];
            if(pwd.value === pwd1.value){
                //密码相同
                e.target.type = 'submit'
            }else if(pwd.value != pwd1.value) {
                pwd.style.border = '1px solid red'
                pwd1.style.border = '1px solid red'
            }
            if(user.value === ''){
                user.style.border = '1px solid red'
            }else {
                user.style.border = ''
            }
        }
    }
}
</script>

<style lang="stylus" scoped>
    .contents
        width: 3.3rem
        height: 4.6rem
        margin: 0 auto
        display: flex
        flex-direction :column
        justify-content: center
        align-items: center
        .title
            font-size: 24px
            font-weight: bold
            color: #33
    .contents form
        width: 100%
        .item
            width: 100%
            height: 0.5rem
            margin-top: 0.2rem
            display: flex
            justify-content: flex-start
            align-items: center
            position: relative
            .name
                font-size: 14px
                position: absolute
                top: 17px
                left: -65px
            .item-inp
                width: 100%
                height: 0.5rem
                border: 1px solid #dedede
                box-sizing: border-box
                padding-left: 0.2rem
        .submit
            width: 100%
            height: 50px
            font-size: 16px
            color: #FFFFFF
            background: #ff3c3c
            margin-top: 0.3rem
            cursor: pointer
            &:hover
                background: #d72226
</style>
