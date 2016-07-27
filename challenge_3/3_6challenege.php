<?php

function my_profile($research){
  $id = 'id:0912<br>';
  $name = '名前:井上良太<br>';
  $birthdate = '生年月日:1990年09月12日<br>';
  $address = '住所:宮城県栗原市若柳<br>';
  $ino = array($id,$name,$birthdate,$address);
  $id1  = 'id:0731<br>';
  $name1 = '名前:松田大地<br>';
  $birthdate1 = '生年月日:1990年7月31日<br>';
  $address1 = '住所:宮城県栗原市築館<br>';
  $matu = array($id1,$name1,$birthdate1,$address1);
  $id2 = 'id:0917<br>';
  $name2 = '名前:小野勇一<br>';
  $birthdate2 = '生年月日:1990月9月17日<br>';
  $address2 = '住所:東京都町田市鶴間<br>';
  $ono = array($id2,$name2,$birthdate2,$address2);

  if(strstr($name,$research)){
    return $ino;
  }
  elseif(strstr($name1,$research)){
    return $matu;
  }

  elseif(strstr($name2,$research)) {
   return $ono;
}
  else {
   return null;
}
  }

$profile = my_profile('k');
if ($profile == null) {
echo '該当なし';
}
else {
  foreach ($profile as $result){
    echo $result;
 }
}
?>
