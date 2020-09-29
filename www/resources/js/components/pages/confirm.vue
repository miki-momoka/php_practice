<template>
  <section id="contentsBox" class="form confirm">
    <transition>
      <div class="inner" v-show="input">
        <form class="clr">
          <h2 class="ttl2">送付先入力フォーム</h2>
          <p class="lead">
            以下内容で間違いないかご確認いただき、<br class="sp">送信ボタンを押してください。
          </p>

          <div class="formBox">
            <table>
              <tr class="error">
                <th><b>お名前</b></th>
                <td>{{form.name_sei}} {{form.name_mei}}</td>
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
    </transition>
  </section>
</template>

<script>

export default {
  data: function() {
    return {
      input: false,
    }
  },
  props: {
    form: Object
  },
  mounted: function(){
    // ※"this"のスコープ範囲はsetTimeout内では切れている 
    let self = this;
    setTimeout(function(){
      self.input  = true;
    },500)
  },
  head: {
    title:{inner: '送付先確認', separator: '|' , complement: 'Laravelメールフォーム'},
    link: [
      { rel: 'stylesheet' , href: 'form/css/entry_pc.css' , media: 'all' ,defer: true},
      { rel: 'stylesheet' , href: 'form/css/entry_sp.css' , media: 'all' ,defer: true},
      { rel: 'stylesheet' , href: 'common/css/default.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'common/css/base_pc.css' , media: 'all' },
      { rel: 'stylesheet' , href: 'common/css/base_sp.css' , media: 'all' },
    ],
  }
}
</script>