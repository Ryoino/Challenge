<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>組み込み関数：基礎課題</title>
</head>

<body>

  <?php

  //課題1
  $stamp = mktime(0,0,0,1,1,2016);
  echo '<h3>課題4_1</h3>'.'<br>'.$stamp.'<br>';
  echo '<br>';

  //課題2
  $tody = date('Y/m/d');
  echo '<h3>課題4_2</h3>'.'<br>'.$tody.'<br>';
  echo '<br>';

 //課題3
 $stamp1 = mktime(10,0,0,11,4,2016);
 $tody1 = date('h時i分s秒Y/m/d',$stamp1);
 echo '<h3>課題4_3</h3>'.'<br>'.$tody1.'<br>';
 echo '<br>';

 //課題4
 $stamp2 = mktime(0,0,0,1,1,2015);
 $stamp3 = mktime(23,59,59,12,31,2015);
 $diff = $stamp3 - $stamp2;
 echo '<h3>課題4_4</h3>'.'<br>'.$diff.'<br>';
 echo '<br>';

//課題5
echo '<h3>課題4_5</h3>'.'<br>'.strlen('井上良太').'<br>';
echo mb_strlen('井上良太').'<br>';
echo '<br>';

//課題6
echo '<h3>課題4_6</h3>'.'<br>'.substr('xxx@gmail.com',3,10).'<br>';
echo '<br>';

//課題7
$find = array('い','う');
$conversion = array('I','U');
echo '<h3>課題4_7</h3>'.'<br>'.str_replace($find,$conversion,'きょうはぴいえいちぴいのくみこみかんすうのがくしゅうをしてます').'<br>';
echo '<br>';

//課題8
$file = file_get_contents('4_challenge.txt','r');

//課題9
echo '<h3>課題4_9</h3>'.'<br>'.$file;
echo '<br>';
?>
</body>
</html>
