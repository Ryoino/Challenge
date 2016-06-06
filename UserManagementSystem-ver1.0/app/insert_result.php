<?php require_once '../common/scriptUtil.php'; //トップページに戻るためrequire追加?>
<?php require_once '../common/dbaccesUtil.php';?>
<?php session_start();?>

<?php
$name = isset($_POST['name'])?$_POST['name']:null;
$year = isset($_POST['year'])?$_POST['year']:null;
$moth = isset($_POST['month'])?$_POST['month']:null;
$day = isset($_POST['day'])?$_POST['day']:null;
$invisible = isset($_POST['invisible'])?$_POST['invisible']:null;
?>

<?php
$name = $_SESSION['name'];
$birthday = $_SESSION['birthday'];
$type = $_SESSION['type'];
$tell = $_SESSION['tell'];
$comment = $_SESSION['comment'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    insert_result($name,$birthday,$tell,$type,$comment);
    if ($invisible == 'prohibition'){
      echo '<h1>登録結果画面</h1><br>';
      echo '名前:'.$name.'<br>';
      echo '生年月日:'.$birthday.'<br>';
      echo '種別:'.$type.'<br>';
      echo '電話番号:'.$tell.'<br>';
      echo '自己紹介:'.$comment.'<br>';
      echo '以上の内容で登録しました。<br>';
    }
    else {
      echo '不正アクセス';
        }
     ?>
     <br><br>
     
         <?php echo return_top(); ?><!--課題1-->
</body>

</html>
