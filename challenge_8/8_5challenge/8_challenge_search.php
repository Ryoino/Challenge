<?php
session_start();
require_once("scriptUtil.php");
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索画面</title>
</head>

<body>
    <form action="8_challenge_search_result.php" method="POST">
        商品:
        <select name="item">
          <option value="">----</option>
          <option value="ボール"<?php if("ボール"==form_value('item')){echo "selected";}?>>ボール</option>
          <option value="スパイク"<?php if("スパイク"==form_value('item')){echo "selected";}?>>スパイク</option>
          <option value="ユニフォーム"<?php if("ユニフォーム"==form_value('item')){echo "selected";}?>>ユニフォーム</option>
        </select>
        <br><br>

          <input type="hidden" name="mode" value="RESULT">
        <input type="submit" name="btnSubmit" value="検索">
        </form>
</body>

</html>
