<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $params = [
            [ 'label' => '北海道'],
            [ 'label' => '青森県'], 
            [ 'label' => '岩手県'], 
            [ 'label' => '宮城県'],
            [ 'label' => '秋田県'], 
            [ 'label' => '山形県'], 
            [ 'label' => '福島県'], 
            [ 'label' => '茨城県'],
            [ 'label' => '栃木県'], 
            [ 'label' => '群馬県'], 
            [ 'label' => '埼玉県'], 
            [ 'label' => '千葉県'],
            [ 'label' => '東京都'], 
            [ 'label' => '神奈川県'], 
            [ 'label' => '新潟県'], 
            [ 'label' => '富山県'],
            [ 'label' => '石川県'], 
            [ 'label' => '福井県'], 
            [ 'label' => '山梨県'], 
            [ 'label' => '長野県'], 
            [ 'label' => '岐阜県'], 
            [ 'label' => '静岡県'], 
            [ 'label' => '愛知県'], 
            [ 'label' => '三重県'],
            [ 'label' => '滋賀県'], 
            [ 'label' => '京都府'], 
            [ 'label' => '大阪府'], 
            [ 'label' => '兵庫県'],
            [ 'label' => '奈良県'], 
            [ 'label' => '和歌山県'], 
            [ 'label' => '鳥取県'], 
            [ 'label' => '島根県'],
            [ 'label' => '岡山県'], 
            [ 'label' => '広島県'], 
            [ 'label' => '山口県'], 
            [ 'label' => '徳島県'],
            [ 'label' => '香川県'],
            [ 'label' => '愛媛県'],
            [ 'label' => '高知県'], 
            [ 'label' => '福岡県'],
            [ 'label' => '佐賀県'], 
            [ 'label' => '長崎県'], 
            [ 'label' => '熊本県'], 
            [ 'label' => '大分県'],
            [ 'label' => '宮崎県'], 
            [ 'label' => '鹿児島県'], 
            [ 'label' => '沖縄県']
        ];

        foreach ($params as $param) {
            DB::table('prefecture')->insert($param);
        }
    }
}
