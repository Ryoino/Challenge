<?php
//トップページへのリンクのaタグ
function return_top(){
    return'<a href="8_challenge_top.php">トップへ戻る</a>';
}

// ポストの値チェックをしてからセッションに格納する
//二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
function bind_p2s($name){
  if (isset($_POST[$name])){
    $_SESSION[$name] = $_POST[$name];
    return $_POST[$name];
  }else {
    $_POST[$name] = null;
    return null;
  }
}
function login(){
  if(isset($_SESSION['userstate']) && $_SESSION['userstate'] =='login'){ // セッションが'login'状態ならリンクつき名前とログアウトボタンを表示
    return '
    <form action="login.php" method="POST" ;">
        ようこそ'.$_SESSION['name'].'さん
        <input type="submit" name="logout" value="ログアウト">
        <input type="hidden" name="mode" value="logout">
      </form>';
  } else { // セッションが'login'状態でないならログインと会員登録のリンクを設置
    return '<a href=' . LOGIN . '>ログイン</a>
            <a href=' . REGISTRATION . '>会員登録</a>';
  }
}
// ログアウト時のセッション内の情報のリセット
function logout(){
  session_unset();
  if (isset($_COOKIE['PHPSESSID'])) {
    // セッションの情報を初期化する
    setcookie('PHPSESSID', '', time() - 1800, '/');
  }
  // セッションに登録されたデータを全て破棄
  session_destroy();
}

function form_value($name){
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
}
 ?>
