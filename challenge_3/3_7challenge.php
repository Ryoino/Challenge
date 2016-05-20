<?php
function check_scope(){
static $num = 3;
$num *= 2;
echo $num.'<br>';
}
echo '<br>';
for ($i=0; $i < 10 ; $i++) {
check_scope();
}
?>
