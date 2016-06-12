<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    //入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
    if(!$_POST['mode']=="CONFIRM"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
      //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
      $update_values = array(
                              'name' => bind_p2s('name'),
                              'year' => bind_p2s('year'),
                              'month' =>bind_p2s('month'),
                              'day' => bind_p2s('day'),
                              'type' => bind_p2s('type'),
                              'tell' => bind_p2s('tell'),
                              'comment' => bind_p2s('comment'));

      $id = $_SESSION['id'] = $_GET['id'];
      $name = $_SESSION['name'];
      //date型にするために1桁の月日を2桁にフォーマットしてから格納
      $birthday = $_SESSION['year'].'-'.sprintf('%02d',$_SESSION['month']).'-'.sprintf('%02d',$_SESSION['day']);
      $type = $_SESSION['type'];
      $tell = $_SESSION['tell'];
      $comment = $_SESSION['comment'];
      ?>
    <?php
    //1つでも未入力項目があったら表示しない
    if(!in_array(null,$update_values,true)){
      $result = update_profile($id,$name,$birthday,$type,$tell,$comment);
    ?>
    <?php
    //エラーが発生しなければ表示
    if(!isset($result)){
       ?>
    <h1>更新確認</h1><br>
    名前:<?php echo $update_values['name'];?><br>
    生年月日:<?php echo $update_values['year'].'年'.$update_values['month'].'月'.$update_values['day'].'日';?><br>
    種別:<?php echo ex_typenum($update_values['type']);?><br>
    電話番号:<?php echo $update_values['tell'];?><br>
    自己紹介:<?php echo $update_values['comment'];?><br><br>
    以上の内容で更新しました。<br>
    <?php
  }else {
    echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:';
  }
}
    ?>
    <?php
  if(in_array(null,$update_values,true)){
    ?>
      <h1>入力項目が不完全です</h1><br>
      再度入力を行ってください<br>
      <h3>不完全な項目</h3>
    <?php //連想配列内の未入力項目を検出して表示
        foreach ($update_values as $key => $value){
          if($value == null){
              if($key == 'name'){
                  echo '名前';
              }
              if($key == 'year'){
                  echo '年';
              }
              if($key == 'month'){
                  echo '月';
              }
              if($key == 'day'){
                  echo '日';
              }
              if($key == 'type'){
                  echo '種別';
              }
              if($key == 'tell'){
                  echo '電話番号';
              }
              if($key == 'comment'){
                  echo '自己紹介';
              }
              echo 'が未記入です<br>';
          }
      }
    }
      ?>
      <br>
          <form action="<?php echo UPDATE.'?id='.$_GET['id']; ?>" method="POST">
            <input type="hidden" name="mode"  value="CONFIRM">
            <input type="submit" name="return" value="入力画面に戻る">
          </form>

    <br><br>
     <?php }
     echo return_top();//トップページに戻る
     ?>
  </body>
</html>
