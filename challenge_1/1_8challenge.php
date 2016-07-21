<?php
//フォームから値を受け取って、未入力チェックを行ってから計算用の変数に代入
$pushed   = isset($_POST['pushed']) ? $_POST['pushed'] : ""; 	//押されたボタンの値がそのまま入る
$operator = isset($_POST['operator']) ? $_POST['operator'] : "";//計算記号が保持される
$num      = isset($_POST['num']) ? $_POST['num'] : "";		//入力された数値が保持される
$answer   = isset($_POST['answer']) ? $_POST['answer'] : "";  	//計算結果の値が保持される
$log      = isset($_POST['log']) ? $_POST['log'] : "";		//計算ログが保持される
$output   = 0;//画面の入力フォームに表示するため変数

//数字か文字かで判別。is_numericは対象の変数の中身が数値かを判別する。
if(is_numeric($pushed)){

    //もし数字が続けて押されたら、その数字を次の桁にする
    $num .= $pushed;

    //計算記号が入力済みでないならば、$numに格納された数字をそのまま表示。そうでないなら計算記号とくっつけて表示
    if(empty($operator)){
        $output = $num;
    }else{
        $output = $answer.$operator.$num;
    }

}else{
    if($pushed == "C"){
        $operator = null;
        $num = null;
        $answer = null;
        $log.="クリア<br>";
        $output = 0;




    }else if(is_numeric($num)){//数字が入力済みの時のみ実行

	//次の条件分岐で$answerが上書きされてしまうのでその前にログに保存
        if($pushed == "＝"){
          $log .=  $answer;
        }

        //最初に計算記号が出現した『後』、何かしらの文字(=や×、税込みなど)が出現した瞬間に計算を実行。
        //「1+2-」や「1+2=」となった時点で「3-」や「3」といった結果にする。または「1+2税込み」でも3*1.08が実行される
        if($operator == "＋") {
            $answer = $answer + (int)$num;
        } elseif($operator == "－") {
            $answer = $answer - (int)$num;
        } elseif($operator == "×") {
            $answer = $answer * (int)$num;
        } elseif($operator == "÷") {
            //0で割ることのないように判別
            if($num != 0) {
                $answer = $answer / (int)$num;
            } else {
                $answer = "error";
            }
          }elseif($operator == ".") {
              $answer = $answer.$operator.$num;
        }else {
            //計算記号の事前入力なしに「=」や「税込み」などが押された際はここ
            $answer = (int)$num;
        }

        //記号計算の結果、もしくは素のままの数字に対し最終的なボタン処理を実行
        if($pushed == "＝"){
            $log .=  $operator . $num . "＝" . $answer . "<br>";
        }
        if($pushed == "税込み"){
          $answer = $answer * 1.08;
          $log .=  "税込み" . $answer . "<br>";
        }
        if($pushed == "税抜き"){
            $answer = $answer / 1.08;
            $log .=  "税抜き" . $answer . "<br>";
        }
        if ($pushed == "%"){
          $answer = $answer * 0.01;
          $log .= $answer."<br>";
        }


        //数字ボタン入力の後にこれらの文字ボタンが押されたなら、
        if($pushed == "＋" || $pushed == "－" || $pushed == "×" || $pushed == "÷" || $pushed == "."){
            $operator 	=   $pushed;//押されたボタンの記号を保持。これによりもう一度計算記号が出現したときに計算が実行できる
            $output 	=   $answer.$pushed;
            $num 	=   null;
        }else{
            $operator   =   null;
            $output     =   $answer;
            $num        =   $answer;
        }

      }else {
        $output = $answer.$operator;
        $log .= "数値を入力してください<br>";
    }
}

?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="style.css" media="all">-->
    <style type="text/css"><!-- button{width:50px;} --></style>
    <title>WEB電卓</title>
  </head>
  <body>
    <h3>電卓</h3>
    <form action="" method="post" id="calc">
        <input class="outform" type="text" name="output" value="<?php echo $output; ?>">
      <table>
        <tr class="row">
          <td><button type="submit" name="pushed" value="税込み" form="calc">税込</button></td>
          <td><button type="submit" name="pushed" value="税抜き" form="calc">税抜</button></td>
          <td><button type="submit" name="pushed" value="％" form="calc">％</button></td>
          <td><button type="submit" name="pushed" value="C" form="calc">C</button></td>
          <td><button type="submit" name="pushed" value="." form="calc">.</button></td>
        </tr>
        <tr class="row">
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="1" form="calc">1</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="2" form="calc">2</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="3" form="calc">3</button></td>
          <td class="btops"><button class="command-bt" type="submit" name="pushed" value="＋" form="calc">＋</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="4" form="calc">4</button></td>
          <td><button type="submit" name="pushed" value="5" form="calc">5</button></td>
          <td><button type="submit" name="pushed" value="6" form="calc">6</button></td>
          <td><button type="submit" name="pushed" value="－" form="calc">－</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="7" form="calc">7</button></td>
          <td><button type="submit" name="pushed" value="8" form="calc">8</button></td>
          <td><button type="submit" name="pushed" value="9" form="calc">9</button></td>
          <td><button type="submit" name="pushed" value="×" form="calc">×</button></td>
        </tr>
        <tr class="row">
          <td><button type="submit" name="pushed" value="0" form="calc">0</button></td>
          <td><button type="submit" name="pushed" value="00" form="calc">00</button></td>
          <td><button type="submit" name="pushed" value="＝" form="calc">＝</button></td>
          <td><button type="submit" name="pushed" value="÷" form="calc">÷</button></td>
        </tr>
      </table>
      <input type="hidden" name="num" value="<?php echo $num; ?>">
      <input  type="hidden" name="operator" value="<?php echo $operator; ?>">
      <input  type="hidden" name="answer" value="<?php echo $answer; ?>">
      <input  type="hidden" name="log" value="<?php echo $log; ?>">
    </form>
    <p>計算ログ:</p><br>
    <p><?php echo $log; ?></p>
  </body>
</html>
