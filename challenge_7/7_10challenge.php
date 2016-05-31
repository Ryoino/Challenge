<?php
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "DELETE from profiles where profilesID = ";
$query = $pdo_object->prepare($sql);
$query -> execute();
 ?>
