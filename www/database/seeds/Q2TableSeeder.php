<?php

use Illuminate\Database\Seeder;

class Q2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [ 'label' => 'キャンペーン中のマグカップが欲しかったから'],
            [ 'label' => 'アーモンドの健康・美容効果に期待して'], 
            [ 'label' => '味が好きだから'], 
            [ 'label' => 'スーパーや街中での試飲会をしていたから'],
            [ 'label' => '特売していたから'], 
            [ 'label' => '知人や家族にすすめられたから'], 
            [ 'label' => 'その他'], 
        ];
        
        foreach ($params as $param) {
            DB::table('q2')->insert($param);
        }
    }
}
