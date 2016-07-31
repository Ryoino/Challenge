<?php
require_once 'pdo-define.php';
require_once 'pdo-util.php';

function get_select_subjects($select='', $subjects=array()) {
    $arrSelect = explode(',', $select);
    $selectName = array();

    foreach($arrSelect as $id) {
        foreach($subjects as $val) {
            if ($val['id'] == $id) {
                $selectName[] = $val['name'];
                break;
            }
        }
    }

    return implode(', ', $selectName);
}

try {
    $pdo = create_pdo();

    $sql_select_users = 'SELECT * FROM ' . DB_TBL_USER;
    $users = pdo_select($pdo, $sql_select_users);

    $sql_select_subjects = 'SELECT * FROM ' . DB_MST_SUBJECT;
    $subjects = pdo_select($pdo, $sql_select_subjects);

    $pdo = null;

} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>PDO課題0</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
            table tr th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>○×塾　試験管理</h1>
        <ul>
            <li>・<a href="pdo-user.php" target="_self">受験者情報登録</a></li>
            <li>・<a href="pdo-subject.php" target="_self">試験科目登録</a></li>
            <li>・<a href="pdo_timetable.php" target="_self">時間割</a></li>
            <li>・<a href="insert_timetable.php" target="_self">タイムテーブル登録</a></li>
        </ul>
        <p>受験費用は、1科目につき\1,000です。</p>
        <hr>
        <?php if (!empty($users)) {?>
        <table border="1">
            <tr>
                <th width="100">名前</th>
                <th width="300">住所</th>
                <th width="300">科目</th>
                <th width="100">費用</th>
            </tr>
            <?php
                foreach($users as $user) {
            ?>
            <tr>
                <td><?=$user['name']?></td>
                <td><?=$user['address']?></td>
                <td>
                    <?php
                        echo get_select_subjects($user['subjects'], $subjects);
                    ?>
                </td>
                <td><?=$user['cost']?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php } else { ?>
        <p>現在登録されている受験者はいません。</p>
        <?php } ?>
    </body>
</html>
