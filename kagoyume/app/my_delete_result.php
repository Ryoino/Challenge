<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

if(!isset($_POST['mode']) or !$_POST['mode']=="DELETE"){//アクセスルートチェック
	echo return_top();
	exit( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
delete_buytable($_SESSION['userID']);
delete_profile($_SESSION['userID']);
cookie_reset();
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>削除完了</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
<body>
<?php header_top();//全ページ共通ヘッダー?>

削除が完了しました<br><br>

<?php echo return_top(); ?>
</body>
</html>
