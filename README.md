# 【課題】メールフォーム　
Laravel + Vue.jsで実装

<br>

## ① DB/テーブル作成

### ■ マイグレーション [database/migrations] (テーブルの定義)
- コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行(テーブル名は複数形にする。)

```
$ php artisan make:migration create_forms_table
$ docker exec -it php_practice_app_1 bash
$ php artisan migrate
```

### ■ シーダー作成・実行 [database/seeds] (テーブルに行データ追加)

```
$ php artisan make:seeder PrefecturesTableSeeder<br>
$ php artisan db:seed
```

 【database/seeds/DatabaseSeeder.php 内で呼ぶ ↓】<br>
```
$this->call(PrefecturesTableSeeder::class);
```

### ■ モデル作成 [app/]
- テーブルを操作するモデルを作成 [app/] DBと連携する。1テーブルに1モデル。
```
$ php artisan make:model Prefectures
```

- コントローラ内
```
use App\Prefecture;
$master_pref = Prefecture::all()->toArray();
```

## ② フォーム登録

1) Formモデル作成<br>
2) 新しくインスタンスを作成。<br>
3) $request からフォームの値を取得。<br>
4) モデルの save メソッドを使用すると、created_at と updated_at が自動に入ってくれる。

### ■ 二重送信対策

送信完了後に
```
$request->session()->regenerateToken();
```

- 419エラーページが表示される。 <br>
リダイレクト処理したい場合は、\app\Exceptions\Handler.php のrender内に追記 

<br>

## ③ vue導入
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


### ※ マルチページアプリケーション と シングルページアプリケーションの違い
- マルチ：ブラウザの画面要求（GET）またはデータ送信（POST）に対してHTMLを返却する。
- シングル：最初に画面を表示し、その後はAjaxでデータの要求や送信がされる。

<br>

## ④ SPA化

※ 参考資料 https://www.hypertextcandy.com/vue-laravel-tutorial-introduction/

- Vue Router導入
```
$ npm install -D vue-router
```

- Vue Routerを定義 (app.js内)
```
import VueRouter from 'vue-router';
Vue.use(VueRouter);
```

- URL一覧
	- "/"              ・・・  最初の画面。入力画面を表示
  - "/confirm"       ・・・　確認画面
  - "/api/master"    ・・・  マスター情報を取得
  - "/api/validate"  ・・・  サーバ側バリデーション処理 (※)
  - "/api/regist"    ・・・  フォーム登録処理 (※)
(※ 未実装)

### ■ ルートコンポーネント [ resources/js/components/App.vue ]
- コンポーネントツリーの頂上に位置するコンポーネント
- "router-view" 内に、ルートとマッチしたコンポーネントが表示される。

### ■ ページコンポーネント [ resources/js/components/pages/〇〇.vue ]
- "template" 内に、ページによって切り替える内容を記述する。

### ■ ルーティングの定義 [ resources/js/router.js ]
- VueRouterインスタンスを作成
- ページ(url)に対して、表示するコンポーネントを設定

### ■ ルーティング定義を読み込む [ resources/js/app.js ]
- app.jsに、router.jsで定義したルーティング定義をインポート<br>
※ web.php内で、api以外のURLは、view内のform/index（views/index.blade.php）を表示するようにしており、<br>
そのindex.blade.phpでapp.jsを読み込み、要素表示するようにしている。

### ☆ vue-head でmetaの設定・切り替え  
- [ resources/js/app.js ]
Vueインスタンスを作成。「head」要素内に、全ページ共通のhead内の項目を設定していく。

- [ resources/js/components/pages/〇〇.vue ]
vueファイル下部にscriptタグを作成し、ページごとに切り替えるhead要素を記述。<br>
単一ファイルコンポーネントでscriptを使用する際は、export default で囲む必要がある。

<br>


## ⑤ マスターデータ表示
### ※ Ajax通信は axiosを使用 [ resources/js/components/pages/〇〇.vue ]
- ページコンポーネント内で通信、表示(表示箇所がページコンポーネント内のため？)

- API接続をどのライフサイクルフックで行うか
  - created => インスタンスの初期化が済んで props や computed にアクセスできる
  - mounted => created + DOMにアクセスできる

### ■ マスターデータをAPIから取得 [ resources/js/components/pages/〇〇.vue ]
- dataに取得した値をセットし、inputタグを描画
※v-modelの値は、dataで初期値を設定しておく必要がある。

- 取得して表示できるまでの間は要素を非表示にしておく。
vueファイル側で v-show で出し分けする。
v-show => DOMに保持される。cssによって表示/非表示を切り替える。v-if => DOMにも表示されない。

- フェードイン・アウト
アニメーションを付与したい箇所をtransitionタグで囲み、出し分けする部分にv-if(v-show)を使用
trueならフェードイン・falseならフェードアウトする。
default.cssに、.v-enter-active,.v-enter等のスタイルを追加
参考:https://qiita.com/masaakikunsan/items/8ff141ebdcdd52c762fb  

<br>

## ⑥ バリデーション（Vue） [ resources/js/components/pages/input.vue ]
### ■ computed(算出プロパティ)内で関数作成
- 算出プロパティは、リアクティブな依存関係が更新されたときにだけ再評価される。
- validation()内で、バリデーションを定義。
- watchプロパティだと一つの要素しか監視できない。

### ■ エラー表示
- 条件付きレンダリング(v-if)で validation.name を見て、data定義したerrorMsgを表示する。

### ■ 初期状態でエラーを表示させないように
- dataの初期値は、「null」で設定。
- バリデーションでは、「''(空)」だったら未入力エラーにする。

## ⑥ 確認画面
### ■ データ保持  親[ resources/js/components/App.vue ]　子[ resources/js/components/pages/input(confirm).vue ]
- 親コンポーネント(App.vue)内　data()でform内を定義。
- 子コンポーネント(input.vue & confirm.vue)内のpropsで値を引き継ぐ。
- 親子間でデータを受け渡ししないといけない。formプロパティを親が更新するように下記を記述。<br>

```
<router-view v-bind:form.sync="form"></router-view>
```

## ⑦ DB登録 (サーバ側バリデーション)


## 

### ■ VeeValidateを使ってみる
https://qiita.com/youdie/items/417ed2df1bcb6a60001c

vue-head ルート変わった際に更新されるように

api使うのは、確認から完了へ行くとき
=> エラー出たらinputへ移動

<br>

## その他MEMO
### Laravel
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

- apiのミドルウェアグループには、セッションやクッキー、CSRF トークンを扱うミドルウェアが含まれていない。
```
app/Providers/RouteServiceProvider.php
```

### Vue.js
- jQueryをimportするようにした際に出現した不具合
```
$.fn.load = function(){
	// 変更前： $(window).load(function(){
```

- 子コンポーネントでは、data属性などを上書きして設定できないので、関数化する必要がある。
```
data: function() {
  return {
    q1Master: []
  }
},
```

- axiosなどの関数をメソッド内で使用する時は、axios内thisのスコープの範囲外のため気をつける。
- 「利用規約」部分のentry_form_input.jsの不具合
  - スクロール部分を、v-showでDOMを取得できるように。
  - entry_form_input.jsを読み込む際に、deferを有効にしてDOM生成後に処理するように。
