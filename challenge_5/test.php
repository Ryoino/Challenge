<?php
$sei = isset($_GET['sei']) ? $_GET['sei'] : null;
$mei = isset($_GET['mei']) ? $_GET['mei'] : null;
$gender = isset($_GET['gender']) ? $_GET['gender'] : null;
$hobby = isset($_GET['hobby']) ? $_GET['hobby'] : null;

setcookie('sei',$sei);
setcookie('mei',$mei);
setcookie('gender',$gender);
setcookie('hobby',$hobby);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題5_7</title>
</head>
<body>
  <p><?php echo $sei; ?><?php echo $mei; ?></p>
  <p><?php echo $gender; ?></p>
  <p><?php echo $hobby; ?></p>
<form class="" action="5_7challenge.php" method="post">
  <input type="submit" name="name" value="戻る">

</form>

</body>
</html>
