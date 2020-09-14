<template>
  <section id="contentsBox" class="form confirm">
    <div class="inner">
      <form method="post" class="clr" action="complete">
        <!-- <input type="hidden" name="name_sei" value="{{$input->name_sei}}">
        <input type="hidden" name="name_mei" value="{{$input->name_mei}}">
        <input type="hidden" name="kana_sei" value="{{$input->kana_sei}}">
        <input type="hidden" name="kana_mei" value="{{$input->kana_mei}}">
        <input type="hidden" name="zip[1]" value="{{$input->zip[1]}}">
        <input type="hidden" name="zip[2]" value="{{$input->zip[2]}}">
        <input type="hidden" name="prefecture" value="{{$input->prefecture}}">
        <input type="hidden" name="address" value="{{$input->address}}">
        <input type="hidden" name="building" value="{{$input->building}}">
        <input type="hidden" name="email" value="{{$input->email}}">
        <input type="hidden" name="tel[1]" value="{{$input->tel[1]}}">
        <input type="hidden" name="tel[2]" value="{{$input->tel[2]}}">
        <input type="hidden" name="tel[3]" value="{{$input->tel[3]}}">
        <input type="hidden" name="q1" value="{{$input->q1}}">
        <input type="hidden" name="q1_other" value="{{$input->q1_other}}"> -->

          <!-- <input type="hidden" name="q2[]" value="{{$q2}}">

        <input type="hidden" name="q2_other" value="{{$input->q2_other}}">
        <input type="hidden" name="q3" value="{{$input->q3}}">
        <input type="hidden" name="check_policy" value="{{$input->check_policy}}"> -->

        <h2 class="ttl2">送付先入力フォーム</h2>
        <p class="lead">
          以下内容で間違いないかご確認いただき、<br class="sp">送信ボタンを押してください。
        </p>

        <div class="formBox">
          <table>
            <tr class="error">
              <th><b>お名前</b></th>
              <td></td>
            </tr>
            <tr>
              <th><b>フリガナ</b></th>
              <td></td>
            </tr>
            <tr>
              <th><b>住所</b></th>
              <td>
                〒-<br>
                <br>
                <br>
               
              </td>
            </tr>
            <tr>
              <th><b>メールアドレス</b></th>
              <td>
                
              </td>
            </tr>
            <tr>
              <th><b>電話番号</b></th>
              <td>
                --
              </td>
            </tr>
          </table>
          <div class="formQuestionnaire">
            <dl class="formQuestionnaireBox">
              <dt><b>あなたは、このキャンペーンをどこでお知りになりましたか</b></dt>
              <dd>・</dd>
            </dl>
            <dl class="formQuestionnaireBox">
              <dt><b>この商品を購入した理由をお教えください（当てはまるものを全てお選びください）</b></dt>

                <dd>・</dd>

            </dl>
            <dl class="formQuestionnaireBox">
              <dt><b>ご意見・ご感想がございましたら、ご自由にご記入ください。</b></dt>
              <dd></dd>
            </dl>
          </div>
        </div>

        <div class="btnGroup clr">
          <p class="btn confirm"><button type="submit" name="complete" value="on"><span>送信する</span></button></p>
          <p class="btn back"><button type="submit" name="backbutton" value="on"><span>修正する</span></button></p>
        </div>
      </form>
    </div><!-- /.inner -->
  </section>
</template>

<script>

export default {
  head: {
    title:{inner: '送付先確認', separator: '|' , complement: 'Laravelメールフォーム'},
    link: [
      { rel: 'stylesheet' , href: 'form/css/entry_pc.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'form/css/entry_sp.css' , media: 'all' },
    ],
  }
}
</script>