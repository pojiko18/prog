<?php
session_start();
$aikotoba = $_POST["aikotoba"];
$e_id = $_POST["e_id"];
$u_id = $_POST["u_id"];

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

//３. 合言葉の認証
if($aikotoba == ""){
    echo "合言葉を入力してください";
    
}else if($aikotoba == $row["password"]){


    $sql2 = "INSERT INTO event_list(user_id, event_id,indate)
    VALUES( :user_id, :event_id,  sysdate())";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(':user_id', $u_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt2->bindValue(':event_id', $e_id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $status2 = $stmt2->execute();

    //４．データ登録処理後
    if($status2==false){
      //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
      $error = $stmt2->errorInfo();
      exit("QueryError:".$error[2]);

    }else{
      
      header("Location: done.php");

    }


  
}else{
    echo "合言葉が間違っています";
}
//処理終了
// exit();
?>