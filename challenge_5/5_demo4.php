<?php
function session_chk(){
    session_start();
    $period_time = 60;
    if(!empty($_SESSION['last_access'])){
        if((time() - $_SESSION['last_access']) > $period_time){
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            logout_s();
            exit;
        }else{
            $_SESSION['last_access']=time();
        }
    }else{
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}
/**
 * セッション情報を破棄するための関数
 */
function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}

function get_eto($year){
    switch ($year%12){
        case 1:
            return '酉';
        case 2:
            return '戌';
        case 3:
            return '亥';
        case 4:
            return '子';
        case 5:
            return '丑';
        case 6:
            return '寅';
        case 7:
            return '卯';
        case 8:
            return '辰';
        case 9:
            return '巳';
        case 10:
            return '午';
        case 11:
            return '未';
        case 0:
            return '申';
        default :
            return '該当する干支はありません';
    }
}

function get_seiza($month,$date){

    $seizas = array(
        // '名前', 月, 日　～　月, 日で格納
        array('牡羊座',  3, 21,  4, 19),
        array('牡牛座',  4, 20,  5, 20),
        array('双子座',  5, 21,  6, 21),
        array('かに座',  6, 22,  7, 22),
        array('獅子座',  7, 23,  8, 22),
        array('乙女座',  8, 23,  9, 22),
        array('天秤座',  9, 23, 10, 23),
        array('蠍座',   10, 24, 11, 22),
        array('射手座', 11, 23, 12, 21),
        array('山羊座', 12, 22,  1, 19),
        array('水瓶座',  1, 20,  2, 18),
        array('魚座',    2, 19,  3, 20)
    );

    foreach($seizas as $seiza){

        $name       = $seiza[0];
        $start_month= $seiza[1];
        $start_date = $seiza[2];
        $end_month  = $seiza[3];
        $end_date   = $seiza[4];

        if(($month == $start_month && $date >= $start_date)
                || ($month == $end_month && $date <= $end_date)){
            return $name;
        }
    }
    return false;
}
