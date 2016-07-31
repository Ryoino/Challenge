<?php
require_once 'pdo-define.php';
require_once 'pdo-util.php';

if (isset($_POST[TIMETABLE_PAGE_SUBMIT])) {
    $isSubmit = true;

    if (!empty($_POST['teacher']) && !empty($_POST['subjects']) && !empty($_POST['weekday'])&& !empty($_POST['period'])) {

        $teacher = $_POST['teacher'];
        $subjects = $_POST['subjects'];
        $weekday = $_POST['weekday'];
        $period = $_POST['period'];

        $sql = 'INSERT INTO ' . DB_TBL_TIMETABLE . '(teacher,subject,weekday,period)';
        $sql .= 'Values (:teacher,:subject,:weekday,:period)';

        $reg_param = array();
        $reg_param[':teacher'] = $teacher;
        $reg_param[':subject'] = $subjects;
        $reg_param[':weekday'] = $weekday;
        $reg_param[':period'] = $period;

        try {
            $pdo = create_pdo();
            $timetable = pdo_insert($pdo, $sql, $reg_param);
            $pdo = null;
        } catch (Exception $ex) {
            $pdo = null;
            echo $ex->getMessage();
            exit;
        }
    } else {
        $errflg = true;
    }
}

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登録結果</title>
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
登録が完了しました

<p class="top_re"><a href="pdo-main.php">トップに戻る</a></p>
<div class="clear"></div>
</body>
</html>
