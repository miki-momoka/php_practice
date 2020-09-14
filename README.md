# 【課題】メールフォーム　

## ～ 概要 ～

Laravelで構築しました。

<br>

### ① DB/テーブル作成

#### ■ マイグレーション [database/migrations] (テーブルの定義)
- コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行(テーブル名は複数形にする。)

```
$ php artisan make:migration create_forms_table
$ docker exec -it php_practice_app_1 bash
$ php artisan migrate
```

#### ■ シーダー作成・実行 [database/seeds] (テーブルに行データ追加)

```
$ php artisan make:seeder PrefecturesTableSeeder<br>
$ php artisan db:seed
```

 【database/seeds/DatabaseSeeder.php 内で呼ぶ ↓】<br>
```
$this->call(PrefecturesTableSeeder::class);
```

#### ■ モデル作成 [app/]
- テーブルを操作するモデルを作成 [app/] DBと連携する。1テーブルに1モデル。
```
$ php artisan make:model Prefectures
```

- コントローラ内
```
use App\Prefecture;
$master_pref = Prefecture::all()->toArray();
```

### ② フォーム登録

1) Formモデル作成<br>
2) 新しくインスタンスを作成。<br>
3) $request からフォームの値を取得。<br>
4) モデルの save メソッドを使用すると、created_at と updated_at が自動に入ってくれる。

#### ■ 二重送信対策

送信完了後に
```
$request->session()->regenerateToken();
```

- 419エラーページが表示される。 <br>
リダイレクト処理したい場合は、\app\Exceptions\Handler.php のrender内に追記 

<br>

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


#### ※ マルチページアプリケーション と シングルページアプリケーションの違い
- マルチ：ブラウザの画面要求（GET）またはデータ送信（POST）に対してHTMLを返却する。
- シングル：最初に画面を表示し、その後はAjaxでデータの要求や送信がされる。

<br>

### ④ SPA化

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
  - "/api/master"    ・・・  マスター情報を取得 (※)
  - "/api/validate"  ・・・  サーバ側バリデーション処理 (※)
  - "/api/regist"    ・・・  フォーム登録処理 (※)
(※ 未実装)

#### ■ ルートコンポーネント [ resources/js/components/App.vue ]
- コンポーネントツリーの頂上に位置するコンポーネント
- "router-view" 内に、ルートとマッチしたコンポーネントが表示される。

#### ■ ページコンポーネント [ resources/js/components/pages/〇〇.vue ]
- "template" 内に、ページによって切り替える内容を記述する。

#### ■ ルーティングの定義 [ resources/js/router.js ]
- VueRouterインスタンスを作成
- ページ(url)に対して、表示するコンポーネントを設定

#### ■ ルーティング定義を読み込む [ resources/js/app.js ]
- app.jsに、router.jsで定義したルーティング定義をインポート
※ web.php内で、api以外のURLは、view内のform/index（views/index.blade.php）を表示するようにしており、<br>
そのindex.blade.phpでapp.jsを読み込み、要素表示するようにしている。

#### ☆ vue-head でmetaの設定・切り替え  
- [ resources/js/app.js ]
Vueインスタンスを作成。「head」要素内に、全ページ共通のhead内の項目を設定していく。

- [ resources/js/components/pages/〇〇.vue ]
vueファイル下部にscriptタグを作成し、ページごとに切り替えるhead要素を記述。
単一ファイルコンポーネントでscriptを使用する際は、export default で囲む必要がある。

<br>

### ⑤ API実装
#### ■ Ajax通信は axiosを使用

- ※ axiosの利点<br>
axiosは、promiseベースで組まれているため、<br>
非同期処理の一連の流れをメソッドチェーンの形で書けるようになり、<br>
ネストされたコールバックのプログラムより読みやすくなる。

<br>

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