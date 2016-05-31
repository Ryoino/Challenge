<?php
try{
$pdo_object =
new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}
$sql = "SELECT * FROM profiles where profilesID = 6";
$query = $pdo_object ->prepare($sql);
$query ->execute();
$result = $query->fetchall(PDO::FETCH_ASSOC);
var_dump($result);
?>
