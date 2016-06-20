<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();

?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>登録情報確認</title>
		<link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
		<link href="../css/animation/animation.css" rel="stylesheet">
		<link href="../css/style/style.css" rel="stylesheet">
		<link href="../css/style/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style/landing-page.css" rel="stylesheet">
		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">>
	</head>
<body>
<?php header_top();//全ページ共通ヘッダー?>
<div class="content">
<?php
//入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
if(!isset($_POST['mode']) or !$_POST['mode']=="CONFIRM"){//アクセスルートチェック
	echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
	//ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
	$confirm_values = array(
			'name' => bind_p2s('name'),
			'mail' => bind_p2s('mail'),
			'pass' => bind_p2s('pass'),
			'pass2' =>bind_p2s('pass2'),
			'address' => bind_p2s('address'),
	);

	if($_POST['pass'] != $_POST['pass2']){ //パスワードの確認機能
?>		<h1>確認用のパスワードに誤りがあります</h1><br>
		再度入力を行ってください<br>
		<form action="<?php echo REGISTRATION ?>" method="POST">
			<input type="hidden" name="mode" value="REINPUT" >
			<input type="submit" name="no" value="登録画面に戻る">
		</form>
<?php	exit();
 	}

        //1つでも未入力項目があったら表示しない
     if(!in_array(null,$confirm_values, true)){
            ?>

           ユーザー名:<?php echo $confirm_values['name'];?><br>
	   パスワード:<?php echo mb_strlen($confirm_values['pass']).'文字のパスワード';?><br>
           メールアドレス:<?php echo $confirm_values['mail'];?><br>
           住所:<?php echo $confirm_values['address'];?><br>

           上記の内容で登録します。よろしいですか？

            <form action="<?php echo REGISTRATION_COMPLETE ?>" method="POST">
                <input type="hidden" name="mode" value="RESULT" >
                <input type="submit" name="yes" value="はい">
            </form>
            <?php
     }else{
            ?>
            <h1>入力項目が不完全です</h1><br>
            再度入力を行ってください<br>
            <h3>不完全な項目</h3>
            <?php
            //連想配列内の未入力項目を検出して表示
            foreach ($confirm_values as $key => $value){
                if($value == null){
                    if($key == 'name'){
                        echo '名前';
                    }
                    if($key == 'mail'){
                        echo 'メールアドレス';
                    }
                    if($key == 'address'){
                        echo '住所';
                    }
                    if($key == 'pass'){
                    	echo 'パスワード';
                    }
                    if($key == 'pass2'){
                    	break;
                    }
                    echo 'が未記入です<br>';
                }
            }
        }
        ?>

        <form action="<?php echo REGISTRATION ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
			</div>
        <?php }?>
<br><br>
				<?php echo return_top(); ?>
</body>
</html>
