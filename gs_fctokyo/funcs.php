<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//DB接続関数
function dbcon(){

  try {
    //Password:MAMP='root',XAMPP=''
    // $pdo = new PDO("mysql:dbname=pojico18_php02;charset=utf8;host=mysql2017.db.sakura.ne.jp","pojico18","pojiko18-php02");
    $pdo = new PDO('mysql:dbname=gs_fctokyo;charset=utf8;host=localhost','root','root'); // ココはコピペでＯＫ
    return $pdo;

  } catch (PDOException $e) {
    exit('DBConnectionError:'.$e->getMessage()); //exitは処理を止める
  }
}

//ログイン認証チェック関数
function loginCheck(){
  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo  "LOGIN Error!";
    exit();
  }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }  
}

//SQLエラー関数：sql_error($stmt) $stmは第一引数

function sql_error($stmt){

    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]); //2番目だけが読める英語になっている
    }


//リダイレクト関数: redirect($file_name)
function redirect($filename){
        
        header("Location: $filename");
        exit();
    }


/*-------------------------------
	定数
-------------------------------*/
// エラーメッセージ
define('MSG01', '入力必須です');
define('MSG02', '半角英数字で入力してください');
define('MSG03', 'パスワード(再入力)が合っていません');
define('MSG04', '文字以上で入力してください');
define('MSG05', 'E-mailの形式で入力してください');
define('MSG06', '文字以内で入力してください');
define('MSG07', 'エラーが発生しました。しばらく経ってからやり直してください');
define('MSG08', 'ユーザー名またはパスワードが違います');
define('MSG09', 'そのEmailは既に登録されています');
define('MSG10', '現在のパスワードが間違っています');
define('MSG11', '現在のパスワードと同じです');
define('MSG12', '文字で入力してください');
define('MSG13', '正しくありません');
define('MSG14', '有効期限が切れています');
// 成功時メッセージ
define('SUC01', '投稿しました');
define('SUC02', 'プロフィールを変更しました');
define('SUC03', 'パスワードを変更しました');
define('SUC04', 'メールを送信しました、ご確認ください');
define('SUC05', '削除しました');
define('SUC06', '新しいパスワードでログインしてください');

/*-------------------------------
	グローバル変数
-------------------------------*/
// エラーメッセージ格納用の配列
$err_msg = array();

/*-------------------------------
	バリデーションチェック
-------------------------------*/
// 未入力チェック
function validRequired($str, $key){
	if($str === ''){
		global $err_msg;
		$err_msg[$key] = MSG01;
	}
}
// 最大文字数チェック
function validMaxLen($str, $key, $max = 200){
	$str = str_replace("\r\n", "", $str); //改行を削除
	if(mb_strlen($str) > $max){
		global $err_msg;
		$err_msg[$key] = $max.MSG06;
	}
}
// 最小文字数チェック
function validMinLen($str, $key, $min = 6){
	if(mb_strlen($str) < $min){
		global $err_msg;
		$err_msg[$key] = $min.MSG04;
	}
}
// email形式チェック
function validEmail($str, $key){
	if(!preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/", $str)){
		global $err_msg;
		$err_msg[$key] = MSG05;
	}
}
// email重複チェック
function validEmailDup($email){
	global $err_msg;
	try{
		$dbh = dbConnect();
		$sql = 'SELECT count(*) FROM user WHERE email = :email AND life_flg = 0';
		$data = array(':email' => $email);
		// クエリ実行
		$stmt = queryPost($dbh, $sql, $data);
		// クエリ結果の値を取得
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		debug('クエリ結果の中身'.print_r($result,true));

		if(!empty(array_shift($result))){
			$err_msg['email'] = MSG09;
		}
	}catch(Exception $e){
		error_log('エラー発生：'. $e->getMessage());
		$err_msg['common'] = MSG07;
	}
}
// 半角英数字チェック
function validHalf($str, $key){
	if(!preg_match("/^[a-zA-Z0-9]+$/", $str)){
		global $err_msg;
		$err_msg[$key] = MSG02;
	}
}
// 同値チェック
function validMatch($str1, $str2, $key){
	if($str1 !== $str2){
		global $err_msg;
		$err_msg[$key] = MSG03;
	}
}
// 固定長チェック
function validLength($str, $key, $len = 8){
	if(mb_strlen($str) !== $len){
		global $err_msg;
		$err_msg[$key] = $len . MSG12;
	}
}
// パスワードチェック
function validPass($str, $key){
	// 半角英数字チェック
	validHalf($str, $key);
	// 最小文字数チェック
	validMinLen($str, $key);
	// 最大文字数チェック
	validMaxLen($str, $key);
}
// エラーメッセージ表示
function getErrMsg($key){
	global $err_msg;
	if(!empty($err_msg[$key])){
		echo $err_msg[$key];
	}
}

/*-------------------------------
	メール送信
-------------------------------*/
function sendMail($from, $to, $subject, $comment){
	if(!empty($to) && !empty($subject) && !empty($comment)){
		// 文字化けしないように設定（お決まりパターン）
		mb_language("Japanese");
		mb_internal_encoding("UTF-8");

		// メールを送信（送信結果はtrueかfalseで返ってくる）
		$result = mb_send_mail($to, $subject, $comment, "From:".mb_encode_mimeheader("POAD")."<".$from.">");
		// 送信結果を判定
		if($result){
			debug('メールを送信しました。');
		}else{
			debug('【エラー発生】メールの送信に失敗しました。');
		}
	}
}
// 認証キーの生成
function makeRandKey($length = 8){
	static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
	$str = '';
	for($i = 0; $i < $length; ++$i){
		$str .= $chars[mt_rand(0, 61)];
	}
	return $str;
}


?>




