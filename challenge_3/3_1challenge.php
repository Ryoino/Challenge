<?php
function my_profile(){
  for ($i=0; $i < 10 ; $i++) {
    echo "氏名　　：井上良太<br>";
    echo "生年月日：1990年9月12日<br>";
    echo "趣味　　：フットサル、読書、映画、料理<br>
  　宜しくお願い致します。<br>";
    echo "<p></p>";
  }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題3_1</title>
</head>

<body>

<h2>プロフィール</h2>
<p><?php my_profile();?></p>

</body>
</html>
