<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>


<style>
 /* 🌟 Resetando alguns estilos padrões */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* 🌟 Corpo e fundo */
body {
    background-color: #f5f5f5;
    color: #333;
    font-size: 16px;
    line-height: 1.5;
    padding: 0 20px;
}

/* 🌟 Header */
header {
    background-color:#6C63FF;
    color: white;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 20px;
}

header h2 {
    font-size: 28px;
}

header nav a {
    color: white;
    margin: 0 15px;
    text-decoration: none;
    font-size: 18px;
}

header nav a:hover {
    text-decoration: underline;
}

/* 🌟 Títulos */
h1, h2 {
    color:#6C63FF;
    margin-bottom: 10px;
}

/* 🌟 Formulário */
form {
    background-color: white;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form input[type="number"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 20px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

form input[type="submit"] {
    background-color:#6C63FF;
    color: white;
    border: none;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color:#6C63FF;
}

/* 🌟 Mensagens */
.mensagem {
    font-size: 18px;
    margin-top: 20px;
}

.mensagem.sucesso {
    color: green;
}

.mensagem.erro {
    color: red;
}

/* 🌟 Tabela de Usuários */
.container {
    margin-top: 20px;
}

.usuario {
    background-color: white;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.usuario p {
    font-size: 16px;
}

.usuario strong {
    color #6C63FF;
}

hr {
    border: 0;
    border-top: 1px solid #ddd;
    margin-top: 20px;
}

/* 🌟 Footer */
footer {
    text-align: center;
    padding: 10px;
    background-color: #6C63FF;
    color: white;
    margin-top: 20px;
    border-radius: 5px;
}
</style>


<body>
     <!-- 🌟 Header com Navegação -->
    <header>
        <h2>Painel de Administração</h2>
        <nav>
            <a href="index.php">Início</a>
            <a href="post.php">Novo usuário</a>
            <a href="form.php">Acessar ADM</a>
            <a href="delete.php">Deletar usuários</a>
            <a href="adm.php">Página de Administrador</a>
        </nav>
    </header>

    <main>
        <h1>Administração de Usuários</h1>

        <!-- 🌟 Formulário de Atualização -->
        <h2>Atualizar Cadastro</h2>
        <form method="POST">
            <label>Digite o ID:</label>
            <input type="number" name="id" required>
            
            <label>Nome:</label>
            <input type="text" name="nome" required>
            
            <label>Sobrenome:</label>
            <input type="text" name="sobrenome" required>
            
            <label>Telefone:</label>
            <input type="text" name="telefone" required>
            
            <label>E-mail:</label>
            <input type="email" name="email" required>
            
            <label>Cidade:</label>
            <input type="text" name="cidade" required>
            
            <input type="submit" value="Atualizar">
        </form>

        <!-- 🌟 Formulário de Exclusão -->
        <h2>Excluir Cadastro</h2>
        <form method="GET">
            <label>Digite o ID para excluir:</label>
            <input type="number" name="id" required>
            <input type="submit" value="Excluir">
        </form>

        <!-- 🌟 Lista de Usuários -->
        <div class="container">
            <?php
            // Conexão com o banco de dados
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $dbnome = "banco";

            $conexao = mysqli_connect($servidor, $usuario, $senha, $dbnome);

            // Seleciona os usuários do banco
            $comando_banco = "SELECT * FROM usuarios";
            $resultado_tabela = mysqli_query($conexao, $comando_banco);

            while ($linha_registro = mysqli_fetch_assoc($resultado_tabela)) {
                echo "<div class='usuario'>";
                echo "<p><strong>ID:</strong> " . $linha_registro['id'] . "</p>";
                echo "<p><strong>Nome:</strong> " . $linha_registro['nome'] . "</p>";
                echo "<p><strong>Sobrenome:</strong> " . $linha_registro['sobrenome'] . "</p>";
                echo "<p><strong>Telefone:</strong> " . $linha_registro['telefone'] . "</p>";
                echo "<p><strong>Email:</strong> " . $linha_registro['email'] . "</p>";
                echo "<p><strong>Cidade:</strong> " . $linha_registro['cidade'] . "</p>";
                echo "</div><hr>";
            }

            // Atualização de Cadastro
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"];
                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $telefone = $_POST["telefone"];
                $email = $_POST["email"];
                $cidade = $_POST["cidade"];

                $comandoBanco = "UPDATE usuarios SET Nome = '$nome', Sobrenome = '$sobrenome', Telefone = '$telefone', Email = '$email', Cidade = '$cidade' WHERE id = '$id'";

                if (mysqli_query($conexao, $comandoBanco)) {
                    echo "<p class='mensagem sucesso'>Registro atualizado com sucesso!</p>";
                } else {
                    echo "<p class='mensagem erro'>Erro ao atualizar o registro.</p>";
                }
            }

            // Exclusão de Cadastro
            if (isset($_GET['id'])) {
                $idExcluir = intval($_GET['id']); // Segurança contra SQL Injection
                mysqli_query($conexao, "DELETE FROM usuarios WHERE id = $idExcluir");
                echo "<p class='mensagem sucesso'>Registro excluído com sucesso!</p>";
            }

            mysqli_close($conexao);
            ?>
        </div>
    </main>

    <!-- 🌟 Footer -->
    <footer>
        <p>Desenvolvido por LucasGomes &copy; 2025</p>
    </footer>
</body>
</html>