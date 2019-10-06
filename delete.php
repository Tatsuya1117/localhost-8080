<?php
$user = "tatsuya";
$pass = "tatsuya0312";
try {
	if (empty($_GET['id'])) throw new Exception('IDが間違っています。');
	$id = (int) $_GET['id'];
	$dbh = new PDO('mysql:host=localhost;dbname=db8080;charset=utf8',$user, $pass);
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM recipes WHERE id = ?";
	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(1, $id, PDO::PARAM_INT);
	$stmt->execute();
	$dbh = null;
	echo "ID: " . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ."の消去が完了しました。";
} catch (Exception $e) {
	echo "エラーが発生しました。:" . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') ."<br>";
	die();
}