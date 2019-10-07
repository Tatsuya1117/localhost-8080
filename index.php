<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>レシピの一覧</title>
</head>
<body>
	<h1>レシピの一覧</h1>
	<a href="form.html">レシピの新規登録</a>
<?php
$user = "tatsuya";
$pass = "tatsuya0312";
try {
	$dbh = new PDO ('mysql:host=localhost;dbname=db8080;charset=utf8', $user, $pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM recipes";
	$stmt = $dbh->query($sql);
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo "<table>\n";
	echo "<tr>\n";
	echo "<th>料理名</th><th>予算</th><th>難易度</th>\n";
	echo "</tr>\n";
	foreach ($result as $row) {
		// print_r($row);
	echo "<tr>\n";
		echo "<td>" .htmlspecialchars($row['recipe_name'],ENT_QUOTES,'UTF-8'). "</td>\n";
		echo "<td>" .htmlspecialchars($row['budget'],ENT_QUOTES,'UTF-8'). "</td>\n";
		echo "<td>" .htmlspecialchars($row['difficulty'],ENT_QUOTES,'UTF-8'). "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
	$dbh = null;
} catch (Exception $e) {
	echo "エラーが発生しました: " . htmlspecialchars($e->getMessage(),
ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}