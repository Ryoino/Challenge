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
		<title>新規会員登録</title>
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
    <form action="<?php echo REGISTRATION_CONFIRM ?>" method="POST">

        ユーザー名:
        <input type="text" name="name" value="<?php echo form_value('name'); ?>">
        <br><br>
				メールアドレス:
        <input type="text" name="mail" value="<?php echo form_value('mail'); ?>">
        <br><br>
        パスワード:
        <input type="password" name="pass">
        <br><br>
        パスワード(確認のためもう一度入力してください):
        <input type="password" name="pass2">
        <br><br>
        住所:
        <input type="text" name="address" value="<?php echo form_value('address'); ?>">
        <br><br>
        <input type="hidden" name="mode"  value="CONFIRM">
        <input type="submit" name="btnSubmit" value="登録確認画面へ">
    </form>
</div>

	<br><br>
    <?php echo return_top(); ?>
</body>
</html>
