<?php
session_start();
require_once("scriptUtil.php");
require_once("datebace.php");
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新規登録ページ</title>
</head>
<body>
  <?php
  if ($_POST['mode']!=='CONFIRM'){?>
    'アクセスルートが不正です。トップページからやり直してください';
  <?php }else {
    $result = insert_user($_SESSION['name'],$_SESSION['pass']);
  	if(!isset($result)){
      echo "登録いたしました！";
      ?>
<?php }else {
  echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
 }
}?>

<?php echo return_top();?>
</body>
</html>
