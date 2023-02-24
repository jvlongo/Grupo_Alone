<!DOCTYPE html>
<html>
<head>
    <title>Inclusão de Novos Integrantes</title>
    <!--Código CCS + Definir o estilo dos elementos HTML nesta página.-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Acrescentar funcionalidade adicional para a página. -->
    <script type="text/javascript">
         //A Função é acionada quando o usuário seleciona uma imagem para upload.
        function previewImage() {
            var preview = document.querySelector('#foto-wrapper img');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();
            var label = document.querySelector('#foto-label');

            // Quando o arquivo é carregado, a pré-visualização da imagem é exibida e o texto "Incluir foto" é removido.
            reader.onloadend = function () {
                preview.src = reader.result;
                preview.style.display = "block";
                label.style.display = "none";
            }
            // Se um arquivo for selecionado, ele é lido e carregado para exibição.
            if (file) {
                reader.readAsDataURL(file);
            } else {
            // Caso contrário, a pré-visualização da imagem é removida e o texto "Incluir foto" é exibido novamente.
                preview.src = "";
                preview.style.display = "none";
                label.style.display = "block";
            }
        }

        //validar se todos os campos do formulário foram preenchidos.
        function validateForm() {
            var nome = document.forms["myForm"]["nome"].value;
            var idade = document.forms["myForm"]["idade"].value;
            var profissao = document.forms["myForm"]["profissao"].value;
            var resumo = document.forms["myForm"]["resumo"].value;
            var foto = document.forms["myForm"]["foto"].value;

            // Se algum campo estiver vazio, uma mensagem de alerta é exibida e o formulário não é enviado.
            if (nome == "" || idade == "" || profissao == "" || resumo == "" || foto == "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }
        }
    </script>
</head>
<body>

<h1>Inclusão de Novos Integrantes</h1>
<!-- Exibir um formulário para que o usuário possa inserir informações sobre um novo integrante. -->
<form name="myForm" action="add_bio.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div id="foto-wrapper">
        <label id="foto-label" for="foto">Incluir foto</label>
        <input type="file" name="foto" id="foto" accept="image/*" onchange="previewImage()" required>
        <img src="" alt="Pré-visualização da imagem selecionada" style="display:none">
    </div>

    <input type="text" name="nome" id="nome" placeholder="Digite o nome...">

    <input type="number" name="idade" id="idade" placeholder="Qual idade?">

    <input type="text" name="profissao" id="profissao" placeholder="Qual ocupação?">

    <textarea name="resumo" id="resumo" placeholder="Escreva a bio aqui..."></textarea>

    <button type="submit">Salvar</button>

</form>

<button class="btn-voltar" onclick="location.href='index.php'">Voltar</button>

</body>
</html>
