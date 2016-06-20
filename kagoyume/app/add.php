<?php
session_start();
require_once('../common/common.php');
require_once('../util/defineUtil.php');
require_once('../util/scriptUtil.php');
require_once('../util/dbaccessUtil.php');

log_write();

if(!isset($_POST['mode']) or !$_POST['mode']=='ADD'){//アクセスルートチェック

	exit( '<br/>'.'アクセスルートが不正です。もう一度トップページからやり直してください');
}

if(!empty($_COOKIE['access_count'])){
	$count = $_COOKIE['access_count'];//2回目以降のアクセスはカウントに反映
}else{
	setcookie('access_count','1');
	$count = 0;
}
setcookie('code[$count]',$_POST['code']);//配列の要領で各要素をクッキーへ格納
setcookie('name[$count]',$_POST['name']);
setcookie('price[$count]',$_POST['price']);
setcookie('image[$count]',$_POST['image']);
$count++;
setcookie('access_count',$count);//アクセスカウント増加
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>カートに追加ページ</title>
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
		<h3><?php echo 'カートに追加しました!'; ?></h3>
		<form action='<?php echo SEARCH ?>' class='Search' method='GET'>
			<h4><a href='<?php echo CART ?>'>カートの中を見る</a></h4>
		</form>
</div>
<br><br>

<?php echo return_top(); ?>
</body>
</html>
