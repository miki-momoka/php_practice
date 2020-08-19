# 【課題】メールフォーム　

## ～ 概要 ～

Laravelで構築しました。<br>
フォームURL：http://localhost/form/input

## ～ ブラッシュアップ 8/27 ～

### ① 前回で学んだ部分を追加

- その他選択時のバリデーション追加<br>
- バリデーション前の文字整形

<br><br>

### ② DB/テーブル作成

■ マイグレーション<br>
コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行
(テーブル名は複数形にする。)

```
$ php artisan make:migration create_forms_table<br>
$ docker exec -it php_practice_app_1 bash<br>
$ php artisan migrate
```

<br>

#### ②-1 DBでマスター管理

■ シーダー作成・実行

```
$ php artisan make:seeder PrefecturesTableSeeder<br>
$ php artisan db:seed
```

 【database/seeds/DatabaseSeeder.php 内 ↓】<br>
```
$this->call(PrefecturesTableSeeder::class);<br>
```

■ マスターをDB管理に変更<br>
テーブルを操作するモデルを作成
```
$ php artisan make:model Prefectures
```

コントローラ内

```
use App\Prefecture;<br>
$master_pref = Prefecture::all()->toArray();
```

<br>

#### ②-2. フォーム登録

1) Formモデル作成<br>
2) 新しくインスタンスを作成。<br>
3) $request からフォームの値を取得。<br>
4) モデルの save メソッドを使用すると、created_at と updated_at が自動に入ってくれる。

■ 二重送信

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


- マルチページアプリケーション と シングルページアプリケーションの違い<br>
	- マルチ：ブラウザの画面要求（GET）またはデータ送信（POST）に対してHTMLを返却する。<br>
	- シングル：最初に画面を表示し、その後はAjaxでデータの要求や送信がされる。

- Vue Router導入
```
$ npm install -D vue-router
```

<br>

#### ③-1. SPA化
※ 参考資料 https://www.hypertextcandy.com/vue-laravel-tutorial-introduction/

- URL一覧
	- "/" ・・・ 　　　　　　　最初の画面。入力画面を表示
	- "/api/master" ・・・　　マスター情報を取得
	- "/api/validate" ・・・　サーバ側バリデーション処理
	- "/api/regist" ・・・　　フォーム登録処理

- ルートコンポーネント・・・コンポーネントツリーの頂上に位置するコンポーネント
```
resources/js/App.vue
```

- ページコンポーネント・・・切り替わるHTML部分
```
resources/js/pages/input.vue
resources/js/pages/confirm.vue
```

- ルーティングの定義
```
resources/js/router.js
```
=> app.jsに、ルートコンポーネントとルーティング定義をインポート

- web.php内で、api以外のURLは、view内のform/indexを表示するようにしており、<br>
そのindex.blade.phpでapp.jsを読み込み、要素表示するようにしている。

<br>

#### ③-2. API実装

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
$ composer require doctrine/dbal<br>
$ php artisan make:migration change_forms_table --table forms
```
- jsファイル読み込みで「defer」を付けると、html読み込みが完了した後に実行されるようになる。
- apiのミドルウェアグループには、セッションやクッキー、CSRF トークンを扱うミドルウェアが含まれていない。
```
app/Providers/RouteServiceProvider.php
```
