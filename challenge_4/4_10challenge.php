
<?php
$file = ('challenge.php');//ファイル作成
  if(file_exists($file)) {
} else {
    touch($file);
}
$day = date('Y年,m月,d日');
$fp = fopen('challenge.php', 'a');
fwrite($fp,$day);
fwrite($fp, '開始<br>');
fclose($fp);

$html = '<p style="color:#4078c0;" >Hello!</p>';
$search = '#4078c0';
$replace = '#79b74a';
$result = str_replace($search, $replace, $html);

$fp = fopen('challenge.php', 'a');
fwrite($fp, '終了<br>');
fclose($fp);

$file_txt = file_get_contents('challenge.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題4_10</title>
</head>
<body>
<h1>課題4_10</h1>
<?php
echo $file.'ファイル作成しました。<br>';
?>

<?php
echo $result;
?>

<?php
echo $file_txt;
?>
</body>
</html>
