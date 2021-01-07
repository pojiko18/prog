<html>
<head>
<meta charset="utf-8">
<title>Ｊリーグ観戦に関するアンケート</title>

<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="./sp.css">
</head>
<body>
<header>Ｊリーグ観戦に関するアンケート</header>	
<main>
<section class="sec">
<p>このアンケートはツイッターネーム「ポジ子（@pojibucho）」がプログラミングスクールの課題のために作ったものです。</p>
<br>
<p>ただ、オンライン観戦について興味があり、本気でアンケートを取ってみたいという気持ちから作ってみました！</p>
<p>「Ｊリーグ観戦」について教えていただければ幸いです。ご協力よろしくお願いします！</p>

<p class="more">※Ｊリーグ観戦だけで、ルヴァンやＡＣＬ、天皇杯などは含めないでください。</p>
</section>
	

<form action="write.php" method="post">
	<p>ニックネーム: <input type="text" name="name"></p>
	<p>年齢： <input type="text" name="age"></p>
	<p>性別：<select name="sex">
	<option value="男性">男性</option>
	<option value="女性">女性</option></select> </p>
	<p>居住地：<select name="pref_name">
<option value="" selected>都道府県</option>
<option value="北海道">北海道</option>
<option value="青森県">青森県</option>
<option value="岩手県">岩手県</option>
<option value="宮城県">宮城県</option>
<option value="秋田県">秋田県</option>
<option value="山形県">山形県</option>
<option value="福島県">福島県</option>
<option value="茨城県">茨城県</option>
<option value="栃木県">栃木県</option>
<option value="群馬県">群馬県</option>
<option value="埼玉県">埼玉県</option>
<option value="千葉県">千葉県</option>
<option value="東京都">東京都</option>
<option value="神奈川県">神奈川県</option>
<option value="新潟県">新潟県</option>
<option value="富山県">富山県</option>
<option value="石川県">石川県</option>
<option value="福井県">福井県</option>
<option value="山梨県">山梨県</option>
<option value="長野県">長野県</option>
<option value="岐阜県">岐阜県</option>
<option value="静岡県">静岡県</option>
<option value="愛知県">愛知県</option>
<option value="三重県">三重県</option>
<option value="滋賀県">滋賀県</option>
<option value="京都府">京都府</option>
<option value="大阪府">大阪府</option>
<option value="兵庫県">兵庫県</option>
<option value="奈良県">奈良県</option>
<option value="和歌山県">和歌山県</option>
<option value="鳥取県">鳥取県</option>
<option value="島根県">島根県</option>
<option value="岡山県">岡山県</option>
<option value="広島県">広島県</option>
<option value="山口県">山口県</option>
<option value="徳島県">徳島県</option>
<option value="香川県">香川県</option>
<option value="愛媛県">愛媛県</option>
<option value="高知県">高知県</option>
<option value="福岡県">福岡県</option>
<option value="佐賀県">佐賀県</option>
<option value="長崎県">長崎県</option>
<option value="熊本県">熊本県</option>
<option value="大分県">大分県</option>
<option value="宮崎県">宮崎県</option>
<option value="鹿児島県">鹿児島県</option>
<option value="沖縄県">沖縄県</option>
</select> 
</p>
	<br>
	<div>①好きなチームを教えてください！<br>
	※J1チームしか用意してません。すみません！</div>
	<div class="right">
	<select name="j1">
		<option value="none">特になし</option>
		<option value="sapporo">北海道コンサドーレ札幌</option>
		<option value="sendai">ベガルタ仙台</option>
		<option value="kashima">鹿島アントラーズ</option>
		<option value="urawa">浦和レッズ</option>
		<option value="kashiwa">柏レイソル</option>
		<option value="fctokyo">FC東京</option>
		<option value="kawasaki">川崎フロンターレ</option>
		<option value="marinosu">横浜F・マリノス</option>
		<option value="yokohamafc">横浜FC</option>
		<option value="shonan">湘南ベルマーレ</option>
		<option value="shimizu">清水エスパルス</option>
		<option value="nagoya">名古屋グランパス</option>
		<option value="gamba">ガンバ大阪</option>
		<option value="ceresso">セレッソ大阪</option>
		<option value="kobe">ヴィッセル神戸</option>
		<option value="hiroshima">サンフレッチェ広島</option>
		<option value="tosu">サガン鳥栖</option>
		<option value="oita">大分トリニータ</option>
	</select>
	</div>

	
	<div>②2019年までのスタジアムでの<br> Ｊリーグ平均年間観戦頻度<br>（ホーム）</div>
	<div class="right">
	<select name="home2019">
		<option value="0">０回</option>
		<option value="1">１～５回</option>
		<option value="2">６～１０回</option>
		<option value="3">１１～１５回</option>
		<option value="4">１６～１７回</option>
	</select>
	</div>

	
	<div>③2019年までのスタジアムでの<br> Ｊリーグ平均年間観戦頻度<br>（アウェイ）</div>
	<div class="right">
	<select name="away2019">
		<option value="0">０回</option>
		<option value="1">１～５回</option>
		<option value="2">６～１０回</option>
		<option value="3">１１～１５回</option>
		<option value="4">１６～１７回</option>
	</select>
	</div>

	
	<div>④2020年のＪリーグ<br> スタジアム観戦頻度<br>（ホーム）</div>
	<div class="right">
	<select name="home2020">
		<option value="0">０回</option>
		<option value="1">１～５回</option>
		<option value="2">６～１０回</option>
		<option value="3">１１～１５回</option>
		<option value="4">１６～１７回</option>
	</select>
	</div>

	<div>⑤2020年のＪリーグ<br> スタジアム観戦頻度<br>（アウェイ）</div>
	<div class="right">
	<select name="away2020">
		<option value="0">０回</option>
		<option value="1">１～５回</option>
		<option value="2">６～１０回</option>
		<option value="3">１１～１５回</option>
		<option value="4">１６～１７回</option>
	</select>
	</div>

	<div>⑥2020年、リアルタイムでの<br>DAZN観戦は何回しましたか？</div>
	<div class="right">
	<select name="dazn">
		<option value="0">０回</option>
		<option value="1">１～５回</option>
		<option value="2">６～１０回</option>
		<option value="3">１１～１５回</option>
		<option value="4">１６～２０回</option>
		<option value="5">２１～３０回</option>
		<option value="6">３１～３４回</option>
	</select>
	</div>

	<div>⑦DAZNでのＪリーグ観戦は好きですか？</div>
	<div class="right">
	<select name="online_kansen">
		<option value="yes">はい</option>
		<option value="no">いいえ</option>
		<option value="none">どちらとも言えない</option>
	</select>
	</div>
	<div>⑧上記の質問の答えの理由を教えてください</div>
	<textarea name="reason" rows="4" cols="40" placeholder="例：（「はい」だった場合）解説聞きながら観戦できるから"></textarea>

	<div>⑨理想の観戦スタイルを教えてください！</div>
	<textarea name="ideal" rows="4" cols="40" placeholder="例：ホーム＆アウェイ、全試合をスタジアム観戦すること"></textarea>

	<br>
	<div class="submit"><input type="submit" value="送信"></div>
</form>
</main>
<footer>created by pojico18 of G'sACADEMIY UNIT_SAPPORO_DEV1</footer>
</body>
</html>