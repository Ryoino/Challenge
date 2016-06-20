<?php
session_start();
require_once("../common/common.php");
require_once("../util/defineUtil.php");
require_once("../util/scriptUtil.php");
require_once("../util/dbaccessUtil.php");

log_write();
?>
<!doctype html>
<html>
  <head>
      <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>トップページ</title>
      <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
      <link href="../css/animation/animation.css" rel="stylesheet">
      <link href="../css/style/style.css" rel="stylesheet">
      <link href="../css/style/bootstrap.min.css" rel="stylesheet">
      <link href="../css/style/landing-page.css" rel="stylesheet">

  <?php header_top();//全ページ共通ヘッダー?>

    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>KAGOYUME</h1>
                        <hr class="intro-divider">
                        <form action="<?php echo SEARCH ?>" class="Search" method="GET">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                              表示順序：
                              <select class="search" name="sort">
                              <?php foreach ($sortOrder as $key => $value) { ?>
                              <option value="<?php echo h($key); ?>" ><?php echo h($value);?></option>
                              <?php } ?>
                              </select>
                            </li>
                            <li>
                              キーワード検索：
                              <select class="search" name="category_id">
                              <?php foreach ($categories as $id => $name) { ?>
                              <option value="<?php echo h($id); ?>" ><?php echo h($name);?></option>
                              <?php } ?>
                              </select>
                            </li>
                            <li>
                              <input class="search" type="text" name="query" />
                              <input id="button" type="submit" value="Yahooショッピングで検索"/>
                            </li>
                        </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
