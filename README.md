http://linzhiwei.xyz 在线浏览<br>
一、1号店案例介绍 <br>
  1、登录注册 <br>
  2、vue-router路由跳转 <br>
  3、组件化开发模式 <br>
  4、页面数据请求 <br>
  5、第三方插件运用 <br>
  6、vuex的使用 <br>
二、功能介绍 <br>
  1、登录注册：利用PHP实现登录注册功能，注册成功后将注册的用户密码发送到数据库中，登录时匹配数据中的账号密码，匹配成功就跳转到首页同时把账号名存在到                 vuex中，这样不同页面也可以获取到这次登录的账号名 <br>
  2、路由跳转：点击不同分类从数据库中渲染出不同的商品出来 <br>
              路由配置：{ <br>
                          path: '/detail/:id', <br>
                          name: 'Detail', <br>
                          component: Detail <br>
                        } <br>
              <router-link :to="/detail/+ single.id"></router-link> <br>
  3、加入购物车：点击加入购物车，客户端就把商品的数据发送到服务端<br>
  4、购物车：登录状态渲染该账户的购物车商品
 
