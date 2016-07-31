<?php

require_once 'pdo-define.php';
require_once 'pdo-util.php';


try {
    $pdo = create_pdo();

    $sql_select_timetable = 'SELECT * FROM ' . DB_TBL_TIMETABLE;

    $timetable = pdo_select($pdo, $sql_select_timetable);

    $pdo = null;

} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>時間割</title>
<style>

th{
  font-size: 30px;
  padding-left:40px;
  padding-right:40px;
  padding-top:20px;
  padding-bottom:20px;
}
td{
  text-align:center;
  border-style: 1px solid;
}
#rest{
  text-align: center;
  font-size: 30px;
}
#title{
  font-size: 20px;
}
.time{
  font-size: 20px;
}
.subject{
  font-size: 30px;
}
.teacher{
  font-size: 10px;
}
.top_re{
  float: right;
}
.clear{
  clear: both;
}
</style>
</head>
<body>


<table border="1">
<tr><th id="title">○×塾の<br>時間割</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th></tr>
<tr><th class="time">1</th>
  <td><?php  foreach ($timetable as $key => $value) {//一時間目
                  if ($timetable[$key]['weekday'] == 'monday' && $timetable[$key]['period'] == 1) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'tuesday' && $timetable[$key]['period'] == 1) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'wednesday' && $timetable[$key]['period'] == 1) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'thursday' && $timetable[$key]['period'] == 1) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
              if ($timetable[$key]['weekday'] == 'friday' && $timetable[$key]['period'] == 1) {
             echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
</th>
<tr><th class="time">2</th>
  <td><?php  foreach ($timetable as $key => $value) {//二時間目
                  if ($timetable[$key]['weekday'] == 'monday' && $timetable[$key]['period'] == 2) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'tuesday' && $timetable[$key]['period'] == 2) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'wednesday' && $timetable[$key]['period'] == 2) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'thursday' && $timetable[$key]['period'] == 2) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
              if ($timetable[$key]['weekday'] == 'friday' && $timetable[$key]['period'] == 2) {
             echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
</th>
<tr><th class="time">3</th>
  <td><?php  foreach ($timetable as $key => $value) {//三時間目
                  if ($timetable[$key]['weekday'] == 'monday' && $timetable[$key]['period'] == 3) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'tuesday' && $timetable[$key]['period'] == 3) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'wednesday' && $timetable[$key]['period'] == 3) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'thursday' && $timetable[$key]['period'] == 3) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
              if ($timetable[$key]['weekday'] == 'friday' && $timetable[$key]['period'] == 3) {
             echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
</th>
<tr><th class="time">4</th>
  <td><?php  foreach ($timetable as $key => $value) {//四時間目
                  if ($timetable[$key]['weekday'] == 'monday' && $timetable[$key]['period'] == 4) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'tuesday' && $timetable[$key]['period'] == 4) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'wednesday' && $timetable[$key]['period'] == 4) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'thursday' && $timetable[$key]['period'] == 4) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
              if ($timetable[$key]['weekday'] == 'friday' && $timetable[$key]['period'] == 4) {
             echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
</th>
<tr><th>休</th>
    <td id="rest" colspan="5">お昼休み</td>
</tr>
<tr><th class="time">5</th>
  <td><?php  foreach ($timetable as $key => $value) {//五時間目
                  if ($timetable[$key]['weekday'] == 'monday' && $timetable[$key]['period'] == 5) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'tuesday' && $timetable[$key]['period'] == 5) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'wednesday' && $timetable[$key]['period'] == 5) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
                  if ($timetable[$key]['weekday'] == 'thursday' && $timetable[$key]['period'] == 5) {
                 echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                    '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
  <td><?php  foreach ($timetable as $key => $value) {
              if ($timetable[$key]['weekday'] == 'friday' && $timetable[$key]['period'] == 5) {
             echo '<span class="subject">'.$timetable[$key]['subject'].'<br>
                '.'<span class="teacher">'.'担当：'.$timetable[$key]['teacher'];}}?></td>
</th>
</table>

<p class="top_re"><a href="pdo-main.php">トップに戻る</a></p>
<div class="clear"></div>
</body>
</html>
