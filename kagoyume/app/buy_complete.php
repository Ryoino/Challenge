<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

//ルートチェック
if(!isset($_POST['mode']) or !$_POST['mode']=="BUY"){
	echo return_top();
	exit( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
if(isset($_POST['type']) && isset($_POST['total']) && isset($_SESSION['userID'])){
	$result = insert_buy($_SESSION['userID'], $_POST['total'], $_POST['type']);//購入情報テーブルへ追記
	$result1 = search_users_total($_SESSION['userID']);//これまでの総購入金額を参照
	$result1[0]['total'] += $_POST['total'];
	update_profile($result1[0]['total'],$_SESSION['userID']);//今回の購入を含めたtotal値で上書き
}

?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>購入完了ページ</title>
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
		<?php
		if(!isset($result)){
		  cookie_reset();
			echo "<h2>購入完了しました!</h2>";
		}else{
			echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
		}?>
	</div>
<br><br>
		<?php echo return_top();?>

</body>
</html>
