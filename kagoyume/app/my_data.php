<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

$information = profile_detail($_SESSION['userID']);//ユーザーの全ての情報を参照
	overwrite('name', $information[0]['name']);//セッションの値の有無に問わず上書きする
	overwrite('password', $information[0]['password']);
	overwrite('mail', $information[0]['mail']);
	overwrite('address', $information[0]['address']);
	overwrite('total', $information[0]['total']);
	overwrite('newDate', $information[0]['newDate']);
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>トップページ</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<title>ユーザー情報確認ページ</title>
	</head>
<body>
<?php header_top();//全ページ共通ヘッダー?>

	<div class="content">
				<h4><a href="<?php echo CART ?>">カートの中を見る</a></h4>
				<br>
				<h2>ユーザー登録情報</h2>
				ユーザー名: <?php echo $information[0]['name']; ?><br>
				メールアドレス: <?php echo $information[0]['mail']; ?><br>
				住所: <?php echo $information[0]['address']; ?><br>
				<br>
				<?php
				echo '今までの購入金額は';	//連想配列で返ってくる購入金額データをすべて取得する
				$result = search_buy_total($_SESSION['userID']);
				$total=0;
					foreach ($result as $key => $value){
					foreach($value as $values){
						echo $values."円<br/>";
						$total += $values;
	}
}
echo "<br/>合計".$total."円です";
?>
<br>
<br>
	<form action="<?php echo MY_UPDATE ?>" method="POST">
		<input type="submit" name="Submit" value="ユーザー情報を変更する">
		<input type="hidden" name="mode" value="MUPDATE">
	</form>

	<form action="<?php echo MY_DELETE ?>" method="POST">
		<input type="submit" name="Submit" value="ユーザー情報を削除する">
		<input type="hidden" name="mode" value="DELETE">
	</form>
</div>
<br><br>
	<?php echo return_top(); ?>
</body>
</html>
