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
		<title>更新情報確認</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">>
	</head>
<body>
<?php header_top();//全ページ共通ヘッダー?>
<div class="content">
<?php
//入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
if(!isset($_POST['mode']) or !$_POST['mode']=="UPDATE"){//アクセスルートチェック
	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
	echo return_top();
}else{
	if(isset($_POST['name']) && isset($_POST['mail']) && ($_POST['pass']) && ($_POST['address'])){
		update_usertable($_POST['name'],$_POST['pass'],$_POST['mail'],$_POST['address'],$_SESSION['userID']);

			echo 'ユーザー名:'.$_POST['name']."<br/>";
			echo 'パスワード:'.$_POST['pass']."<br/>";
			echo 'メールアドレス:'.$_POST['mail']."<br/>";
			echo '住所:'.$_POST['address']."<br/>";

			echo "<br/><br/>上記の内容で登録しました<br/><br/>";

	}else{
		echo "空のフォームによる更新は出来ません";
        ?>
        <form action="<?php echo MY_UPDATE ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        <?php
    }
}
    ?>
</div>
<br><br>
		<?php echo return_top(); ?>
</body>
</html>
