<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\MailformRequest;

class FormController extends Controller
{
    // 入力画面
    public function input( Request $request )
    {
        // print "<pre>";
        // print_r($request->session()->all());die();
        // q1,q2,pref マスターデータ
        $master = $this->master();
        
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

        return view('form.complete');
    }

    function master(){
        $master['q1'][1] = "店頭装飾を見つけて";
        $master['q1'][2] = "商品についている、シールを見て";
        $master['q1'][3] = "ホームページで";
        $master['q1'][4] = "ブログやSNS、ネットニュースなどの記事で";
        $master['q1'][5] = "家族・友人からの紹介";
        $master['q2'][1] = "キャンペーン中のマグカップが欲しかったから";
        $master['q2'][2] = "アーモンドの健康・美容効果に期待して";
        $master['q2'][3] = "味が好きだから";
        $master['q2'][4] = "スーパーや街中での試飲会をしていたから";
        $master['q2'][5] = "特売していたから";
        $master['q2'][6] = "知人や家族にすすめられたから";
        $master['q2'][7] = "その他";
        $master['pref'] = config('pref');
        return $master;
    }
}
