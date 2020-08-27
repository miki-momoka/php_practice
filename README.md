# 【課題】メールフォーム　

## ～ 概要 ～

Laravelで構築しました。

## ～ ブラッシュアップ 7/27 ～

### ① 前回で学んだ部分を追加

- その他選択時のバリデーション追加<br>
- バリデーション前の文字整形

<br><br>

### ② DB/テーブル作成

#### ■ マイグレーション [database/migrations] (テーブルの定義)
コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行
(テーブル名は複数形にする。)

```
$ php artisan make:migration create_forms_table
$ docker exec -it php_practice_app_1 bash
$ php artisan migrate
```

<br>

### ②-1 DBでマスター管理

#### ■ シーダー作成・実行 [database/seeds] (テーブルに行データ追加)

```
$ php artisan make:seeder PrefecturesTableSeeder<br>
$ php artisan db:seed
```

 【database/seeds/DatabaseSeeder.php 内で呼ぶ ↓】<br>
```
$this->call(PrefecturesTableSeeder::class);
```

#### ■ マスターをDB管理に変更
テーブルを操作するモデルを作成 [app/] DBと連携する。1テーブルに1モデル。
```
$ php artisan make:model Prefectures
```

コントローラ内

```
use App\Prefecture;
$master_pref = Prefecture::all()->toArray();
```

<br>

### ②-2. フォーム登録

1) Formモデル作成<br>
2) 新しくインスタンスを作成。<br>
3) $request からフォームの値を取得。<br>
4) モデルの save メソッドを使用すると、created_at と updated_at が自動に入ってくれる。

#### ■ 二重送信対策

送信完了後に
```
$request->session()->regenerateToken();
```

419エラーページが表示される。 <br>
リダイレクト処理したい場合は、\app\Exceptions\Handler.php のrender内に追記 

<br><br>

### ③ vue導入
- インストール
```
$ npm install
```

- ビルドコマンド
```
$ npm run dev
```

- コンパイル コマンド
```
$ npm run prod
```

コマンドを実行すると、public内のcss,jsフォルダ内にコンパイルされたファイルが生成される。

- ファイルを監視しコンパイル自動化
```
$ npm run watch
```

- デバッグツール Vue.js DevTools<br>
https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd?hl=ja


#### マルチページアプリケーション と シングルページアプリケーションの違い
- マルチ：ブラウザの画面要求（GET）またはデータ送信（POST）に対してHTMLを返却する。
- シングル：最初に画面を表示し、その後はAjaxでデータの要求や送信がされる。

#### Vue Router導入
```
$ npm install -D vue-router
```

<br>

### ③-1. SPA化

※ 参考資料 https://www.hypertextcandy.com/vue-laravel-tutorial-introduction/

#### Vue Routerを定義 (app.js内)
```
import VueRouter from 'vue-router';
Vue.use(VueRouter);
```

- URL一覧
	- "/"              ・・・  最初の画面。入力画面を表示
  - "/confirm"       ・・・　確認画面
	- "/api/master"    ・・・  マスター情報を取得 (※)
	- "/api/validate"  ・・・  サーバ側バリデーション処理 (※)
	- "/api/regist"    ・・・  フォーム登録処理 (※)
(※ 未実装)

- ルートコンポーネント・・・コンポーネントツリーの頂上に位置するコンポーネント
```
[ resources/js/components/App.vue ]
<template>
  <div id="contentsWrap">
		<section id="mv">
			<h1>
				<img src="common/img/img_mv.png" alt="dummy" class="pc">
				<img src="common/img/sp/img_mv.png" alt="dummy" class="sp">
			</h1>
		</section>
		
    <router-view />
  </div>
</template>
```
<router-view />内に、ルートとマッチしたコンポーネントが表示される。

- ページコンポーネント・・・切り替わるHTML部分
```
[ resources/js/components/pages/input.vue ]
<template>
  <section id="contentsBox" class="form input">
  ..(省略)..
</template>


[ resources/js/components/pages/confirm.vue ]
```

- ルーティングの定義
```
[ resources/js/router.js ]
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
  mode: 'history', // 本来の URL の形を再現
  routes
})
```

- app.jsに、ルートコンポーネントとルーティング定義をインポート
```
new Vue({
  el: '#app',
  router, // ルーティングの定義を読み込む
  components: { App }, // ルートコンポーネント(App.vue)の使用を宣言する
  template: '<App />' // ルートコンポーネント(App.vue)を描画する
})
```
※ web.php内で、api以外のURLは、view内のform/indexを表示するようにしており、<br>
そのindex.blade.phpでapp.jsを読み込み、要素表示するようにしている。

#### ☆ vue-head でmetaの設定・切り替え  
全ページ共通のhead内の項目を設定。
```
[ app.js ]
new Vue({
	..(省略)..,
	head: {
		meta: [
			{ he: 'X-UA-Compatible', c: 'IE=edge'},
      		..(省略)..
		],
		link: [
			{ rel: 'stylesheet' , href: 'common/css/default.css' , media: 'all' },
			..(省略)..
		],
    script:[
      { type: 'text/javascript', src: 'common/js/common.js' , body: true},
    ]
	}
})
```

ページごとに切り替え
```
[ input.vue ] 
<script>
export default {
  head: {
    title:{inner: '入力画面', separator: '|' , complement: 'Laravelメールフォーム'},
    link: [
      { rel: 'stylesheet' , href: 'common/css/jquery.mCustomScrollbar.css' , media: 'all' },
      ..(省略)..
    ],
    script: [
      { src: '/common/js/jquery.mCustomScrollbar.js' },
      ..(省略)..
    ]
  }
}
</script>
```




<br>

### ②-2 フォーム送信

### ③-. API実装

- Ajax通信は axiosを使用

※ axiosの利点<br>
axiosは、promiseベースで組まれているため、<br>
非同期処理の一連の流れをメソッドチェーンの形で書けるようになり、<br>
ネストされたコールバックのプログラムより読みやすくなる。

<br><br>

## MEMO
- httaccess と env を作成するのを忘れずに。
- blade  キー名は value.key で指定可能。 連想配列名は指定できない。
- DB_HOST は mysql(Dockerのサービス名) を指定し、コマンド類はコンテナ内で行う。
- 「クラスが存在しない」等のエラーが出た場合は、 composer dump-autoload を打ち、クラスを呼び出せるようにする。
- テーブル構造の変更
- デフォルトでは変更を行うことができないため、下記を打ち追加。
```
$ composer require doctrine/dbal
$ php artisan make:migration change_forms_table --table forms
```
- jsファイル読み込みで「defer」を付けると、html読み込みが完了した後に実行されるようになる。
- apiのミドルウェアグループには、セッションやクッキー、CSRF トークンを扱うミドルウェアが含まれていない。
```
app/Providers/RouteServiceProvider.php
```
- jQueryをimportするようにした際に出現した不具合
```
$.fn.load = function(){
	// 変更前： $(window).load(function(){
```