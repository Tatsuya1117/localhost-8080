<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>レシピ一覧</title>
</head>
<body>
	<h1>レシピ一覧</h1>
	<a href="form.html">レシピの新規登録</a>
<?php
require_once '/Applications/MAMP/htdocs/db_config.php';
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
		echo "<td>\n";
		echo "<a href=detail.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">詳細</a>\n";
		echo "|<a href=edit.php?id=" .htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') .">変更</a>\n";
		echo "|<a href=delete.php?id=" .htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . ">削除</a>\n";
		echo "</td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
	$dbh = null;
} catch (Exception $e) {
	echo "エラーが発生しました: " . htmlspecialchars($e->getMessage(),
ENT_QUOTES, 'UTF-8') . "<br>";
	die();
}
?>
</body>
</html>