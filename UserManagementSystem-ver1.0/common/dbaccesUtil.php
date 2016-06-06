<?php
//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

//課題7
function insert_result($name,$birthday,$tell,$type,$comment){
//db接続を確立
$insert_db = connect2MySQL();

//DBに全項目のある1レコードを登録するSQL
$insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate) VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

$datetime = new DateTime();
$date = $datetime-> format('Y-m-d H:i:s');
//クエリとして用意
$insert_query = $insert_db->prepare($insert_sql);

//SQL文にセッションから受け取った値＆現在時をバインド
$today = date("Y-m-d H:i:s");//課題6
$insert_query->bindValue(':name',$name);
$insert_query->bindValue(':birthday',$birthday);
$insert_query->bindValue(':tell',$tell);
$insert_query->bindValue(':type',$type);
$insert_query->bindValue(':comment',$comment);
$insert_query->bindValue(':newDate',$today);

//SQLを実行 課題8
try {
  $insert_query->execute();
} catch (PDOException $e) {
  $insert_db=null;
  return $e->getMessage();
}

//接続オブジェクトを初期化することでDB接続を切断

}
?>
