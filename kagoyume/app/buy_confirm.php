<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

if(!isset($_POST['mode']) or !$_POST['mode']=="BUYC"){//アクセスルートチェック
	echo return_top();
	exit( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
$key_num='';
$total = 0;
$code = cookie_check('code');
$name = cookie_check('name');
$price = cookie_check('price');
$image = cookie_check('image');
$access_count = cookie_check('access_count');
//cookieの値チェック
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>購入確認ページ</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
<body>
	<?php header_top();//全ページ共通ヘッダー?>
<div class="content">
	<form action="<?php echo SEARCH ?>" class="Search" method="GET"></form>
<?php
for ($i=0; $i<$access_count; $i++){

	if(isset($name[$i]) && $key_num != $i){ ?>
		<b><?php echo $name[$i]; ?></b>
		<p><?php echo $price[$i].'円'?></p>
		<!-- クッキーを保存した順に表示 --><?php $total += $price[$i];
	}
} ?>
	<form action="<?php echo BUY_COMPLETE ?>" method="POST">
	発送方法:<br>
	<br>
<p>クロネコヤマト：<input type="radio" name="type" value="1" <?php echo "checked";?></p><br>
<p>佐川急便：<input type="radio" name="type" value="2" ></p><br>
合計：&yen<?php echo $total; ?><br>
	<input type="submit" name="btnSubmit" value="この金額で購入する">
	<input type="hidden" name="total" value="<?php echo $total;?>">
	<input type="hidden" name="userID" value="<?php if(isset($_SESSION['userID'])){ echo $_SESSION['userID']; } ?>">
	<input type="hidden" name="mode" value="BUY">
	</form>
	<form action="<?php echo CART ?>" ><input type="submit" name="btnSubmit" value="カートへ戻る"></form>
</div>

<br><br>
<?php echo return_top(); ?>
	</body>
</html>
