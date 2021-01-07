<?php


$fp = fopen('./data/data.txt', 'r');
echo '<table><tr><td>名前</td><td>年齢</td><td>性別</td><td>居住地</td><td>好きなチーム</td><td>2019年の<br>ホーム観戦数</td><td>2019年の<br>アウェイ観戦数</td><td>2020年の<br>ホーム観戦数</td><td>2020年の<br>アウェイ観戦数</td><td>ダゾーン<br>観戦数</td><td>オンライン観戦<br>好き？</td><td>理由</td><td>理想の<br>観戦スタイル</td></tr>';
while (($data = fgetcsv($fp)) !== FALSE) {
	
	echo ' <tr><td>',$data[0],'</td>';
	echo ' <td>',$data[1],'</td>';
    echo ' <td>',$data[2],'</td>';	
    echo ' <td>',$data[3],'</td>';
    echo ' <td>',$data[4],'</td>';
    echo ' <td>',$data[5],'</td>';	
    echo ' <td>',$data[6],'</td>';
    echo ' <td>',$data[7],'</td>';	
    echo ' <td>',$data[8],'</td>';
    echo ' <td>',$data[9],'</td>';
    echo ' <td>',$data[10],'</td>';	
    echo ' <td>',$data[11],'</td>';
    echo ' <td>',$data[12],'</td>';	
	echo '</tr>';
}
fclose($fp);

// ＝＝＝上記説明＝＝＝↓↓
// https://uxmilk.jp/15018



?>
<style>
table{
  border-collapse:collapse;
}
    td{
        border:1px solid red; 
    }
</style>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ｊリーグ観戦に関するアンケート結果</title>
</head>
<body>
    

</table>

<script>


</script>
</body>
</html>
