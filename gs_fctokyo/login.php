<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
 <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="css/index.css" rel="stylesheet"> -->
  <link href="./css/select.css" rel="stylesheet">
  <link href="./css/login.css" rel="stylesheet">
  <link href="./css/style_sp.css" rel="stylesheet">
<title>ログイン</title>
</head>
<body class="loginBody">

<!-- Head[Start] -->
<?php
include("l_header.php");
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<?php
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ'.h($_SESSION['EMAIL'])."さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}
?>
<div class="loginTitle">
  <form method="post" action="login_act.php"  class="form">
  <h2>ログイン</h2>
    <div class="loginField">
      <dl class="form-inner">
        <dt class="form-title">ID / メードアドレス</dt>
        <dd class="form-item"><input type="text" name="lid" class="lid"></dd>
        <div id="no_lid"></div>
        <dt class="form-title">パスワード（6文字以上 半角英数字）</dt>
        <dd class="form-item"><input   type="password" name="lpw" class="lpw" minlength="6" pattern="[a-zA-Z0-9]+"></dd>
        <div id="no_lpw"></div>
      </dl>
      <p class="btn-c">
        <input type="submit" value="ログインする" id="btn">
      </p>
    </div>
  </form>

<!-- Main[End] -->
</div>
<footer>created by pojico18 of G'sACADEMIY UNIT_SAPPORO_DEV1</footer>


    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <!-- JQuery -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>


$("#btn").on("click", function () {

  const nolid = $(".lid").val();
  const nolpw = $(".lpw").val();


  // 名前未記入の場合
  if (nolid == "") {
    $("#no_lid").text("記入してください").css('color', 'red');
  }
  if (nolpw == "") {
    $("#no_lpw").text("記入してください").css('color', 'red');
  }
});

</script>

</body>
</html>



