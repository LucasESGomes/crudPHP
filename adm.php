<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Painel de Administração</h1>

    <h2>Atualizar Cadastro</h2>
    <form method="POST">
        <label for="">Digite o ID</label>
        <input type="number" name="id" required>
        <label for="">Nome:</label>
        <input type="text" name="nome" required>
        <label for="">Sobrenome:</label>
        <input type="text" name="sobrenome" required>
        <label for="">Telefone:</label>
        <input type="text" name="telefone" required>
        <label for="">E-mail:</label>
        <input type="email" name="email" required>
        <label for="">Cidade:</label>
        <input type="text" name="cidade" required>
        <input type="submit" value="Atualizar">
    </form>

    <h2>Excluir Cadastro</h2>
    <form method="GET">
        <label for="">Digite o ID para excluir</label>
        <input type="number" name="id" required>
        <input type="submit" value="Excluir">
    </form>

    <div class="container">
        <?php
        // Definir a conexão com o banco de dados 
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $dbnome = "banco";

        // Cria a conexão com o banco de dados
        $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);

        //Definir a consulta SQL para selecionar os registros da tabela
        $comando_banco = "SELECT * FROM usuarios";

        //Executa a consulta SQL e amarmazena o resultado em uma váriavel
        $resultado_tabela = mysqli_query($conexao, $comando_banco);

        //Percorrer todos os registros retornando o valor do SQL e imprime na tela
        while($linha_registro = mysqli_fetch_assoc($resultado_tabela)) {

            //Imprime os usuários cadastrados no SQL
            echo "<div class='usuario'>id: " . $linha_registro['id'] . "</div>";
            echo "<div class='usuario'>Nome: " . $linha_registro['nome'] . "</div>";
            echo "<div class='usuario'>Sobrenome: " . $linha_registro['sobrenome'] . "</div>";
            echo "<div class='usuario'>telefone: " . $linha_registro['telefone'] . "</div>";
            echo "<div class='usuario'>E-mail: " . $linha_registro['email'] . "</div>";
            echo "<div class='usuario'>Cidade: " . $linha_registro['cidade'] . "</div>";
            echo "<hr>";
        }

        // Verificar se o formulário de atualização foi enviado pelo método POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $telefone = $_POST["telefone"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];

            // Definir a atualização SQL - PUT
            $comandoBanco = "UPDATE usuarios SET Nome = '$nome', Sobrenome = '$sobrenome', Telefone = '$telefone', email = '$email', Cidade = '$cidade' WHERE id = '$id'";

            // Verificar se foi atualizado com sucesso ou ocorreu erro
            if (mysqli_query($conexao, $comandoBanco)) {
                echo "Registro atualizado com sucesso";
            } else {
                echo "Erro ao atualizar o registro!";
            }
        }

        // Verifica se houve a exclusão e executa
        if (isset($_GET['id'])) {
            mysqli_query($conexao, "DELETE FROM usuarios WHERE id = {$_GET['id']}");
            echo "Registro excluído com sucesso.";
        }

        mysqli_close($conexao);
        ?>
    </div>
</body>
</html>