<?php
function cookie_reset(){
for ($i=0; $i<$_COOKIE['access_count']; $i++){
	setcookie("code[$i]", '', time() - 1800);
	setcookie("name[$i]",'', time() - 1800);
	setcookie("price[$i]",'', time() - 1800);
	setcookie("image[$i]",'', time() - 1800);
 }
}
//ログイン
function login_check($key){
	if(isset($_SESSION['userstate']) && $_SESSION['userstate']=='login'){
		return 'ようこそ<a href='.MY_DATA.'>'.$_SESSION['username'].'</a>さん!'.'<br>'.'<a href='.LOGIN.'>ログアウト</a>画面へ進む';
	}else{
		$_SESSION['place']= $key;
		return '<a href='.LOGIN.'>ログイン</a>画面へ進む';
	}
}
//ログアウト
function logout(){
	session_unset();
	if (isset($_COOKIE['PHPSESSID'])){
		setcookie('PHPSESSID',"", time() - 1800, '/');
	}
	session_destroy();
 }
//トップページに戻る
function return_top(){
	return "<a href='".ROOT_URL."'>トップへ戻る</a>";
}
//全ページ共通ヘッダー
function header_top(){?>
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
		<div class="container topnav">
				<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
						<h1 id=main_logo ><a href="<?php echo TOP ?>"class="hvr-wobble-top">KAGOYUME</a></h1>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
								<li>
										<div align="right" class="login"><?php echo login_check(TOP);?></div>
								</li>
						</ul>
				</div>
				<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
</nav>
<!-- Header -->
<?php }?>

<?php
function log_write(){
    $time = date('Y/m/d H:i:s');//アクセス日時の取得
    $request_url = $_SERVER['REQUEST_URI'];//URLを取得
    $http_referer = $_SERVER['HTTP_REFERER'];//遷移元のURLを取得
    $log = 'アクセス日時:'.$time.'/URL:'.$request_url.'/遷移元URL:'.$http_referer;

    $fp = fopen('../logs/log.txt','a');
    fwrite($fp,$log."\n");
    fclose($fp);
}

//cookieの値チェックをして返す関数
function cookie_check($key){
	if(!empty($_COOKIE["$key"])){ return $_COOKIE["$key"];}
}
//既にセッションの値チェックが行われているかどうかに問わず上書きの処理を行う
function overwrite($key,$var){
	if(empty($_SESSION[$key])){
		$_SESSION[$key] = $var;
	}else{
		$_SESSION[$key] = $var;
	}
}
//フォームに値が入力されていればセッションから同じ値を返す関数
function form_value($name){
	if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
	}
}
// ポストの値チェックをしてからセッションに格納する
//二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
function bind_p2s($name){
	if(!empty($_POST[$name])){
		$_SESSION[$name] = $_POST[$name];
		return $_POST[$name];
	}else{
		$_SESSION[$name] = null;
		return null;
	}
}
?>
