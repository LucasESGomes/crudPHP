<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Banco de Dados</title>
</head>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* 🎨 Cores principais */
:root {
    --primary-color: #6C63FF;
    --secondary-color: #F4F4FC;
    --text-color: #333;
    --white: #fff;
}

/* 🎯 Corpo da página */
body {
    background-color: var(--secondary-color);
    color: var(--text-color);
    text-align: center;
    padding-top: 80px; /* Ajuste por causa do header fixo */
}

/* 🎯 Header */
header {
    background-color: var(--primary-color);
    color: var(--white);
    padding: 20px;
    text-align: center;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* 🎯 Navegação */
nav {
    display: flex;
    justify-content: center;
    gap: 20px;
}

nav a {
    color: var(--white);
    text-decoration: none;
    font-weight: bold;
    padding: 10px 15px;
    transition: 0.3s;
}

nav a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

/* 🎯 Estilização do conteúdo */
h1 {
    font-size: 28px;
    margin-bottom: 20px;
    color: var(--primary-color);
}

/* 🎯 Formulário */
form {
    background-color: var(--white);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    margin: auto;
    text-align: left;
}

/* 🎯 Inputs do formulário */
form label {
    font-weight: 600;
    display: block;
    margin-top: 10px;
}

form input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* 🎯 Botão do formulário */
form input[type="submit"] {
    background-color: var(--primary-color);
    color: var(--white);
    font-weight: bold;
    border: none;
    padding: 10px;
    margin-top: 15px;
    cursor: pointer;
    transition: 0.3s;
}

form input[type="submit"]:hover {
    background-color: #5548e1;
}

/* 🎯 Mensagem de sucesso/erro */
.mensagem {
    margin-top: 20px;
    font-weight: bold;
}

/* 🎯 Footer */
footer {
    background-color: var(--primary-color);
    color: var(--white);
    padding: 15px;
    text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1);
}

/* 🌍 Responsividade */
@media (max-width: 768px) {
    form {
        width: 90%;
    }

    nav {
        flex-direction: column;
    }

    nav a {
        display: block;
        padding: 8px;
    }
}
</style>


<body>
    <!-- 🌟 Header com Navegação -->
    <header>
        <h2>CRUD - Banco de Dados</h2>
        <nav>
            <a href="index.php">Início</a>
            <a href="post.php">Novo usuário</a>
            <a href="form.php">Acessar ADM</a>
            <a href="delete.php">Deletar usuários</a>
            <a href="adm.php">Página de Administrador</a>
        </nav>
    </header>

    <h1>CRUD - POST</h1>

    <form method="post">
        <label>Nome</label>
        <input type="text" name="campo1" required>

        <label>Sobrenome</label>
        <input type="text" name="campo2" required>

        <label>Telefone</label>
        <input type="text" name="campo3" required>

        <label>E-mail</label>
        <input type="email" name="campo4" required>

        <label>Cidade</label>
        <input type="text" name="campo5" required>

        <input type="submit" value="Enviar">
    </form>

    <?php 
    // Definir as informações de conexão ao banco de dados
    $servidor = "localhost";
    $usuarios = "root";
    $senha = "";
    $dbnome = "banco";

    // Criar a conexão com banco de dados - função
    $conexao = mysqli_connect($servidor, $usuarios, $senha, $dbnome);

    // Verificar se o formulário foi enviado pelo método POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["campo1"];
        $sobrenome = $_POST["campo2"];
        $telefone = $_POST["campo3"];
        $email = $_POST["campo4"];
        $cidade = $_POST["campo5"];

        // Definir a consulta SQL para inserir os registros na tabela
        $comando_banco = "INSERT INTO usuarios (nome, sobrenome, telefone, email, cidade) VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$cidade')";

        // Verificação se foi enviado com sucesso ou erro
        if(mysqli_query($conexao, $comando_banco)) {
            echo "<p class='mensagem' style='color: green;'>Registro enviado com sucesso!</p>";
        } else {
            echo "<p class='mensagem' style='color: red;'>Erro ao enviar o formulário.</p>";
        }
    }

    mysqli_close($conexao);
    ?>

    <!-- 🌟 Footer -->
    <footer>
        <p>Desenvolvido por LucasGomes &copy; 2025</p>
    </footer>
</body>
</html>