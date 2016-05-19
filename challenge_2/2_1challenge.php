<!doctype.html>
<html>
<head>
<meta charset="utf8" />
<title>課題2_1/title>
</head>
<body>
  <h1>課題2_1</h1>
  <?php
  $value = 2;
  switch ($value ) {
    case 1:
      echo 'one';
      break;
  case 2:
        echo '値は　two　です!';
        break;
    default:
        echo '想定外';
    break;
  }
  ?>
</body>
</html>
