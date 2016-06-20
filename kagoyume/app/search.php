<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

$hits = array();
$query = !empty($_GET["query"]) ? $_GET["query"] : "";
$sort =  !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score";
$category_id = ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;

if ($query != "") {
	$query4url = rawurlencode($query);
	$sort4url = rawurlencode($sort);
	$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
	$xml = simplexml_load_file($url);
	if ($xml["totalResultsReturned"] != 0) {
		$hits = $xml->Result->Hit;
	}
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
		<title>検索結果</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<body>

<?php header_top();//全ページ共通ヘッダー?>
					<div class="content">
									<?php
										foreach ($hits as $hit) { ?>
										            <?php $item_code = h($hit->Code);?>
										            <h4><a href="<?php echo ITEM.'?code='.$item_code ?>"><?php echo h($hit->Name); ?></a></h4>
										            <p><a href="<?php echo ITEM.'?code='.$item_code ?>"><img src="<?php echo h($hit->Image->Medium); ?>" </a></p><div class="Description"></div>
																<p><?php echo h($hit->Description); ?></p>
																<p>評価：<?php echo h($hits->Review->Rate); ?></p>
																<p>&yen<?php echo h($hit->Price); ?></p>
														<br><br>
									<?php }?>
							</div>
        </body>
</html>
