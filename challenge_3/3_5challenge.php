<?php
 function my_profile(){
   $id    = 'ID:0910<br>';
   $name  = '名前:井上良太<br>';
   $birthdate = '生年月日:1990年9月12日<br>';
   $address  = '住所:宮城県栗原市<br>';
   return array($id,$name,$birthdate,$address);
 }

$profile = my_profile();
 foreach ($profile as $value) {
         echo $value;
}
?>
