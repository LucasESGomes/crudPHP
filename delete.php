<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Banco de Dados</title>
</head>
<body>
    <h1>CRUD - DELETE</h1>

    <form method="">
        <label for="">Digite o ID para excluir</label>
        <input type="number" name="id">
        <input type="submit" value="Excluir">
    </form>

    <?php 
    //Definir as informações de conexão ao banco de dados
    $servidor = "localhost";
    $usuarios = "root";
    $senha = "";
    $dbnome = "banco";

    //Criar a conexão com banco de dados - função
    $conexao = mysqli_connect($servidor, $usuarios, $senha, $dbnome);
    
    //Verifica se houve a exclusão e executa o comando
    if(isset($_GET['id'])) mysqli_query($conexao,
    //Puxa o id digite no input para excluir
     "DELETE FROM usuarios WHERE ID = {$_GET['id']}");
    ?>

</body>
</html>