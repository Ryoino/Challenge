<?php
session_start();

$access_time = date('Y/m/d');
setcookie('LastLoginDate',$access_time);
$lastDate = $_COOKIE['LastLoginDate'];

$_SESSION['message'] = 'こんにちは';

$g = $_GET['userfile'];
$file = file_get_contents("$g",'r');

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題5：データ操作</title>
<style>
.hobby{
	float: left;
	margin-top:13px;
}

</style>
</head>

<body>
<h3>課題5_1_2</h3>
	<form>
<p>
お名前 :
性	<input type="text" name="sei" value="井上">
名	<input type="text" name="mei" value="良太">
</p>

<p>性別：
<input type="radio" name="sex" value="male">男
<input type="radio" name="sex" value="female">女
</p>

<p class=hobby>趣味：</p>
<textarea name="hobby" rows="3" cols="40"></textarea>

</form>

<h3>課題5_3</h3>
<?php
echo $lastDate;
 ?>
<h3>課題5_4</h3>
<?php
echo $_SESSION['message'];
?>

<h3>課題5_5</h3>
<form enctype="multipart/form-data" action="5_challenge.php" method="get">
ファイル選択：<input name="userfile" type="file" />
<input type = submit value = "こめ" >
</form>
 <h3>課題5_6</h3>
<?php
echo $file;
?>
</body>
</html>
