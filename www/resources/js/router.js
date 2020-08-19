import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Input from './pages/Input.vue'
import Confirm from './pages/Confirm.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/',
    component: Input
  },
  {
    path: '/confirm',
    component: Confirm
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router