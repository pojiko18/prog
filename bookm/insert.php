<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //$_POSTだけでなく、こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$comment = $_POST["comment"];
$rating = $_POST["rating"];

if($book_name==""){
    echo '<h2>書籍名が未記入です。トップページへ戻って記入してください。<br>
    よろしくお願いいたします。</h2>';
    echo '<a href="index.php">▶▶▶読んだ本/読みたい本の備忘録サイト トップページへ</a><br>';
}

// $want_name = $_POST["want_name"];
// $want_url = $_POST["want_url"];
// $want_com = $_POST["want_com"];
// $rating2 = $_POST["rating2"];


//２、 DB接続します

//$pdoの情報を呼び出してあげる
include("./funcs.php");
$pdo = dbcon();



//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(book_name,book_url,comment,rating,indate)VALUES(:book_name,:book_url,:comment,:rating,sysdate())");
// $stmt = $pdo->prepare("INSERT INTO gs_wb_table(want_name,want_url,want_com,rating2,indate)VALUES(:want_name,:want_url,:want_com,:rating2,sysdate())");

//バインド変数を作ってセキュリティーを強化させる
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rating', $rating, PDO::PARAM_STR); 

// $stmt->bindValue(':want_name', $want_name, PDO::PARAM_STR);  
// $stmt->bindValue(':want_url', $want_url, PDO::PARAM_STR);  
// $stmt->bindValue(':want_com', $want_com, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':rating2', $rating2, PDO::PARAM_STR);

//--実行する
$status = $stmt->execute(); //結果：false＝エラー




//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo(); //-- エラー取得の関数→配列で戻してくる
  exit("SQLError:".$error[2]);
}else{

// ５．index.phpへリダイレクト
//---Lは大文字で、:のあとには半角スペースあける
header("Location: index.php");
exit();

}
?>
