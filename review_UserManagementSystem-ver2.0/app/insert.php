<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <?php session_start();//再入力時用 ?>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
                
        名前:
        <input type="text" name="name" value="<?php echo form_value('name'); ?>">
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
            <option value="<?php echo $i;?>" <?php if($i==form_value('month')){echo "selected";}?>><?php echo $i;?></option>
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
        <input type="text" name="tell" value="<?php echo form_value('tell'); ?>">
        <br><br>

        自己紹介文
        <br>
        <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo form_value('comment'); ?></textarea><br><br>
        
        <input type="hidden" name="mode"  value="CONFIRM">
        <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    
    <?php echo return_top(); ?>
</body>
</html>
