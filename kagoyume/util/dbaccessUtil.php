<?php
function connect2MySQL(){
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=kagoyume_db;charset=utf8','ryo','ryota0910');
		//SQL実行時のエラーをtry-catchで取得できるように設定
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} catch (PDOException $e) {
		die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
	}
}
//user_tからユーザー名とパスが一致するものを探し出す
function search_all_profiles($name,$pass){
	//db接続を確立
	$search_db = connect2MySQL();

	$search_sql = "select * from user_t where name= :name and password= :password";
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
//buy_tからユーザーのtotalを引き出す
function search_buy_total($userID){
	//db接続を確立
	$search_db = connect2MySQL();

	$search_sql = "select total from buy_t where userID=:userID";

	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);

	$search_query->bindValue(':userID',$userID);

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
//buy_tにレコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_buy($userid, $total, $type){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO buy_t(userID,total,type,buyDate)"
			. "VALUES(:userID,:total,:type,:buyDate)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':userID',$userid);
			$insert_query->bindValue(':total',$total);
			$insert_query->bindValue(':type',$type);
			$insert_query->bindValue(':buyDate',$date);
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
//user_tにレコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_user($name, $pass, $mail,$address){
	//db接続を確立
	$insert_db = connect2MySQL();
	//DBに全項目のある1レコードを登録するSQL
	$insert_sql = "INSERT INTO user_t(name,password,mail,address,newDate)"
			. "VALUES(:name,:password,:mail,:address,:newDate)";
			//現在時をdatetime型で取得
			$datetime =new DateTime();
			$date = $datetime->format('Y-m-d H:i:s');
			//クエリとして用意
			$insert_query = $insert_db->prepare($insert_sql);
			//SQL文にセッションから受け取った値＆現在時をバインド
			$insert_query->bindValue(':name',$name);
			$insert_query->bindValue(':password',$pass);
			$insert_query->bindValue(':mail',$mail);
			$insert_query->bindValue(':address',$address);
			$insert_query->bindValue(':newDate',$date);
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
//ユーザーの総購入金額を参照
function search_users_total($userID){
	//db接続を確立
	$search_db = connect2MySQL();
	$search_sql = "select total from user_t where userID=:userID";
	//クエリとして用意
	$search_query = $search_db->prepare($search_sql);
	$search_query->bindValue(':userID',$userID);
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
//TOTALの総和をuser_tへ更新
function update_profile($total,$userID){
	$update_db = connect2MySQL();
	$update_sql = "UPDATE user_t set total=:total where userID=:userID";
	//クエリとして用意
	$update_query = $update_db->prepare($update_sql);
	$update_query->bindValue(':total',$total);
	$update_query->bindValue(':userID',$userID);
	//SQLを実行
	try{
		$update_query->execute();
	} catch (PDOException $e) {
		$update_query=null;
		return $e->getMessage();
	}
}
//更新フォームから受け取った値全てでテーブルを上書きする
function update_usertable($name,$password,$mail,$address,$userID){
	$update_db = connect2MySQL();
	$update_sql = "UPDATE user_t set name=:name,password=:password,mail=:mail,address=:address where userID=:userID";
	//クエリとして用意
	$update_query = $update_db->prepare($update_sql);
	$update_query->bindValue(':name',$name);
	$update_query->bindValue(':password',$password);
	$update_query->bindValue(':mail',$mail);
	$update_query->bindValue(':address',$address);
	$update_query->bindValue(':userID',$userID);
	//SQLを実行
	try{
		$update_query->execute();
	} catch (PDOException $e) {
		$update_query=null;
		return $e->getMessage();
	}
}
function profile_detail($id){
	//db接続を確立
	$detail_db = connect2MySQL();
	$detail_sql = "SELECT * FROM user_t WHERE userID=:id";
	//クエリとして用意
	$detail_query = $detail_db->prepare($detail_sql);
	$detail_query->bindValue(':id',$id);
	//SQLを実行
	try{
		$detail_query->execute();
	} catch (PDOException $e) {
		$detail_query=null;
		return $e->getMessage();
	}
	//レコードを連想配列として返却
	return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}
//該当ユーザーidを持つ購入レコードを削除する
function delete_buytable($id){
	//db接続を確立
	$delete_db = connect2MySQL();
	$delete_sql = "DELETE FROM buy_t WHERE userID=:id";
	//クエリとして用意
	$delete_query = $delete_db->prepare($delete_sql);
	$delete_query->bindValue(':id',$id);
	//SQLを実行
	try{
		$delete_query->execute();
	} catch (PDOException $e) {
		$delete_query=null;
		return $e->getMessage();
	}
	return null;
}
//該当idを持つユーザーデータを削除する
function delete_profile($id){
	//db接続を確立
	$delete_db = connect2MySQL();
	$delete_sql = "DELETE FROM user_t WHERE userID=:id";
	//クエリとして用意
	$delete_query = $delete_db->prepare($delete_sql);
	$delete_query->bindValue(':id',$id);
	//SQLを実行
	try{
		$delete_query->execute();
	} catch (PDOException $e) {
		$delete_query=null;
		return $e->getMessage();
	}
	return null;
}
