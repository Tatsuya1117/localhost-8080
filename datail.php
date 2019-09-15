<?php
$user = "tatsuya";
$pass = "tatsuya0312";
try {
	if(empty($_GET['id'])) throw new Exception('ID不正');
	id = (int) $_GET['id'];
	$dbh = new PDO('mysql:host=localhost;dbname=db1;charset=utf8',$user, $pass);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM recipes WHERE id = ?";
	$stmt = $dbh->prepare($sql);
	//続きはページ188から
	//困ったことにブラウザでdatail.phpが表示されないから心配。。。
	$dbh = null;
} catch (Exception $e) {
	echo "エラーが発生しました: " . htmlspecialchars($e->getMessage(),ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}