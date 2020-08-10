<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="imagetoolbar" content="no">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">

<title>送付先入力</title>
<meta name="Keywords" content="">
<meta name="description" content="">
<meta name="Priority" value="0">
<link rel="apple-touch-icon-precomposed" href="/apple-touch-icon.png">
<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico" />
<meta property="og:title" content="">
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:site_name" content="">
<meta property="og:description" content="">
<meta property="og:image" content="">
<meta name="twitter:card" content="photo">
<meta name="twitter:image" content="">
<!--共通css-->
<link rel="stylesheet" href="../common/css/default.css" media="all">
<link rel="stylesheet" href="../common/css/base_pc.css" media="all">
<link rel="stylesheet" href="../common/css/base_sp.css" media="all">
<!--共通js-->
<script src="../common/js/jquery-1.8.3.min.js"></script>
<script src="../common/js/common.js"></script>
<!--ページ個別css-->
<link rel="stylesheet" href="../common/css/jquery.mCustomScrollbar.css" media="all">
<link rel="stylesheet" href="css/entry_pc.css" media="all">
<link rel="stylesheet" href="css/entry_sp.css" media="all">
<!--ページ個別js-->
<script src="../common/js/jquery.mCustomScrollbar.js"></script>
<script src="js/entry_form.js"></script>
<script src="js/entry_form_input.js"></script>
</head>
<body>
	<div id="contentsWrap">
		<section id="mv">
			<h1>
				<img src="../common/img/img_mv.png" alt="dummy" class="pc">
				<img src="../common/img/sp/img_mv.png" alt="dummy" class="sp">
			</h1>
		</section>
		<section id="contentsBox" class="form input">
			<div class="inner">
				<form method="post" class="clr" action="confirm">
					@csrf
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
								<td @if ($errors->has('name_sei') || $errors->has('name_mei'))class="error"@endif>
									<p>
										<span>姓</span>
										<input type="text" name="name_sei" value="{{old('name_sei')}}" placeholder="山田" class="size1" ="12">
									</p>
									<p>
										<span>名</span>
										<input type="text" name="name_mei" value="{{old('name_mei')}}" placeholder="太郎" class="size1" ="12">
									</p>
									<span>
										@if ($errors->has('name_sei'))
											<b class="errorTxt">{{$errors->first('name_sei')}}</b>
										@endif
										@if ($errors->has('name_mei'))
											<b class="errorTxt">{{$errors->first('name_mei')}}</b>
										@endif
									</span>
								</td>
							</tr>
							<tr>
								<th>
									<b>フリガナ</b>
								</th>
								<td @if ($errors->has('name_sei') || $errors->has('name_mei'))class="error"@endif>
									<p>
										<span>セイ</span>
										<input type="text" name="kana_sei" value="{{old('kana_sei')}}" placeholder="ヤマダ" class="size1" ="12">
									</p>
									<p>
										<span>メイ</span>
										<input type="text" name="kana_mei" value="{{old('kana_mei')}}" placeholder="タロウ" class="size1" ="12">
									</p>
									<span>
										@if ($errors->has('kana_sei'))
											<b class="errorTxt">{{$errors->first('kana_sei')}}</b>
										@endif
										@if ($errors->has('kana_mei'))
											<b class="errorTxt">{{$errors->first('kana_mei')}}</b>
										@endif
									</span>
								</td>
							</tr>
							<tr>
								<th>
									<b>住所</b>
								</th>
								<td class="custom @if ($errors->has('zip') || $errors->has('prefecture') || $errors->has('address') || $errors->has('building')) error @endif">
									<ul>
										<li class="zip">
											<span class="mark">〒</span>
											<input type="text" name="zip[1]" value="{{old('zip.1')}}" placeholder="123" class="size2" ="3"  title="半角数字を入力してください">
											<span class="bar">-</span>
											<input type="text" name="zip[2]" value="{{old('zip.2')}}" placeholder="1234" class="size1" ="4"  title="半角数字を入力してください">
										</li>
										<li>
											<span>都道府県</span>
											<select name="prefecture">
												<option value="0">選択してください</option>
												@foreach($master['pref'] as $key => $pref)
													<option value="{{$key}}" @if(old('prefecture') == $key) selected="selected" @endif>{{$pref}}</option>
												@endforeach
											</select>
										</li>
										<li>
											<span>市区町村番地</span>
											<input type="text" name="address" value="{{old('address')}}" placeholder="○○市△△町1-1 " class="size3" ="90">
										</li>
										<li>
											<span>建物名・号室</span>
											<input type="text" name="building" value="{{old('building')}}" placeholder="□□マンション　101号室" class="size3" ="90">
										</li>
									</ul>
									<span>
										@if ($errors->has('zip'))
											<b class="errorTxt">{{$errors->first('zip')}}</b>
										@endif
										@if ($errors->has('prefecture'))
											<b class="errorTxt">{{$errors->first('prefecture')}}</b>
										@endif
										@if ($errors->has('address'))
											<b class="errorTxt">{{$errors->first('address')}}</b>
										@endif
										@if ($errors->has('building'))
											<b class="errorTxt">{{$errors->first('building')}}</b>
										@endif
									</span>
								</td>
							</tr>
							<tr>
								<th>
									<b>メールアドレス</b>
								</th>
								<td class="email @if ($errors->has('email')) error @endif">
									<input type="text" name="email" value="{{old('email')}}" placeholder="test@gpol.co.jp" class="size3">
									<span>
										@if ($errors->has('email'))
											<b class="errorTxt">{{$errors->first('email')}}</b>
										@endif
									</span>
								</td>
							</tr>
							<tr>
								<th>
									<b>電話番号</b>
								</th>
								<td class="tel @if ($errors->has('tel')) error @endif">
									<input type="text" name="tel[1]" value="{{old('tel.1')}}" placeholder="06" class="size4" ="4"  title="半角数字を入力してください">
									<span class="bar">-</span>
									<input type="text" name="tel[2]" value="{{old('tel.2')}}" placeholder="0000" class="size4" ="4"  title="半角数字を入力してください">
									<span class="bar">-</span>
									<input type="text" name="tel[3]" value="{{old('tel.3')}}" placeholder="0000" class="size4" ="4"  title="半角数字を入力してください">
									<span>
										@if ($errors->has('tel'))
											<b class="errorTxt">{{$errors->first('tel')}}</b>
										@endif
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
								<dd @if ($errors->has('q1') || $errors->has('q1_other')) class="error" @endif>
									<ul class="formList formList02">
										@foreach($master['q1'] as $key => $q1)
											<li>
												<label>
													<input name="q1" type="radio" value="{{$key}}" @if (old('q1') == $key) checked="checked" @endif>
													<span>{{$q1}}</span>
												</label>
											</li>
										@endforeach
									</ul>
									<div class="formInputOther">
										<input name="q1_other" type="text" value={{old('q1_other')}}>
									</div>
									<span>
										@if ($errors->has('q1'))
											<b class="errorTxt">{{$errors->first('q1')}}</b>
										@endif
										@if ($errors->has('q1_other'))
											<b class="errorTxt">{{$errors->first('q1_other')}}</b>
										@endif
									</span>
								</dd>
							</dl>
							<dl class="formQuestionnaireBox">
								<dt>
									<b>この商品を購入した理由をお教えください（当てはまるものを全てお選びください）</b>
								</dt>
								<dd @if ($errors->has('q2') || $errors->has('q2_other')) class="error" @endif>
									<ul class="formList formList02">
										@foreach($master['q2'] as $key => $q2)
											<li>
												<label>
													<input name="q2[]" type="checkbox" value="{{$key}}" @if ((old('q2') !== null ) && in_array($key,old('q2'))) checked="checked" @endif>
													<span>{{$q2}}</span>
												</label>
											</li>
										@endforeach
									</ul>
									<div class="formInputOther">
										<input name="q2_other" type="text" value={{old('q2_other')}}>
									</div>
									<span>
										@if ($errors->has('q2'))
											<b class="errorTxt">{{$errors->first('q2')}}</b>
										@endif
										@if ($errors->has('q2_other'))
											<b class="errorTxt">{{$errors->first('q2_other')}}</b>
										@endif
									</span>
								</dd>
							</dl>
							<dl class="formQuestionnaireBox">
								<dt>
									<b>ご意見・ご感想がございましたら、ご自由にご記入ください。</b>
								</dt>
								<dd @if ($errors->has('q3')) class="error" @endif>
									<textarea name="q3" placeholder="ご意見・ご感想がございましたら、400字以内でご記入ください">{{old('q3')}}</textarea>
									<span>
										@if ($errors->has('q3'))
											<b class="errorTxt">{{$errors->first('q3')}}</b>
										@endif
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
					<p class="check @if ($errors->has('check_policy')) error @endif">
						<label for="checkPolicy">
							<input name="check_policy" id="checkPolicy" type="checkbox" value="1" />
							<span>
								<b>上記規約に同意する</b>
							</span>
						</label>
						<span>
							@if ($errors->has('check_policy'))
								<b class="errorTxt">{{$errors->first('check_policy')}}</b>
							@endif
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
		<!-- /#contentsBox -->
	</div>
	<!-- /#contents_wrap -->
</body>
</html>