<?php require_once '../common/scriptUtil.php'; //トップページに戻るためrequire追加?>
<?php require_once '../common/defineUtil.php'; ?>
<?php session_start();?>

<!--セッッションに格納-->
<?php
$name = isset($_SESSION['name']) ? $_SESSION['name'] : null;
$year = isset($_SESSION['year']) ? $_SESSION['year'] : null;
$month = isset($_SESSION['month']) ? $_SESSION['month'] : null;
$day = isset($_SESSION['day']) ? $_SESSION['day'] : null;
$type = isset($_SESSION['type']) ? $_SESSION['type'] : null;
$tell = isset($_SESSION['tell']) ? $_SESSION['tell'] : null;
$comment = isset($_SESSION['comment']) ? $_SESSION['comment'] : null;

	//種別
	if($type=='エンジニア'){
	 $engineer = 'checked';
}else{
	$engineer = null;
 }
 if($type =='営業'){
 	$sales ='checked';
 }else{
 	$sales = null;
  }
  if($type =='その他'){
  	$other = 'checked';
  }else{
  	$other = null;
   }
  ?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value="<?php echo $name;?>">
    <br><br>

    生年月日:
    <select name="year">
        <option value= <?php null;?>>----</option> <!--課題2-->
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>"<?php if($i==$year){//課題4
					echo 'selected';
				};?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年

    <select name="month">
        <option value= <?php null;?>>--</option><!--課題2-->
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>"<?php if($i==$month){//課題4
					echo 'selected';
				};?>><?php echo $i ;?></option>
        <?php } ;?>
    </select>月

    <select name="day" >
        <option value= <?php null;?>>--</option><!--課題2-->
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i;?>"<?php if($i==$day){//課題4
					echo 'selected';
				};?>><?php echo $i ;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア"<?php echo $engineer;?>>エンジニア<br><!--課題4-->
    <input type="radio" name="type" value="営業" <?php echo $sales;?>>営業<br><!--課題4-->
    <input type="radio" name="type" value="その他" <?php echo $other;?>>その他<br><!--課題4-->
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo $tell;?>"><!--課題4-->
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment?></textarea><br><br>

    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
		<br><br>
		
		    <?php echo return_top(); ?><!--課題1-->
</body>
</html>
