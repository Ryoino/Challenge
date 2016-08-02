<?php
session_start();
require_once("datebace.php");
require_once("scriptUtil.php");
?>

  <!doctype html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <title>ログイン/ログアウト</title>
  </head>
  <body>

<?php
  if (isset($_POST['mode']) && $_POST['mode'] == 'logout') {
    logout();
?>
      <p>ログアウトしました</p>
<?php
  }else{
    // POST値に名前とパスワードが存在し　かつ　名前とパスワードが一致した場合ログイン
    if(isset($_POST['name']) && isset($_POST['password'])) {
      // 名前とパスワードでヒットした登録者の情報を配列として格納
      $result = search_profiles($_POST ['name'], $_POST['password']);
      if ($_POST['name'] == $result[0]['name'] && $_POST['password'] == $result [0]['password']){
          // 各セッション情報に配列からの値を格納
          $_SESSION['userID'] = $result[0]['userID'];
          $_SESSION["name"] = $result[0]['name'];
          $_SESSION["userstate"] = 'login'; // ログインできる状態にする
          echo 'ログインしました。';
      }else{
        echo "ユーザー名またはパスワードが違います<br>";
      }
    }else{ ?>
      <p>ログイン</p>
      <form action="8_5challenge_login.php" method="POST">
        <p>ユーザー名:<input type="text" name="name"></p>
        <p>パスワード:<input type="text" name="password"></p>
        <input type="hidden" name="before" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <input type="submit" name="btnSubmit" value="ログイン">
      </form>
      <form action="8_5challenge_login.php" method="post">
        <input type="hidden" name="mode" value="logout">
        <input type="submit" name="btnSubmit" value="ログアウト">
      </form>
<?php
    }
  }
?>

<?php echo return_top();?>
</body>
</html>
