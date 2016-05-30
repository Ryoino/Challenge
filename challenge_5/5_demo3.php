<?php
    session_start();
    $_SESSION['last_access1']=time();

    require_once '5_demo4.php';
    require_once '5_demo6.php';

    if(!isset($_COOKIE['login_count']) && !isset($_COOKIE['last_login'])){
        $lcount = 1;
        $llogin = time();
        setcookie('login_count',$lcount);
        setcookie('last_login',$llogin);
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else if($_COOKIE['PHPSESSID']!=$_COOKIE['SAVEDPHPSESSID']){
        setcookie('login_count',$_COOKIE['login_count']+1);
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
        setcookie('last_login',time());
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else{
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
    }

    session_chk();

    $get_data = array();

    if(!empty($_GET['name'])){
        $get_data['name'] = $_GET['name'];
    }
    if(!empty($_GET['year'])){
        $get_data['year'] = $_GET['year'];
    }
    if(!empty($_GET['month'])){
        $get_data['month'] = $_GET['month'];
    }
    if(!empty($_GET['date'])){
        $get_data['date'] = $_GET['date'];
    }
    if(!empty($_GET['bbs'])){
        $get_data['bbs'] = $_GET['bbs'];
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo SHOW ?></title>
</head>
<body>
    <h1>干支&星座判定結果</h1>
    <?php
    if(!isset($get_data['name']) || !isset($get_data['year'])
            || !isset($get_data['month']) || !isset($get_data['date'])){
        echo '入力データが不十分です。もう一度入力を行ってください。';
    }else{
        echo $get_data['name'].'さんの干支は '.get_eto($get_data['year']).' です。<br>';
        echo $get_data['name'].'さんの星座 '.get_seiza($get_data['month'],$get_data['date']).' です。<br>';
        echo $get_data['bbs'];
    }
    ?>
</body>
</html>
