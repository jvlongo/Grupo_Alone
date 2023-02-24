<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Sobre o Grupo Alone</h1>

	<?php
	include('db_connect.php');
	$sql = "SELECT * FROM bio";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<div class='bio'>";
			echo "<img src='uploads/" . $row['foto'] . "'>";
			echo "<h2>" . $row['nome'] . "</h2>";
			echo "<p>" . $row['idade'] . " anos</p>";
			echo "<p>" . $row['profissao'] . "</p>";
			echo "<p>" . $row['resumo'] . "</p>";
			echo "</div>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
	?>

	<button onclick="location.href='cadastro.php'">Incluir Novo</button>

</body>
</html>
