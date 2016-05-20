<!doctype.html>
<html>
<head>
<meta charset="utf8" />
<title>課題3_3</title>
</head>
<body>
<h1>課題3_3</h1>
<?php
function calc($seven,$num = 5,$type = 'false'){
      $result_plus = $seven * $num;
    if ($type == false){
      echo $result_plus;
    }
    else {
      echo $result_plus * $result_plus;
    }
  }
  $answer = calc(7,9,'ture');
  echo $answer;
?>
</body>
</html>
