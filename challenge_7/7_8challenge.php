<?php
$name = isset($_POST['name']) ? $_POST['name'] : null;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>
<body>
  <form enctype="multipart/form-data" action="7_8challenge.php" method="post">
  <input type="text" name="name" value="">
  <input type="submit" value="検索">
  </from>

<?php
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "SELECT * from profiles where name like '%$name%'";
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
