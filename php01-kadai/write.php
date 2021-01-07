<?php
include("./inc/funcs.php");

$name = $_POST["name"];
$age =$_POST["age"];

if(isset($_POST["sex"])) {
$sex = $_POST["sex"];
}

if(isset($_POST["pref_name"])) {
$pref_name = $_POST["pref_name"];
}

if(isset($_POST["j1"])) {
  // セレクトボックスで選択された値を受け取る
$j1 = $_POST["j1"];
}
if(isset($_POST["home2019"])) {
$home2019 = $_POST["home2019"];

  if($home2019==0){
    $home2019 ="0回";
  }
  if($home2019==1){
    $home2019 ="１～５回";
  }
  if($home2019==2){
    $home2019 ="６～１０回";
  }
  if($home2019==3){
    $home2019 ="１１～１５回";
  }
  if($home2019==4){
    $home2019 ="１６～１７回";
  }

}
if(isset($_POST["away2019"])) {

$away2019 = $_POST["away2019"];


if($away2019==0){
    $away2019 ="0回";
  }
  if($away2019==1){
    $away2019 ="１～５回";
  }
  if($away2019==2){
    $away2019 ="６～１０回";
  }
  if($away2019==3){
    $home2019 ="１１～１５回";
  }
  if($away2019==4){
    $away2019 ="１６～１７回";
  }
}
if(isset($_POST["home2020"])) {

$home2020 = $_POST["home2020"];

if($home2020==0){
    $home2020 ="0回";
  }
  if($home2020==1){
    $home2020 ="１～５回";
  }
  if($home2020==2){
    $home2020 ="６～１０回";
  }
  if($home2020==3){
    $home2020 ="１１～１５回";
  }
  if($home2020==4){
    $home2020 ="１６～１７回";
  }
}
if(isset($_POST["away2020"])) {

$away2020 = $_POST["away2020"];
if($away2020==0){
    $away2020 ="0回";
  }
  if($away2020==1){
    $away2020 ="１～５回";
  }
  if($away2020==2){
    $away2020 ="６～１０回";
  }
  if($away2020==3){
    $home2020 ="１１～１５回";
  }
  if($away2020==4){
    $away2020 ="１６～１７回";
  }
}
if(isset($_POST["dazn"])) {

$dazn = $_POST["dazn"];
if($dazn==0){
    $dazn ="0回";
  }
  if($dazn==1){
    $dazn ="１～５回";
  }
  if($dazn==2){
    $dazn ="６～１０回";
  }
  if($dazn==3){
    $home2020 ="１１～１５回";
  }
  if($dazn==4){
    $dazn ="１６～２０回";
  }
  if($dazn==5){
    $dazn ="２１～３０回";
  }
  if($dazn==6){
    $dazn ="３１～３４回";
  }

}
if(isset($_POST["online_kansen"])) {

$online_kansen = $_POST["online_kansen"];
if($online_kansen=="yes"){
    $online_kansen ="はい";
  }
  if($online_kansen=="no"){
    $online_kansen ="いいえ";
  }
  if($online_kansen=="none"){
    $online_kansen ="どちらとも言えない";
  }
}
$reason = $_POST["reason"];
$ideal =$_POST["ideal"];



if(!$name==""){
    $str = $name.",".$age.",".$sex.",".$pref_name.",".$j1.",".$home2019.",".$away2019.",".$home2020.",".$away2020.",".$dazn.",".$online_kansen.",".$reason.",".$ideal;
    //File書き込み
    $file = fopen("data/data.txt","a");	// ファイル読み込み
    fwrite($file, $str."\n");
    fclose($file);

    echo '<h1>アンケートにご協力いただき、ありがとうございました！</h1>
    <img src="./img/Ca93qs3VIAAtE58.jpg" alt="">';

}

if($name==""){
    echo '<h2>お名前が未記入です。戻って記入してください。<br>
    よろしくお願いいたします。</h2>';
}
?>


<html>
<head>
<meta charset="utf-8">
<title>Ｊリーグ観戦に関するアンケート完了</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<link rel="stylesheet" href="./sp.css">
</head>
<body>



</body>
</html>