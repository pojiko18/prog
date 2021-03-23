<?php
session_start();

$e_id =$_POST["e_id"];
$u_id =$_POST["u_id"];
$point =$_POST["point"];
$aikotoba =$_POST["aikotoba"];


// 1. 接続します
include("funcs.php");
$pdo = dbcon();

//２．データ登録SQL作成
$sql = "SELECT * FROM event WHERE  e_id=:e_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':e_id', $e_id);
$res = $stmt->execute();

// //SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  return("QueryError:".$error[2]);
}else {
  $row = $stmt->fetch();
}


//◆ユーザー情報の取得
$sql_u = "SELECT * FROM users WHERE user_id=:u_id";
$stmt_u = $pdo->prepare($sql_u);
$stmt_u->bindValue(':u_id', $u_id, PDO::PARAM_INT);
$status_u = $stmt_u->execute();

//データ表示
if($status_u==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt_u->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row_u = $stmt_u->fetch();
}


//３. 合言葉の認証

if($aikotoba == ""){
    echo "合言葉を入力してください。（5秒後にイベントページに戻ります）";
    header( "refresh:5;url=y_event_detail.php?id=".$row["e_id"]);
}else if($aikotoba == $row["password"]){


    $sql2 = "INSERT INTO event_list(user_id, event_id,point,indate)
    VALUES( :user_id, :event_id, :point, sysdate())";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(':user_id', $u_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt2->bindValue(':event_id', $e_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt2->bindValue(':point', $point, PDO::PARAM_INT);
    $status2 = $stmt2->execute();

    //４．データ登録処理後
    if($status2==false){
      //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
      $error = $stmt2->errorInfo();
      exit("QueryError:".$error[2]);
    }else {  
      echo '<h2>チェックインしました！</h2><div>'.$row["point"].'ポイントを獲得しました！<div>';
      header("refresh:5;url=y_event_detail.php?id=".$row["e_id"]);
    }
    
}else{
    echo "合言葉が間違っています。合言葉を入れ直してください。（5秒後にイベントページに戻ります）";
    header( "refresh:5;url=y_event_detail.php?id=".$row["e_id"]);
}

?>

