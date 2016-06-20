<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

$key_num='';
if(isset($_POST['delete'])){
	$key_num = $_POST['delete'];
	setcookie("code[$key_num]", '', time() - 1800);
	setcookie("name[$key_num]",'', time() - 1800);
	setcookie("price[$key_num]",'', time() - 1800);
	setcookie("image[$key_num]",'', time() - 1800);
}
$code = cookie_check('code');
$name = cookie_check('name');
$price = cookie_check('price');
$image = cookie_check('image');
$access_count = cookie_check('access_count');
//cookieの値チェック
?>

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>カートの中</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<title>カートの中にある商品 </title>
	</head>
<body>
	<?php header_top();//全ページ共通ヘッダー?>
	<div class="content">
<?php
for ($i=0; $i<$access_count; $i++){

	if(isset($name[$i]) && $key_num != $i){ ?>
		<h2><a href="<?php echo ITEM.'?code='.$code[$i] ?>"><?php echo $name[$i]; ?></a></h2>
		<p><a href="<?php echo ITEM.'?code='.$code[$i] ?>"><img src="<?php echo $image[$i]; ?>"></a></p>
		<p><?php echo $price[$i].'円'?></p>
		<form action="<?php echo CART ?>" method="POST">
		<input type="hidden" name="delete" value="<?php echo $i;?>">
		<input type="submit" value="この商品をカートから削除">
		</form>
		<!-- クッキーを保存した順に表示 --><?php
	}
} ?>
<form action="<?php echo BUY_CONFIRM ?>" method="POST">
<input type="hidden" name="mode" value="BUYC">
<input type="submit" name="btnSubmit" value="購入確認画面へ進む"></form>
</div>

<br><br>
<?php echo return_top(); ?>
</body>
</html>
