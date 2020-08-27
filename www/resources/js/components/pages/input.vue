<template>
  <section id="contentsBox" class="form input">
    <div class="inner">
      <form method="post" class="clr" action="confirm">
        <h2 class="ttl2">
          送付先入力フォーム
        </h2>
        <p class="lead">当選賞品の送付先をご入力ください。 
          <span class="note">ご入力いただいた情報に誤りがございますと、賞品が届かない場合がございますのでご注意ください。</span>
        </p>
        <div class="formBox">
          <table>
            <tr>
              <th>
                <b>お名前</b>
              </th>
              <td>
                <p>
                  <span>姓</span>
                  <input type="text" name="name_sei" value="" placeholder="山田" class="size1" maxlength="12">
                </p>
                <p>
                  <span>名</span>
                  <input type="text" name="name_mei" value="" placeholder="太郎" class="size1" maxlength="12">
                </p>
                <span>
   
                </span>
              </td>
            </tr>
            <tr>
              <th>
                <b>フリガナ</b>
              </th>
              <td >
                <p>
                  <span>セイ</span>
                  <input type="text" name="kana_sei" value="" placeholder="ヤマダ" class="size1" maxlength="12">
                </p>
                <p>
                  <span>メイ</span>
                  <input type="text" name="kana_mei" value="" placeholder="タロウ" class="size1" maxlength="12">
                </p>
                <span>

                </span>
              </td>
            </tr>
            <tr>
              <th>
                <b>住所</b>
              </th>
              <td class="custom ">
                <ul>
                  <li class="zip">
                    <span class="mark">〒</span>
                    <input type="text" name="zip[1]" value="" placeholder="123" class="size2" maxlength="3"  title="半角数字を入力してください">
                    <span class="bar">-</span>
                    <input type="text" name="zip[2]" value="" placeholder="1234" class="size1" maxlength="4"  title="半角数字を入力してください">
                  </li>
                  <li>
                    <span>都道府県</span>
                    <select name="prefecture">
                      <option value="0">選択してください</option>
                        <option value="" ></option>
                    </select>
                  </li>
                  <li>
                    <span>市区町村番地</span>
                    <input type="text" name="address" value="" placeholder="○○市△△町1-1 " class="size3" maxlength="90">
                  </li>
                  <li>
                    <span>建物名・号室</span>
                    <input type="text" name="building" value="" placeholder="□□マンション　101号室" class="size3" maxlength="90">
                  </li>
                </ul>
                <span>
 
                </span>
              </td>
            </tr>
            <tr>
              <th>
                <b>メールアドレス</b>
              </th>
              <td class="email ">
                <input type="text" name="email" value="" placeholder="test@gpol.co.jp" class="size3">
                <span>
                  
                </span>
              </td>
            </tr>
            <tr>
              <th>
                <b>電話番号</b>
              </th>
              <td class="tel">
                <input type="text" name="tel[1]" value="" placeholder="06" class="size4" maxlength="4"  title="半角数字を入力してください">
                <span class="bar">-</span>
                <input type="text" name="tel[2]" value="" placeholder="0000" class="size4" maxlength="4"  title="半角数字を入力してください">
                <span class="bar">-</span>
                <input type="text" name="tel[3]" value="" placeholder="0000" class="size4" maxlength="4"  title="半角数字を入力してください">
                <span>
      
                </span>
              </td>
            </tr>
          </table>
          <div class="formQuestionnaire">
            <h3 class="formQuestionnaireTtl">
              <span>簡単なアンケートへのご協力を
                <br class="sp">お願いします
              </span>
            </h3>
            <dl class="formQuestionnaireBox">
              <dt>
                <b>あなたは、このキャンペーンをどこでお知りになりましたか</b>
              </dt>
              <dd>
                <ul class="formList formList02">

                </ul>
                <div class="formInputOther">
                  <input name="q1_other" type="text" value="">
                </div>
                <span>
   
                </span>
              </dd>
            </dl>
            <dl class="formQuestionnaireBox">
              <dt>
                <b>この商品を購入した理由をお教えください（当てはまるものを全てお選びください）</b>
              </dt>
              <dd >
                <ul class="formList formList02">

                </ul>
                <div class="formInputOther">
                  <input name="q2_other" type="text" value="">
                </div>
                <span>

                </span>
              </dd>
            </dl>
            <dl class="formQuestionnaireBox">
              <dt>
                <b>ご意見・ご感想がございましたら、ご自由にご記入ください。</b>
              </dt>
              <dd >
                <textarea name="q3" placeholder="ご意見・ご感想がございましたら、400字以内でご記入ください"></textarea>
                <span>
                 
                </span>
              </dd>
            </dl>
          </div>
        </div>
        <h3>キャンペーン利用規約
          <br class="sp">および注意事項
        </h3>
        <div class="terms">
          <dl class="scroll">
            <dt>キャンペーンについて</dt>
            <dd>
              <ul class="listDot">
                <li>応募期間：2019年11月1日（金）～2020年1月31日（金）</li>
                <li>賞品は送付先を送信いただいてから、
                  <b class="red">2ヶ月以内に順次発送いたします。</b>
                </li>
                <li>パッケージにキャンペーンシールが貼ってある商品がキャンペーン対象商品となります。</li>
                <li>2019年7月1日（月）～9月30日（月）に開催しました
                  <b class="red">「アーモンドのある暮らしキャンペーン」のシリアルコードは登録できません</b>のでご注意ください。
                  <br>なお、前回お使いのIDとパスワードは引き続きお使いいただけます。
                </li>
                <li>応募期間中であっても、対象商品がなくなり次第、終了とさせていただきます。</li>
                <li>本キャンペーンへのご参加はキャンペーンサイトからのご応募に限ります。</li>
                <li>同一のシリアルコードを使った複数回のポイント登録はできません。</li>
                <li>期間中、何回でもご応募いただけますが、同一賞品の当選権利はお一人様1回のみとさせていただきます。</li>
                <li>
                  <b class="red">マイページでの応募のご利用は2020年1月31日(金)23：59まで</b>となります。
                </li>
                <li>
                  <b class="red">残ったポイントは2020年1月31日（金）23：59で消滅します</b>ので、お早めにご応募ください。
                </li>
                <li>本キャンペーンへのご参加は、日本在住の方に限らせていただきます。</li>
                <li>賞品の仕様は予告なく変わる可能性がございます。</li>
                <li>ご応募の途中でインターネット接続が途切れてしまった場合に、ご応募が無効となる場合がございます。</li>
                <li>ご応募に関して不正な行為があった場合、当選を取り消させていただく場合がございます。</li>
                <li>2020年3月31日（火）を過ぎても賞品が届かない場合は、キャンペーン事務局(
                  <a href="tel:0000000000" class="sp">00-0000-0000</a>
                  <span class="tel pc">00-0000-0000</span>)までお問い合わせください。
                </li>
                <li>本キャンペーンの応募にかかるインターネット接続料および通信費は応募者のご負担となります。</li>
                <li>インターネット接続が十分に確保されている状態でご応募ください。</li>
                <li>主催者側は、キャンペーン詳細確認に伴う使用機器・通信における障害、損傷及び応募時の不具合等についての責任は一切負いかねます。</li>
                <li>社員ならびに関係者は本キャンペーンに応募できません。</li>
                <li>キャンペーン終了後でも対象商品が販売されている場合がございますが、ご応募はキャンペーン期間中のみの受付とさせていただきます。</li>
                <li>ご入力いただいた住所が不明、連絡不能などの理由により賞品がお届けできない場合は、当選の権利を無効とさせていただきます。</li>
                <li>賞品の交換、換金、返品等には応じかねますので、予めご了承ください。</li>
                <li>当選の権利はご本人様のもので、第三者に譲渡・換金はできません。</li>
                <li>賞品のお届け先は、日本国内に限らせていただきます。</li>
                <li>シリアルコードはキャンペーン終了まで大切に保管してください。</li>
                <li>抽選に関するお問い合わせはお受けできません。</li>
                <li>配送中の紛失等の事故については、当社では責任を負いかねますので、ご了承ください。</li>
                <li>賞品の配送に関しては宅配業者などを利用させていただきます。</li>
                <li>賞品のお届け日時のご指定はできません。</li>
              </ul>
            </dd>
            <dt>推奨環境</dt>
            <dd>
              <ul class="listDot">
                <li>本キャンペーンサイトの推奨環境は、以下となります。推奨環境以外の端末ではご応募いただけない場合がございます。</li>
              </ul>
              <dl class="tSite">
                <dt>［PC］</dt>
                <dd>Windows：Internet Explorer11、Edge 最新版、Google Chrome 最新版、Mozilla Firefox 最新版</dd>
                <dd>Macintosh：Safari 最新版</dd>
              </dl>
              <dl class="tSite">
                <dt>［スマートフォン・タブレットの場合］</dt>
                <dd>iOS 10.0以上 / Safari 最新版</dd>
                <dd>Android 5.0以上 / Google Chrome 最新版</dd>
              </dl>
            </dd>
            <dt>その他</dt>
            <dd>
              <ul class="listDot">
                <li>個人情報詳細につきましては「
                  <a href="#">個人情報保護について</a>」をご参照ください。
                </li>
                <li>ご入力いただいたお客様の個人情報は、住所・氏名・電話番号は賞品発送業務の為、生年月日・性別の項目に関しては商品の購買実態調査の為に利用させていただきます。</li>
                <li>個人情報はお客様の同意なしに、業務委託先以外の第三者に開示・提供することはありません。（法令などにより開示を求められた場合を除く）</li>
              </ul>
            </dd>
          </dl>
        </div>
        <p class="check ">
          <label for="checkPolicy">
            <input name="check_policy" id="checkPolicy" type="checkbox" value="1" />
            <span>
              <b>上記規約に同意する</b>
            </span>
          </label>
          <span>
    
          </span>
        </p>
        <p class="btn confirm">
          <button type="submit" disabled>
            <span>確認画面へ</span>
          </button>
        </p>
      </form>
    </div>
    <!-- /.inner -->
  </section>
</template>

<script>
export default {
  head: {
    title:{inner: '入力画面', separator: '|' , complement: 'Laravelメールフォーム'},
    link: [
      { rel: 'stylesheet' , href: 'common/css/jquery.mCustomScrollbar.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'form/css/entry_pc.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'form/css/entry_sp.css' , media: 'all' },
    ],
    script: [      
      { type: 'text/javascript', src: 'common/js/jquery.mCustomScrollbar.js' ,body: true },
      { type: 'text/javascript', src: 'form/js/entry_form.js' ,body: true },
      { type: 'text/javascript', src: 'form/js/entry_form_input.js' ,body: true },
    ]
  }
}
</script>
