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

<title>送付先確認</title>
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
<link rel="stylesheet" href="css/entry_pc.css" media="all">
<link rel="stylesheet" href="css/entry_sp.css" media="all">
</head>
<body>
	<div id="contentsWrap">
		<section id="mv">
			<h1>
				<img src="../common/img/img_mv.png" alt="dummy" class="pc">
				<img src="../common/img/sp/img_mv.png" alt="dummy" class="sp">
			</h1>
		</section>
		<section id="contentsBox" class="form confirm">
			<div class="inner">
				<form method="post" class="clr" action="complete">
					<input type="hidden" name="name_sei" value="{{$input->name_sei}}">
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
					<input type="hidden" name="q1" value="{{$input->q1_other}}">
					@foreach ($input->q2 as $q2)
						<input type="hidden" name="q2[]" value="{{$q2}}">
					@endforeach
					<input type="hidden" name="q1" value="{{$input->q2_other}}">
					<input type="hidden" name="q3" value="{{$input->q3}}">
					<input type="hidden" name="check_policy" value="{{$input->check_policy}}">

					@csrf
					<h2 class="ttl2">送付先入力フォーム</h2>
					<p class="lead">
						以下内容で間違いないかご確認いただき、<br class="sp">送信ボタンを押してください。
					</p>

					<div class="formBox">
						<table>
							<tr class="error">
								<th><b>お名前</b></th>
								<td>{{$input->name_sei}} {{$input->name_mei}}</td>
							</tr>
							<tr>
								<th><b>フリガナ</b></th>
								<td>{{$input->kana_sei}} {{$input->kana_mei}}</td>
							</tr>
							<tr>
								<th><b>住所</b></th>
								<td>
									〒{{$input->zip[1]}}-{{$input->zip[2]}}<br>
									{{$input->address}}<br>
									{{$input->building}}
								</td>
							</tr>
							<tr>
								<th><b>メールアドレス</b></th>
								<td>
									{{$input->email}}
								</td>
							</tr>
							<tr>
								<th><b>電話番号</b></th>
								<td>
									{{$input->tel[1]}}-{{$input->tel[2]}}-{{$input->tel[3]}}
								</td>
							</tr>
						</table>
						<div class="formQuestionnaire">
							<dl class="formQuestionnaireBox">
								<dt><b>あなたは、このキャンペーンをどこでお知りになりましたか</b></dt>
								<dd>・{{$master['q1'][$input->q1]}} @if($input->q1 == 6) ({{$input->q1_other}}) @endif</dd>
							</dl>
							<dl class="formQuestionnaireBox">
								<dt><b>この商品を購入した理由をお教えください（当てはまるものを全てお選びください）</b></dt>
								@foreach ($input->q2 as $q2)
									<dd>・{{$master['q2'][$q2]}} @if($q2 == 7) ({{$input->q2_other}}) @endif</dd>
								@endforeach
							</dl>
							<dl class="formQuestionnaireBox">
								<dt><b>ご意見・ご感想がございましたら、ご自由にご記入ください。</b></dt>
								<dd>{{$input->q3}}</dd>
							</dl>
						</div>
					</div>

					<div class="btnGroup clr">
						<p class="btn confirm"><button type="submit" name="complete" value="on"><span>送信する</span></button></p>
						<p class="btn back"><button type="submit" name="backbutton" value="on"><span>修正する</span></button></p>
					</div>
				</form>
			</div><!-- /.inner -->
		</section><!-- /#contentsBox -->
	</div><!-- /#contents_wrap -->
</body>
</html>