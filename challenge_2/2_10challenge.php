<?php
$int = $_GET['count'];
 echo '元の値：'.$int.'<br>';

 if($int <= 0 || is_float($int)){
   echo '正の数ではない';
 }

echo '<p>1ケタの素因数</p>';
$a = 2;
 while ($a < 10) {
   if ($int >= $a) {
     while(($int % $a) == 0){
          $int /= $a;
          echo $a.'<br>';
}
     $a += 1;
   }
 }
echo '<p>その他</p>';
 while ($int >= $a) {

 while(($int % $a) == 0){
      $int /= $a;
      echo $a.'<br>';
    }
    $a++;
  }
?>
