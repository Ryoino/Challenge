<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','hayashi','password');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $birthday, $type, $tell, $comment){
    //db接続を確立
    $insert_db = connect2MySQL();
    
    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
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

function serch_all_profiles(){
    //db接続を確立
    $search_db = connect2MySQL();
    
    $search_sql = "SELECT * FROM user_t";
    
    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);
    
    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $seatch_query=null;
        return $e->getMessage();
    }
    
    //全レコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */
function serch_profiles($name=null,$year=null,$type=null){
    //db接続を確立
    $search_db = connect2MySQL();
    
    $search_sql = "SELECT * FROM user_t";
    $flag = false;
    if(isset($name)){
        $search_sql .= " WHERE name like :name";
        $flag = true;
    }
    if(isset($year) && $flag = false){
        $search_sql .= " WHERE birthday like :year";
        $flag = true;
    }else if(isset($year)){
        $search_sql .= " AND birthday like :year";
    }
    if(isset($type) && $flag = false){
        $search_sql .= " WHERE type = :type";
    }else if(isset($type)){
        $search_sql .= " AND type = :type";
    }
    
    //クエリとして用意
    $seatch_query = $search_db->prepare($search_sql);
    
    $seatch_query->bindValue(':name','%'.$name.'%');
    $seatch_query->bindValue(':year','%'.$year.'%');
    $seatch_query->bindValue(':type',$type);
    //SQLを実行
    try{
        $seatch_query->execute();
    } catch (PDOException $e) {
        $seatch_query=null;
        return $e->getMessage();
    }
    
    //該当するレコードを連想配列として返却
    return $seatch_query->fetchAll(PDO::FETCH_ASSOC);
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

function delete_profile($id){
    //db接続を確立
    $delete_db = connect2MySQL();
    
    $delete_sql = "DELEtE * FROM user_t WHERE userID=:id";
    
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