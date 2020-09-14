
// require('./bootstrap');

import jquery from 'jquery'
global.jquery = jquery
global.$ = jquery
window.$ = window.jQuery = require('jquery')

window.Vue = require('vue');

// headの設定・切り替え
import VueHead from 'vue-head';
Vue.use(VueHead);

// ルーティングの定義をインポートする
// router.js
import router from './router'

// ルートコンポーネントをインポートする
// app.vue
import App from './components/App.vue'

const app = new Vue({
  el: '#app',
  router, // ルーティングの定義を読み込む
  components: { App }, // ルートコンポーネントの使用を宣言する
  template: '<App />', // ルートコンポーネントを描画する
  head: {
    meta:[
      { he: 'X-UA-Compatible', c: 'IE=edge'},
      { he: 'Content-Type' ,c:' text/html; charset=utf-8'},
      { he: 'Content-Script-Type' ,c: 'text/javascript'},
      { he: 'Content-Style-Type' ,c: 'text/css'},
      { he: 'imagetoolbar' ,c: 'no'},
      { n: 'format-detection' ,c: 'telephone=no'},
      { n: 'viewport' ,c: 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes'},
      { n: 'Keywords' ,c: ''},
      { n: 'description' ,c: ''},
      { n: 'Priority' ,value: '0'},
      { p: 'og:title' ,c: ''},
      { p: 'og:type' ,c: 'website'},
      { p: 'og:url' ,c: ''},
      { p: 'og:site_name' ,c: ''},
      { p: 'og:description' ,c: ''},
      { p: 'og:image' ,c: ''},
      { n: 'twitter:card' ,c: 'photo'},
      { n: 'twitter:image' ,c: ''}
    ],
    link:[
      { rel: 'stylesheet' , href: 'common/css/default.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'common/css/base_pc.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'common/css/base_sp.css' , media: 'all' },
    ],
    script:[
      { type: 'text/javascript', src: 'common/js/common.js' , body: true},
    ]
  },
})
