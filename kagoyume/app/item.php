<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

if(!empty($_GET['code'])){//配列チェックとエラー表示
	$item_code = $_GET['code'];
}else{
	echo "不正なURLです<br/>";
	exit(return_top());
}
$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$item_code&image_size=300&responsegroup=medium";
$xml = simplexml_load_file($url);
if ($xml["totalResultsReturned"] != 0) {
	$hits = $xml->Result->Hit;
}else{
	 echo "その商品ページは存在しません<br/>";
	 exit(return_top());
}//APIが検索結果を返さなかった場合にエラー表示
$name = h($hits->Name);
$price = h($hits->Price);
$image = h($hits->Image->medium);
$description = h($hits->Description);
?>
<!doctype html>
<html>
    <head>
			<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>商品詳細</title>
			<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
			<link href="../css/animation/animation.css" rel="stylesheet">
			<link href="../css/style/style.css" rel="stylesheet">
			<link href="../css/style/bootstrap.min.css" rel="stylesheet">
			<link href="../css/style/landing-page.css" rel="stylesheet">
			<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
	<body>
	<div class="content">
	<?php header_top();//全ページ共通ヘッダー?>
	<?php echo $name; ?>
	<?php echo $price; ?><br>
	<p><img src="<?php echo h($hits->ExImage->Url); ?>" /><br></p>
	<p><?php echo h($hits->Headline); ?></p>


	<form action="<?php echo ADD ?>" method="POST">
	<input type="hidden" name="code"  value="<?php echo $item_code ?>">
	<input type="hidden" name="name"  value="<?php echo $name ?>">
	<input type="hidden" name="price"  value="<?php echo $price ?>">
	<input type="hidden" name="image"  value="<?php echo $image ?>">
	<input type="hidden" name="mode"  value="ADD">
	<input type="submit" name="btnSubmit" value="カートへ追加">
	</form>
</div>

	<br><br>
<?php echo return_top(); ?>
	</body>
</html>
