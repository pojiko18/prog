<?php
//1.  DB接続します
include("./funcs.php");
$pdo = dbcon();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT *
FROM gs_wb_table");
$status = $stmt->execute();

//３．データ表示
$view2="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){

    $view2 .= '<div class="box">';
    $view2 .= '<h3>'.$res["id"].'、　<a href="'.$res["want_url"].'" target="_blank" rel="noopener noreferrer">'.$res["want_name"].'</a></h3>';

    $view2 .= '<div class="flex"><div class="star">優先度：'.$res["rating2"].'</div>';
    $view2 .= '<div class="time">'.$res["indate"].'</div></div>';
    $view2 .= '<div class="inner">'.$res["want_com"].'</div>';
    $view2 .= '</div>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>読みたい本リスト</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<link href="./css/select.css" rel="stylesheet">

</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default flex">
        
            <div class="top"><a class="navbar-brand" href="index.php">読んだ本/読みたい本の備忘録サイト</a></div>
            <div class="sp flex2">            
                <div class="navbar-header"><a class="navbar-brand" href="select.php">読んだ本リスト</a></div>
                <div class="navbar-header2"><a class="navbar-brand" href="select2.php">読みたい本リスト</a></div>
            </div>
        
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<h2>読みたい本リスト</h2>
<div>
    <?=$view2?>
</div>
<!-- Main[End] -->
<footer>created by pojico18 of G'sACADEMIY UNIT_SAPPORO_DEV1</footer>
</body>
</html>
