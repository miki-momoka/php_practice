# 【課題】メールフォーム　

## 概要

Laravelで構築しました。

# form URL
http://localhost/form/input

## 夏季休暇 

### 1. 前回で学んだ部分を追加

✔︎ その他選択時のバリデーション追加
✔︎ バリデーション前の文字整形

### 2. DB/テーブル作成

■ マイグレーション
コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行
(テーブル名は複数形にする。)

>$ php artisan make:migration create_forms_table 

>$ docker exec -it mailform_laravel_app_1 bash  

>$ php artisan migrate

### 3. DBでマスター管理

■ シーダー作成・実行
> php artisan make:seeder PrefecturesTableSeeder

database/seeds/DatabaseSeeder.php 内 ↓
> $this->call(PrefecturesTableSeeder::class);

> php artisan db:seed

■ マスターをDB管理に変更
テーブルを操作するモデルを作成
> php artisan make:model Prefectures

コントローラ内
> use App\Prefecture;

> $master_pref = Prefecture::all()->toArray();

### 4. フォーム登録

1) Formモデル作成

2) 新しくインスタンスを作成。

3) $request からフォームの値を取得。

4) モデルの save メソッドを使用すると、created_at と updated_at が自動に入ってくれる。

■ 二重送信

## 追加機能

### メール送信


### vue


## MEMO
・httaccess と env を作成するのを忘れずに。

・blade  キー名は value.key で指定可能。 連想配列名は指定できない。

・DB_HOST は mysql(Dockerのサービス名) を指定し、コマンド類はコンテナ内で行う。