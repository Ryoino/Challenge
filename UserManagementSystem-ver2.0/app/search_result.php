<?php
require_once '../common/dbaccesUtil.php';
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>

<?php //ゲットの存在チェックとセッションに値を格納しつつ、連想配列にゲットされた値を格納
$search_values = array(
                        'name' => storing_value('name'),
                        'year' => storing_value('year'),
                        'type' => storing_value('type'));
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $result = null;
        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            $result = search_all_profiles();//seatch -> serach スペルミス修正
        }else{
            $result = search_profiles($search_values['name'],$search_values['year'],$search_values['type']);//seatch -> serach スペルミス修正
        }
        foreach($result as $value){
        ?>
            <tr>
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday'];?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>
        <?php
        }
        ?>
        </table>

        <br><br>
        <?php echo return_top();//トップページに戻る?>
</body>
</html>
