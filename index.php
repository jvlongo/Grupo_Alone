<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Sobre o Grupo Alone</h1>

	<?php
	// Inclui o arquivo de conexão com o banco de dados
	include('db_connect.php');
	// Define a consulta SQL para buscar todas as bios
	$sql = "SELECT * FROM bio";
	// Executa a consulta e armazena o resultado em uma variável
	$result = $conn->query($sql);

	// Se houver resultados, exibe cada bio em um bloco separado
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
		echo "Nenhum integrante encontrado.";
	}
	// Fecha a conexão com o banco de dados
	$conn->close();
	?>
	<!-- Botão para adicionar uma nova bio -->
	<button onclick="location.href='cadastro.php'">Incluir Novo</button>

</body>
</html>
