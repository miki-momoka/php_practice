<?php

use Illuminate\Database\Seeder;

class Quest1sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [ 'label' => '店頭装飾を見つけて'],
            [ 'label' => '商品についている、シールを見て'], 
            [ 'label' => 'ホームページで'], 
            [ 'label' => 'ブログやSNS、ネットニュースなどの記事で'],
            [ 'label' => '家族・友人からの紹介'], 
            [ 'label' => 'その他'], 
        ];

        foreach ($params as $param) {
            DB::table('quest1s')->insert($param);
        }
    }
}
