<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

$flag = 0;
if (isset($_SESSION['userstate']) && $_SESSION['userstate']=='login'){
	logout();
	cookie_reset();
	exit("ログアウトしました<br/><br/>".return_top());
}

if(isset($_POST['name']) && isset($_POST['pass'])){ //ログイン時に入力フォームの情報を受け取りDBのデータを参照
	$result = search_all_profiles($_POST['name'],$_POST['pass']);
	if(isset($result[0])){//DBから受け取ったデータチェック
		if(empty($_SESSION['userID']) && empty($_SESSION['username'])){
			echo $result[0]['userID'];
			$_SESSION['userID'] = $result[0]['userID'];
			$_SESSION['username'] = $_POST['name'];//ユーザーIDとユーザー名をセッションに保持
		}
		$_SESSION['userstate']='login';
		$flag = 1;
	}else{
		echo "ユーザー名またはパスワードが間違っています";
		exit("<a href='".LOGIN."'>ログイン画面へ戻る</a>");
	}
}
?>
<!DOCTYPE html>
    <head>
<?php   if(isset($_SESSION['place']) && $flag == 1){
			echo '<meta http-equiv=refresh content=1;URL='.$_SESSION['place'].'>';
		}?>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>ログイン/ログアウト画面</title>
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
		    <form action="<?php echo LOGIN ?>" method="POST">
        ユーザー名:
        <input type="text" name="name" >
        	<br><br>
	 パスワード:
        <input type="text" name="pass" >
        	<br><br>
					<input type="hidden" name="flag" value="true">
        <input type="submit" name="Submit" value="送信">
	</form>
    <?php echo "<a href='".REGISTRATION."'>新規会員登録</a>";?>

	<br><br>
		<?php echo return_top(); ?>
	</div>
</body>
</html>
