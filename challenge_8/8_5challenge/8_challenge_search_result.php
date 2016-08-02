<?php
session_start();
require_once("scriptUtil.php");
require_once("datebace.php");
 ?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>検索結果</title>
</head>
<body>

<?php

if($_POST['mode']!=="RESULT"){//ルートチェック
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
if (!isset($_SESSION['userID'])) {//ログインチェック
  echo '<a href="8_5challenge_login.php">ログインを行って下さい。</a>';
}else {?>
<h1>検索結果</h1>
<table border=1>
    <tr>
        <th>商品</th>
        <th>個数</th>
    </tr>
<?php
$result = null;
$product = $_POST['item'] ? $_POST['item'] :null;
if(isset($product)){
    $result = search_item($product);
    var_dump($result);
}
foreach($result as $value){
?>
    <tr>
        <td><?php echo $value['item']; ?></td>
        <td><?php echo $value['count'];?></td>
    </tr>
<?php
    }
  }
}
?>
</table>


<br><br>
<?php echo return_top();?>
</body>
</html>
