<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\MailformRequest;

use App\Prefecture;
use App\Quest1;
use App\Quest2;
use App\Form;

class FormController extends Controller
{
    // 入力画面
    public function input( Request $request )
    {
        // print "<pre>";
        // print_r($request->session()->all());die();
        // q1,q2,pref マスターデータ
        $master = $this->master();




        

        // print "<pre>";
        // print_r($master);die();

        return view('form.input')->with('master',$master);
    }

    // 確認画面 (完了からエラーで戻ってきたとき)
    public function getConfirm(Request $request)
    {
        return redirect()->action('FormController@input');
    }

    public function postConfirm(MailformRequest $request)
    {
        // q1,q2,pref マスターデータ
        $master = $this->master();

        return view('form.confirm')->with([
            'input' => $request,
            'master' => $master,
        ]);
    }

    public function complete(MailformRequest $request)
    {
        if($request->input('backbutton') !== null){
            return redirect()->action('FormController@input')->withInput();
        }
        $master = $this->master();

        $form = new Form();
        $form->name = $request->name_sei.' '.$request->name_mei;
        $form->kana = $request->kana_sei.' '.$request->kana_mei;
        $form->address = $request->zip[1].'-'.$request->zip[2].' '.$master['pref'][$request->prefecture].' '.$request->address.' '.$request->building;
        $form->email = $request->email;
        $form->tel = $request->tel[1].$request->tel[2].$request->tel[3];
        $form->q1 = $request->q1;
        $form->q1_other = $request->q1_other;
        $q2 = '';
        foreach($request->q2 as $v){
            $q2 .= $v . ',';
        }
        $q2 = rtrim($q2,',');
        $form->q2 = $q2;
        $form->q2_other = $request->q2_other;
        $form->q3 = $request->q3;

        $form->save();

        // 二重送信対策
        $request->session()->regenerateToken();

        return view('form.complete');
    }

    // マスター取得APi
    public function apiMaster(){
        $master_pref = Prefecture::all()->toArray();
        $master_q1 = Quest1::all()->toArray();
        $master_q2 = Quest2::all()->toArray();

        $master = [];
        foreach($master_pref as $m){
            $master['pref'][$m['id']] = $m['label'];
        }
        foreach($master_q1 as $m){
            $master['q1'][$m['id']] = $m['label'];
        }
        foreach($master_q2 as $m){
            $master['q2'][$m['id']] = $m['label'];
        }
        return $master;
    }

    // バリデート
    public function confirm(MailformRequest $request){
        return $request;
    }


    // function master(){
    //     $master_pref = Prefecture::all()->toArray();
    //     $master_q1 = Quest1::all()->toArray();
    //     $master_q2 = Quest2::all()->toArray();

    //     $master = [];
    //     foreach($master_pref as $m){
    //         $master['pref'][$m['id']] = $m['label'];
    //     }
    //     foreach($master_q1 as $m){
    //         $master['q1'][$m['id']] = $m['label'];
    //     }
    //     foreach($master_q2 as $m){
    //         $master['q2'][$m['id']] = $m['label'];
    //     }

    //     // $master['pref'] = $master_pref;
    //     // $master['q1'] = $master_q1;
    //     // $master['q2'] = $master_q2;


    //     // $master['q1'][1] = "店頭装飾を見つけて";
    //     // $master['q1'][2] = "商品についている、シールを見て";
    //     // $master['q1'][3] = "ホームページで";
    //     // $master['q1'][4] = "ブログやSNS、ネットニュースなどの記事で";
    //     // $master['q1'][5] = "家族・友人からの紹介";
    //     // $master['q1'][6] = "その他";
    //     // $master['q2'][1] = "キャンペーン中のマグカップが欲しかったから";
    //     // $master['q2'][2] = "アーモンドの健康・美容効果に期待して";
    //     // $master['q2'][3] = "味が好きだから";
    //     // $master['q2'][4] = "スーパーや街中での試飲会をしていたから";
    //     // $master['q2'][5] = "特売していたから";
    //     // $master['q2'][6] = "知人や家族にすすめられたから";
    //     // $master['q2'][7] = "その他";
    //     // $master['pref'] = config('pref');
    //     return $master;
    // }
}
