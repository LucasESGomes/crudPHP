<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GET - PHP</title>
</head>
<body>
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
            //Imprime o valor nome
            echo "<div class='usuario'>Nome: " . $linha_registro['nome'] . "</div>";

            //Imprime o valor sobrenome
            echo "<div class='usuario'>Sobrenome: " . $linha_registro['sobrenome'] . "</div>";
            echo "<div class='usuario'>telefone: " . $linha_registro['telefone'] . "</div>";
            echo "<div class='usuario'>E-mail: " . $linha_registro['email'] . "</div>";
            echo "<div class='usuario'>Cidade: " . $linha_registro['cidade'] . "</div>";
            echo "<hr>";
        }

        

        mysqli_close($conexao);
    ?>
</body>
</html>