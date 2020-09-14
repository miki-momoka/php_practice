import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Input from './components/pages/Input.vue'
import Confirm from './components/pages/Confirm.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスに対して、表示するコンポーネントを設定
const routes = [
  {
    path: '/',
    component: Input,
  },
  {
    path: '/confirm/',
    component: Confirm,
  }
  // {
  //   path: '/complete',
  //   component: Complete,
  //   meta: {
  //     title: '送信完了'
  //   },
  //   link: [
  //     { rel: 'stylesheet' , href: 'css/entry_pc.css' , media: 'all' },
  //     { rel: 'stylesheet' , href: 'css/entry_sp.css' , media: 'all' },
  //   ]
  // },
]

// VueRouterインスタンスを作成する
// routes => ルートの設定
const router = new VueRouter({
  mode: 'history', // 本来の URL の形を再現
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router