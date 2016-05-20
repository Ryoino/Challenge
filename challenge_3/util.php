<?php
function my_profile(){
  for ($i=0; $i < 10 ; $i++) {
    echo "氏名　　：井上良太<br>";
    echo "生年月日：1990年9月12日<br>";
    echo "趣味　　：フットサル、読書、映画、料理<br>
  　宜しくお願い致します。<br>";
    echo "<p></p>";
  }
}

function view_profile($num){
 if ($num % 2 == 1) {
   echo $num."は奇数です";
 }
 else {
   echo $num."は偶数です";
 }
}
?>
