<?php
$name = isset($_POST['name']) ? $_POST['name'] : null;
$age = isset($_POST['age']) ? $_POST['age'] : null;
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : null;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題7_12</title>
</head>
<body>
  <form enctype="multipart/form-data" action="7_12challenge.php" method="post">
  名前：<input type="text" name="name" value=""><br>
  年齢：<input type="text" name="age" value=""><br>
  誕生日：<input type="text" name="birthday" value=""><br>
  <input type="submit" value="検索">
  </from>

<?php
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "SELECT * from profiles where $name and $age and $birthday";
$query = $pdo_object->prepare($sql);
$query -> execute();
$result = $query->fetchall(PDO::FETCH_ASSOC);
foreach ($result as $value){
foreach ($value as $answer){
      echo $answer;
    }
  }
?>

</body>
</html>
