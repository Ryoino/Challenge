<?php
function connect2MySQL(){
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','ryo','ryota0910');
		//SQL実行時のエラーをtry-catchで取得できるように設定
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $e) {
		die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
	}

}function insert_user($name,$ps){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO registration(name,password)"
			. "VALUES(:name,:password)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':name',$name);
			$insert_query->bindValue(':password',$ps);
			//SQLを実行
			try{
				$insert_query->execute();
			} catch (PDOException $e) {
				//接続オブジェクトを初期化することでDB接続を切断
				$insert_db=null;
				return $e->getMessage();
			}
			$insert_db=null;
			return null;
}

function search_profiles($name,$pass){
	//db接続を確立
	$search_db = connect2MySQL();

	$search_sql = "SELECT * from registration where name= :name and password= :password";
	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);

	$search_query->bindValue(':name',$name);
	$search_query->bindValue(':password',$pass);
	//SQLを実行
	try{
		$search_query->execute();
	} catch (PDOException $e) {
		$search_query=null;
		return $e->getMessage();
	}
	//全レコードを連想配列として返却
	return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_product($item,$count){
    //db接続を確立
    $insert_db = connect2MySQL();

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO product(item,count)"
            . "VALUES(:item,:count)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':item',$item);
    $insert_query->bindValue(':count',$count);
    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $e) {
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        return $e->getMessage();
    }

    $insert_db=null;
    return null;
}

function search_item($product){
    //db接続を確立
    $search_db = connect2MySQL();

    $search_sql = " SELECT item,count FROM product WHERE item = '$product' ";


    //クエリとして用意
    $search_query = $search_db->prepare($search_sql);

    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $e) {
        $search_query=null;
        return $e->getMessage();
    }

    //全レコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

?>
