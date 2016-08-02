<?php
session_start();
require_once("scriptUtil.php");
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="8_challenge_product_confirm.php" method="POST">
        商品:
        <select name="item">
          <option value="">----</option>
          <option value="ボール"<?php if("ボール"==form_value('item')){echo "selected";}?>>ボール</option>
          <option value="スパイク"<?php if("スパイク"==form_value('item')){echo "selected";}?>>スパイク</option>
          <option value="ユニフォーム"<?php if("ユニフォーム"==form_value('item')){echo "selected";}?>>ユニフォーム</option>
        </select>
        <br><br>

        個数:
        <select name="count">
            <option value="">----</option>
            <?php
            for($i=1; $i<=10; $i++){ ?>
            <option value="<?php echo $i;?>" <?php if($i==form_value('count')){echo "selected";}?>><?php echo $i;?></option>
            <?php } ?>
        </select>
<br><br>
        <input type="hidden" name="mode"  value="RESULT">
        <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>

<br><br>
    <?php echo return_top(); ?>
</body>
</html>
