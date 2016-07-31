<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>タイムテーブル入力画面</title>
<style>
.top_re{
  float: right;
}
.clear{
  clear: both;
}
</style>
</head>
<body>
<form action="result_timetable.php" method="post">
<div>
  担任：<select name="teacher">
            <option value="">----</option>
            <option value="西村">西村</option>
            <option value="磯村">磯村</option>
            <option value="上代">上代</option>
            <option value="篠田">篠田</option>
            <option value="兼田">兼田</option>
            <option value="山野">山野</option>
            <option value="井上">井上</option>
            <option value="辻">辻</option>
            <option value="蒔苗">蒔苗</option>
            <option value="渡部">渡部</option>
            <option value="岡部">岡部</option>
            <option value="鈴木">鈴木</option>
            <option value="添田">添田</option>
            <option value="青木">青木</option>
            <option value="林">林</option>
            <option value="小山">小山</option>
            <option value="自習">自習</option>
          </select>
</div>
<br><br>
<div>
  科目名：<select name="subjects">
            <option value="">----</option>
            <option value="国語">国語</option>
            <option value="数学">数学</option>
            <option value="理科">理科</option>
            <option value="社会">社会</option>
            <option value="英語">英語</option>
            <option value="体育">体育</option>
            <option value="図工">図工</option>
            <option value="美術">美術</option>
            <option value="技術">技術</option>
            <option value="家庭">家庭</option>
            <option value="音楽">音楽</option>
            <option value="道徳">道徳</option>
            <option value="Camp">Camp</option>
          </select>
</div>
<br><br>
<div>
  月曜日：<input type="radio" name="weekday" value="monday"><br>
  火曜日：<input type="radio" name="weekday" value="tuesday"><br>
  水曜日：<input type="radio" name="weekday" value="wednesday"><br>
  木曜日：<input type="radio" name="weekday" value="thursday"><br>
  金曜日：<input type="radio" name="weekday" value="friday">
</div>
<br><br>
<div>
  1時間目：<input type="radio" name="period" value="1"><br>
  2時間目：<input type="radio" name="period" value="2"><br>
  3時間目：<input type="radio" name="period" value="3"><br>
  4時間目：<input type="radio" name="period" value="4"><br>
  5時間目：<input type="radio" name="period" value="5">
</div>

<br><br>
<input type="hidden" name="btnTimetable" value="timetable">
<input type="submit" name="btnsubmit" value="登録">
</form>

<p class="top_re"><a href="pdo-main.php">トップに戻る</a></p>
<div class="clear"></div>
</body>
</html>
