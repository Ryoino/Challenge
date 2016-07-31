

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題3_1</title>
</head>

<body>

<h2>プロフィール</h2>

<?php
     function my_profile(){
       $name         = '井上良太';
       $birthdate   = '1990年9月12日';
       $hobby      = 'フットサル、読書、映画、料理';
       return true;
     }
     $profile = my_profile();
     if ($profile == true) {
       echo 'この処理は正しく実行できました';
     }else {
       echo '正しく実行できませんでした';
     }
?>

</body>
</html>
