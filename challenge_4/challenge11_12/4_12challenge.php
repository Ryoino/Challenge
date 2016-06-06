<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>demo4-demo</title>
</head>
<body>
    <?php
    $waganeko_texts = array();
    $read_line = 12;
    $count = 0;
    $figure = '。';
    $exchange_figure = '。'.'<br>';
    $changed_text = array();

    $botyan_fp  = file_get_contents('4_12_bocchan.txt','r');
    $waganeko_fp = fopen('4_12_bocchan.txt','r');


    for($i=0;$i<$read_line;++$i){
        $waganeko_texts[$i]=fgets($waganeko_fp);
        $count += mb_strlen($waganeko_texts[$i]);
    }
    echo '<h2>元の文章</h2>';
    echo $botyan_fp;

    echo '<h2>変更後の文章</h2>';
    echo $read_line.'行目までの文字数は'.$count.'です<br>';
    echo 'そのうち、「'.$figure.'」という文字は'.figure_count($waganeko_texts).'個含まれています<br>';
    echo '<br>これを「'.$exchange_figure.'」という文字に置き換えると...<br>';

    $changed_text = waganeko_exchange($waganeko_texts,$exchange_figure);

    foreach ($changed_text as $key => $changed_line){
        echo ($key+1).'行目:';
        echo $changed_line.'<br>';
    }

    echo '<br>という表現になります<br>';


    function figure_count($texts){
        global $figure;
        $figcnt = 0;

        foreach ($texts as $text_line){
            $figcnt += mb_substr_count($text_line, $figure);
        }

        return $figcnt;
    }

    function waganeko_exchange($texts,$exfig){
        global $figure;
        $ex_texts = array();

        foreach ($texts as $line_num => $text_line){
            $ex_texts[$line_num] = str_replace($figure, $exfig, $text_line);
        }

        return $ex_texts;
    }

  ?>
</body>
</html>
