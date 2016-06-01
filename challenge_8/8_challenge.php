<?php
//課題8_3
class human {
  public $name;
  public $age;

  public function run(){
  }
  public function birth($n,$a){
          $this -> name = $n;
          $this -> age = $a;
  }
  public function name(){
      return $this->name;
  }
}

$inoue = new human();
$inoue->birth('井上',25);

?>

<?php
//課題8_4
class teacher extends human{
  public function birth(){
        $this -> name = null;
        $this -> age =null;
  }
}
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課題8</title>
</head>

<body>

<h1>課題8_3</h1>
<p><?php echo $inoue->name(); ?></p>

</body>

</html>
