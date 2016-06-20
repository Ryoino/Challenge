<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

if(!isset($_POST['mode']) or !$_POST['mode']=="MUPDATE"){//アクセスルートチェック
	echo return_top();
	exit( "<br/>".'アクセスルートが不正です。もう一度トップページからやり直してください');
}
?>
<!doctype html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ユーザー情報更新</title>
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
    <form action="<?php echo MY_UPDATE_RESULT ?>" method="POST">
        ユーザー名:
        <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>">
        <br><br>
	メールアドレス:
        <input type="text" name="mail" value="<?php echo $_SESSION['mail']; ?>">
        <br><br>
        パスワード:
        <input type="text" name="pass" value="<?php echo $_SESSION['password'];?>">
        <br><br>

        住所:
        <input type="text" name="address" value="<?php echo $_SESSION['address']; ?>">
        <br><br>
</div>
        <input type="hidden" name="mode"  value="UPDATE">
        <input type="submit" name="btnSubmit" value="更新する">
    </form>

    <?php echo return_top(); ?>
</body>
</html>
