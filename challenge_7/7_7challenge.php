<?php
//課題1
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "UPDATE profiles set name = '松岡修造', age = '48', birthday = '1967-11-06'  where profilesID = 1";
$query = $pdo_object->prepare($sql);
$query -> execute();
?>
