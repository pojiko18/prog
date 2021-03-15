<?php
session_start();
include("funcs.php");
loginCheck();

//GETでid値を取得
$e_id =$_GET["id"];
$u_id =$_SESSION["id"];


//DB接続
$pdo = dbcon();


// イベントidの取得
$sql = "SELECT * FROM event WHERE e_id=:e_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':e_id', $e_id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
}


// ユーザーidの取得
// $sql2 = "SELECT * FROM users";
// $stmt2 = $pdo->prepare($sql2);
// $stmt2->bindValue(':u_id', $u_id, PDO::PARAM_INT);
// $status2 = $stmt2->execute();

// //データ表示
// if($status2==false) {
//   //execute（SQL実行時にエラーがある場合）
//   $error = $stmt2->errorInfo();
//   exit("ErrorQuery:".$error[2]);

// } else {
//   //１データのみ抽出の場合はwhileループで取り出さない
//   $row2 = $stmt->fetch();
// }


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>イベント詳細ページ</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/index.css" rel="stylesheet">
  <link href="./css/select.css" rel="stylesheet">
  <link href="./css/login.css" rel="stylesheet">
  <link href="./css/style_sp.css" rel="stylesheet">

  <style type="text/css">
div {border:solid 1px #000000;}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<?php
include("l_header.php");
?>
<!-- Head[End] -->

<!-- Main[Start] -->

<!-- 日程入れる -->
<section>

  <h2><?=$row["title"]?></h2>
  <p><?=$row["year"]?>年<?=$row["month"]?>月<?=$row["day"]?>日</p>
  <p><?=$row["time"]?></p>
  <p><?=$row["place"]?></p>
  <p><?=$row["contents"]?></p>


</section>


<section>
<!-- 合言葉入れるところ -->
    <form method="post" action="aikotoba_act.php"  class="form">
        <dl class="form-inner">
            <dt class="form-title">合言葉</dt>
            <dd class="form-item"><input type="text" name="aikotoba"></dd>
            <input type="hidden" name="e_id" value="<?=$row["e_id"]?>">
            <input type="hidden" name="u_id" value="<?=$u_id?>">
            
        </dl>
        <p class="btn-c">
            <input type="submit" value="送信する" class="btn">
        </p>

    </form>
</section>

<!-- 時間あればチャット入れる -->
<section>

</section>





<!-- Main[End] -->
<?php
include("y_footer.php");
?>



</body>
</html>