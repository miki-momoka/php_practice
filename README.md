# 【課題】メールフォーム　

## 概要

Laravelで構築しました。

# form URL
http://localhost/form/input

## 夏季休暇 

### 前回で学んだ部分を追加

✔︎ その他選択時のバリデーション追加
✔︎ バリデーション前の文字整形

### DB/テーブル作成

■マイグレーション
コンテナに入り、www直下(artisanがある場所)へ移動してからマイグレーション実行

>$ php artisan make:migration create_form_table 

>$ docker exec -it mailform_laravel_app_1 bash  

>$ php artisan migrate

### DBでマスター管理

■シーダー作成・実行
> php artisan make:seeder PrefectureTableSeeder

database/seeds/DatabaseSeeder.php 内 ↓
> $this->call(PrefectureTableSeeder::class);

> php artisan db:seed

### フォーム登録


### メール送信


### vue
