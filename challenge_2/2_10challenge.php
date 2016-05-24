
<?php

$int = $_GET['count'];
 echo '元の値：'.$int.'<br>';

 if($int <= 0 || is_float($int)){
   echo '正の数ではない';
 }
  //因数分解の処理スタート！
 else {
        for($i = 2; true;){
        if(($int % $i) === 0){
            echo $i;
            $int = $int / $i;
        }
     else {
      ++$i;
      }

    if($int <= $i){
    if($int === 1){echo '1';}
    elseif($int == $i){ echo $i;}
    break;
  }
 }
}
?>
