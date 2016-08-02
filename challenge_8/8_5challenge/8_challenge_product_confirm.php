<?php
session_start();
require_once("scriptUtil.php");
 ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
      //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
      $product = array(
                  'item' => bind_p2s('item'),
                  'count' => bind_p2s('count')
                  );
        //1つでも未入力項目があったら表示しない
        if(!in_array(null,$product,true)){
            ?>
            <h1>登録確認画面</h1><br>
            商品:<?php echo $product['item'];?><br>
            個数:<?php echo $product['count'];?><br>
            上記の内容で登録します。よろしいですか？

            <form action="8_challenge_product_result.php" method="POST">
            <input type="hidden" name="mode" value="RESULT">
            <input type="submit" name="yes" value="はい">
            </form>
            <?php
        }else {
            ?>
            <h1>入力項目が不完全です</h1><br>
            再度入力を行ってください<br>
            <h3>不完全な項目</h3>

            <?php
            //連想配列内の未入力項目を検出して表示
            $arr = array('商品' => $item['item'],'個数' => $item['count']);
            foreach ($arr as $key => $value){
              if ($value == null) {
                echo $key.'&nbsp;未入力です<br>';
              }
            }
        ?>
<?php }?>
    <br><br>

    <form action="8_challenge_product_insert.php" method="POST">
        <input type="hidden" name="mode"  value="REINPUT">
        <input type="submit" name="no" value="登録画面に戻る">
    </form>
        <?php echo return_top();?>
</body>
</html>
