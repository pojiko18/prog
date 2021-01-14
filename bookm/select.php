<?php
//1.  DB接続します
// try {
//   //Password:MAMP='root',XAMPP=''
//   // $pdo = new PDO('mysql:dbname=データーベース名;charset=utf8;host=データベースsakura.ne.jp','ユーザー名','パスワード');
//   $pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost','root','root'); // ココはコピペでＯＫ


// } catch (PDOException $e) {
//   exit('DBConnectionError:'.$e->getMessage()); //exitは処理を止める
// }
include("./funcs.php");
$pdo = dbcon();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT *
FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="box">';
    $view .= '<h3>'.$res["id"].'、　<a href="'.$res["book_url"].'" target="_blank" rel="noopener noreferrer">'.$res["book_name"].'</a></h3>';
    $view .= '<div class="flex"><div class="star">おすすめ度：'.$res["rating"].'</div>';
    $view .= '<div class="time">'.$res["indate"].'</div></div>';
    $view .= '<div class="inner">'.$res["comment"].'</div>';
    $view .= '</div>';
    
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>読んだ本の感想リスト</title>
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
<h2>読んだ本リスト</h2>
<div><?=$view?></div>
<!-- Main[End] -->
<footer>created by pojico18 of G'sACADEMIY UNIT_SAPPORO_DEV1</footer>
</body>
</html>
