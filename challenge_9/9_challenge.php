<?php
//基本クラス
abstract class base{
    abstract protected function load();
    abstract public function show();
    protected function connect_2DB(){
          try{
              $pdo = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8','ryo','ryota0910');
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              return $pdo;
          } catch (PDOException $e) {
              die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
          }
    }
}
//人クラス
class human extends base{
    private $table = "";
    function __construct($tablename){
        $this->table = $tablename;
    }
    protected function load(){
        $selectDB = $this->connect_2DB();
        //SQL文
        $select_sql = "SELECT * FROM $this->table";
        //クエリとして用意
        try{
            $select_query = $selectDB -> prepare($select_sql);
            $select_query -> execute();
        }
        catch (PDOException $select_e) {
            $select_query = null;
            echo $select_e -> getMessage();
        }
        return $select_query -> fetchall(PDO::FETCH_ASSOC);
    }
    public function show(){
        $Human = $this->load();
        foreach($Human as $values){
            echo $values['name'].'<br>';
        }
    }
}
//駅クラス
class station extends base{
    private $table = "";
    function __construct($tablename){
        $this->table = $tablename;
    }
    protected function load(){
        $selectDB = $this-> connect_2DB();
        $select_sql = "SELECT * FROM $this->table";
        $select_query = $selectDB -> prepare($select_sql);
        try{
            $select_query -> execute();
        } catch (PDOException $select_e) {
            $select_query = null;
            echo $select_e -> getMessage();
        }
        return $select_query->fetchall(PDO::FETCH_ASSOC);
    }
    public function show(){
        $Station = $this->load();
        foreach($Station as $values){
            echo $values['name'].'<br>';
        }
    }
}

$human_show = new Human('human');
$human_show -> show();
echo '<br><br>';
$station_show = new Station('station1');
$station_show -> show();

 ?>
