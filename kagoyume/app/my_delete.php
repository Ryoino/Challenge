<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

if(!isset($_POST['mode']) or !$_POST['mode']=="MDELETE"){//アクセスルートチェック
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
		<title>登録内容削除確認</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">>
	</head>
<body>
<?php header_top();//全ページ共通ヘッダー?>

        ユーザー名:<?php echo $_SESSION['name'];?><br>
        メールアドレス:<?php echo $_SESSION['mail'];?><br>
        住所:<?php echo $_SESSION['address'];?><br>
	購入金額:<?php echo $_SESSION['total'];?><br>
	登録日時:<?php echo $_SESSION['newDate'];?><br>
        このユーザーをマジで削除しますか？<br><br>

	<form action="<?php echo MY_DELETE_RESULT  ?>" method="POST">
    <input type="hidden" name="mode" value="DELETE" >
    <input type="submit" name="yes" value="はい">
    </form>
    <br>
   	<a href="<?php echo TOP ?>">いいえ</a>
<br><br>

<?php echo return_top(); ?>
</body>
</html>
