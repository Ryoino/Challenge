
<!doctype.html>
<html>
<head>
<meta charset="utf8" />
<title>課題3_2</title>
</head>
<body>
  <h1>課題3_2</h1>

  <?php
   function view_profile($num){
    if ($num % 2 == 1) {
      echo $num."は奇数です";
    }
    else {
      echo $num."は偶数です";
    }
   view_profile(7);
   ?>
</body>
</html>
