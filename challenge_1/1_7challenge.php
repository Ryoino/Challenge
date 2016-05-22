<!doctype.html>
<html>
<head>
<meta charset="utf8" />
<title>課題7</title>

<style>

.product a {
  color: #000000;
  text-decoration:none;
}
.product a:hover {
  color: #8d8d8b;
}
</style>

</head>
<body>

<h1>課題7</h1>

  <?php

  $product = $_GET['product'];
  $totalprice = $_GET['totalprice'];
  $count = $_GET['count'];


//課題7_1

  $goods = '商品種別：<span class="product"><a href=#>雑貨</a></sapn>'.'<br>';
  $food = '商品種別：<span class="product"><a href=#>生鮮食品</a></sapn>'.'<br>';
  $other = '商品種別：<span class="product"><a href=#>その他</a></sapn>'.'<br>';

  if ($product == 1) {
    echo $goods;
  }
  if ($product == 2) {
   echo $food;
  }
  if ($product == 3) {
     echo $other;
  }

//課題7_2
echo '総額：'.$totalprice.'円'.'<br>';
echo '一個あたりの値段：'.$totalprice / $count.'円'.'<br>';

//課題7_3
if($totalprice >= 5000){
	$point = $totalprice * 0.05;
	echo $point.'ポイント'.'<br>';
}
elseif($totalprice >= 4000){
  $point = $totalprice * 0.04;
	echo $point.'ポイント'.'<br>';
}
else{
	echo 'ポイントなし'.'<br>';
}
?>

</body>
</html>
