<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
  <h1>入力画面</h1>
  <?php
//入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
if(!$_POST['mode']=="CONFIRM"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
  ?>
    <form action="<?php echo UPDATE_RESULT.'?id='.$_GET['id']; ?>" method="POST">
    <?php
    $result = profile_detail($_GET['id']);
    ?>

    名前:
    <input type="text" name="name" value="<?php echo form_value('name');?>">
    <br><br>

    生年月日:
    <select name="year">
        <option value="">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php if($i==form_value('year')){echo "selected";}?>><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?><?php if($i==form_value('month')){echo "selected";}?>"><?php echo $i;?></option>
        <?php } ;?>
    </select>月
    <select name="day">
        <option value="">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>"<?php if($i==form_value('day')){echo "selected";}?>><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <?php
    for($i = 1; $i<=3; $i++){ ?>
    <input type="radio" name="type" value="<?php echo $i; ?>"<?php if($i==form_value('type')){echo "checked";}?>><?php echo ex_typenum($i);?><br>
    <?php } ?>
    <br>

    電話番号:
    <input type="text" name="tell" value="<?php echo form_value('tell');?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo form_value('comment');?></textarea><br><br>

    <input type="hidden" name="mode"  value="CONFIRM">
    <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <form action="<?php echo RESULT_DETAIL.'?id='.$_GET['id'];?>" method="POST">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>

    <br><br>
    <?php
  }echo return_top(); //トップページに戻る
    ?>
</body>

</html>
