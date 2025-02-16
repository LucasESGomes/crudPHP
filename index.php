<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GET - PHP</title>
</head>


<style>
    /* Importando uma fonte moderna */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* 🎨 Definição das cores principais */
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

.usuario {
    background-color: var(--white);
    padding: 15px;
    margin: 10px auto;
    width: 60%;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    text-align: left;
}

.usuario:nth-child(even) {
    background-color: #EDEAFF;
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
    .usuario {
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
        <h2>Banco de Dados - PHP</h2>
        <nav>
            <a href="index.php">Início</a>
            <a href="post.php">Novo usuário</a>
            <a href="form.php">Acessar ADM</a>
            <a href="delete.php">Deletar usuários</a>
            <a href="adm.php">Página de Administrador</a>
        </nav>
    </header>

    <h1>GET - Banco de Dados - PHP</h1>

    <?php
        echo "Banco de Dados";

        //Definir as informações de conexão ao banco de dados
        $servidor = "localhost";
        $usuarios = "root";
        $senha = "";
        $dbnome = "banco";

        //Criar a conexão com banco de dados - função
        $conexao = mysqli_connect($servidor, $usuarios, $senha, $dbnome);
        
        //Definir a consulta SQL para selecionar os registros da tabela
        $comando_banco = "SELECT * FROM usuarios";

        //Executa a consulta SQL e amarmazena o resultado em uma váriavel
        $resultado_tabela = mysqli_query($conexao, $comando_banco);

        //Percorrer todos os registros retornando o valor do SQL e imprime na tela
        while($linha_registro = mysqli_fetch_assoc($resultado_tabela)) {
            //Imprime os valores do banco
            echo "<div class='usuario'>Nome: " . $linha_registro['nome'] . "</div>";
            echo "<div class='usuario'>Sobrenome: " . $linha_registro['sobrenome'] . "</div>";
            echo "<div class='usuario'>Telefone: " . $linha_registro['telefone'] . "</div>";
            echo "<div class='usuario'>E-mail: " . $linha_registro['email'] . "</div>";
            echo "<div class='usuario'>Cidade: " . $linha_registro['cidade'] . "</div>";
            echo "<hr>";
        }

        mysqli_close($conexao);
    ?>

    <!-- 🌟 Footer -->
    <footer>
        <p>Desenvolvido por LucasGomes &copy; 2025</p>
    </footer>
</body>
</html>