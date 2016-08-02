<?php
session_start();
require_once("scriptUtil.php");
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録ページ</title>
</head>
<body>
  <?php
  if ($_POST['mode']!=='REINPUT'){
    'アクセスルートが不正です。トップページからやり直してください';
  }else {
    //ポストの存在チェックちょセッションに値を格納しつつ、連想配列にポストされた値を格納
    $confirm_values = array(
        'name' => bind_p2s('name'),
        'pass' => bind_p2s('pass')
    );
?>

<?php
if (!in_array(null,$confirm_values,true)){?>
 ユーザー名：<?php echo $confirm_values['name'];?><br>
 パスワード：<?php echo $confirm_values['pass'];?><br>
 上記の内容で登録します。よろしいですか？

 <form action="8_5challenge_registration_complete.php" method="post">
   <input type="hidden" name="mode" value="CONFIRM">
   <input type="submit" name="yes" value="はい">
 </form>

<?php }else {?>
  <h2>入力項目が不完全です</h2>
<h3>不完全な項目</h3>
<?php
$arr = array('名前' => $confirm_values['name'],
             'パスワード' => $confirm_values['pass']
           );
  foreach ($arr as $key => $value){
if ($value == null ){
  echo $key.'&nbsp;未入力です<br>';
 }
}
 ?>
 <form action="8_challenge_registration.php" method="post">
   <form action="8_challenge_confirm_product.php" method="POST">
   <input type="hidden" name="mode"  value="REINPUT">
   <input type="submit" name="no" value="登録画面に戻る">
 </form>
<?php }
  }?>

<?php echo return_top();?>
</body>
</html>
