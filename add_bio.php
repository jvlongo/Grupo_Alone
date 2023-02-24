<?php
include('db_connect.php');

// Verifica se o formulário foi submetido
if (isset($_POST['nome'])) {

    // Define as variáveis ​​com base nos dados enviados pelo formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $profissao = $_POST['profissao'];
    $resumo = $_POST['resumo'];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (!empty($nome) && !empty($idade) && !empty($profissao) && !empty($resumo)) {

        // Verifica se a imagem foi enviada e move a imagem para a pasta "uploads"
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $newfilename = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $newfilename;

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

                // Insere os dados no banco de dados
                $sql = "INSERT INTO bio (nome, idade, profissao, resumo, foto) VALUES ('$nome', '$idade', '$profissao', '$resumo', '$newfilename')";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Os dados foram salvos com sucesso.</p>";
                    header('Location: index.php');
                } else {
                    echo "<p>Erro ao salvar os dados: " . mysqli_error($conn) . "</p>";
                }

            } else {
                echo "<p>Erro ao enviar a imagem.</p>";
            }

        } else {
            echo "<p>Por favor, escolha uma imagem.</p>";
        }

    } else {
        echo "<p>Todos os campos são obrigatórios.</p>";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);

}
?>
