<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/defineUtil.php'; ?>
<?php session_start();?>
<?php
$name = isset($_POST['name'])?$_POST['name']:null;
$year = isset($_POST['year'])?$_POST['year']:null;
$moth = isset($_POST['month'])?$_POST['month']:null;
$day = isset($_POST['day'])?$_POST['day']:null;
$type = isset($_POST['type'])?($_POST['type']):null;
$post = isset($_POST['tell'])?($_POST['tell']):null;
$comment = isset($_POST['comment'])?($_POST['comment']):null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>登録確認画面</title>
<!--css追加-->
<style>
#yes{
  float: left;
  margin-right: 20px;
}
</style>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day'])
    && !empty($_POST['type']) && !empty($_POST['tell']) && !empty($_POST['comment'])){

        $name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        $type = $_POST['type'];
        $tell = $_POST['tell'];
        $comment = $_POST['comment'];

        //セッション情報に格納
        $_SESSION['name'] = $name;
        $_SESSION['birthday'] =$birthday;
        $_SESSION['year'] = $year;
        $_SESSION['month'] = $moth;
        $_SESSION['day'] = $day;
        $_SESSION['type'] = $type;
        $_SESSION['tell'] = $tell;
        $_SESSION['comment'] = $comment;
    ?>

        <h1>登録確認画面</h1><br>
        <p>名前:<?php echo $name;?></p>
        <p>生年月日:<?php echo $birthday;?></p>
        <p>種別:<?php echo $type;?></p>
        <p>電話番号:<?php echo $tell;?></p>
        <p>自己紹介:<?php echo $comment;?></p>

        <!--<h3>追加-->
        <h3>上記の内容で登録します。よろしいですか？</h3>
        <form action="<?php echo INSERT_RESULT ?>" method="POST">
        <span id=yes><input type="submit" name="yes" value="はい"></span>
        <input type="hidden" name="invisible" value="prohibition">
        </form>
        <p><form action="<?php echo INSERT ?>" method="POST"></p>
            <input type="submit" name="no" value="登録画面に戻る">
        </form>

    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください
        <!--課題3-->
        <?php
        if(empty($_POST['name'])){
          echo '<p>名前：未入力</p>';
        }
        if(empty($_POST['year'])){
          echo '<p>年：未入力</p>';
        }
        if(empty($_POST['month'])){
          echo '<p>月：未入力</p>';
        }
        if(empty($_POST['day'])){
          echo '<p>日：未入力</p>';
        }
        if(empty($_POST['type'])){
          echo '<p>種別：未入力</p>';
        }
        if(empty($_POST['tell'])){
          echo '<p>電話番号：未入力</p>';
        }
        if(empty($_POST['comment'])){
          echo '<p>自己紹介文：未入力</p>';
        }
        ?>

        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }?>
<br><br>
    <?php echo return_top(); ?><!--課題1-->

</body>
</html>
