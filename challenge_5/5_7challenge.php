<?php
$sei = isset($_COOKIE['sei']) ? $_COOKIE['sei'] : null;
$mei = isset($_COOKIE['mei']) ? $_COOKIE['mei'] : null;
$gender = isset($_COOKIE['gender']) ? $_COOKIE['gender'] : null;
$hobby = isset($_COOKIE['hobby']) ? $_COOKIE['hobby'] : null;

if($gender=='maile'){
	$maile =  'checked';
}else{
	$maile = null;
 }
 if($gender=='female'){
 	$female =  'checked';
 }else{
 	$female = null;
  }

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
<h3>課題5_7</h3>
<form enctype="multipart/form-data" action="test.php" method="get">

<p>
名前 :
性	<input type="text" name="sei" value ="<?php echo $sei?>">
名	<input type="text" name="mei" value ="<?php echo $mei?>">
</p>

<p>性別：
<input type="radio" name="gender" value="maile"<?php echo $maile; ?>>男
<input type="radio" name="gender" value="female"<?php echo $female; ?>>女
</p>

<p class=hobby>趣味：</p>
<textarea name="hobby" rows="3" cols="40" ><?php echo $hobby; ?></textarea><br>

<p><input type = "submit" value = "送信" ></p>
</form>

</body>
</html>
