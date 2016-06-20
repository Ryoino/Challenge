<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ユーザー情報登録完了</title>
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
if(!isset($_POST['mode']) or !$_POST['mode']=="RESULT"){
	echo 'アクセスルートが不正です。トップページからやり直してください<br>';
}else{
	$result = insert_user($_SESSION['name'],$_SESSION['pass'],$_SESSION['mail'],$_SESSION['address']);
	if(!isset($result)){

		echo 'ユーザー名:'.$_SESSION['name']."<br/>";
		echo 'パスワード:'.mb_strlen($_SESSION['pass'])."文字のパスワード<br/>";
		echo 'メールアドレス:'.$_SESSION['mail']."<br/>";
		echo '住所:'.$_SESSION['address']."<br/>";
		echo "<br/><br/>上記の内容で登録しました<br/><br/>";
	}else{
		echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
	}
}
?>
</div>
<?php echo return_top(); ?>
</body>
</html>
