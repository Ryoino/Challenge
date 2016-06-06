<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>demo4-0-1</title>
</head>
<body>
    <?php

    $hour=0;    
    $min=0;  
    $sec=0;    
    $month=1;
    $day=1; 
    $year=2015;
    
    $befor_month=$month;
    while($day<=365){
        
        $timestamp = mktime($hour, $min, $sec, $month, $day, $year);
        
        $now_month=date('m', $timestamp);
        if($befor_month!=$now_month){  
            $befor_month=$now_month;
            echo '<br>'.$now_month.'月<br>';
        }
        
        echo date('Y年m月d日', $timestamp).'タイムスタンプ:'.$timestamp.'<br>';
        $day++;
    }   
    ?>
</body>
</html>

