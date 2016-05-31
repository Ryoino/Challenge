<?php
//課題2
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "INSERT INTO profiles values(6,'井上良太','080-xxxx-xxxx',25,'1990-9-12')";
$query = $pdo_object->prepare($sql);
$query -> execute();
?>
