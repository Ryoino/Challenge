<?php
session_start();
require_once("scriptUtil.php");
require_once("datebace.php");
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
    <body>
    <?php
    if($_POST['mode']!=="RESULT"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
    if (!isset($_SESSION['userID'])) {
      echo '<a href="8_5challenge_login.php">ログインを行って下さい。</a>';
    }else {
        $item = $_SESSION['item'];
        $count = $_SESSION['count'];

        //データのDB挿入処理。エラーの場合のみエラー文がセットされる。成功すればnull
        $result = insert_product($item,$count);

        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>登録結果画面</h1>
        商品:<?php echo $item;?><br>
        個数:<?php echo $count;?><br>
        <?php
        }else{
            echo 'データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$result;
        }
    }
  }

    echo return_top();
    ?>
    </body>
</html>
