<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Banco de Dados</title>
</head>
<body>
    <center>
    <h1>CRUD - POST</h1>
    
    <form method="post">
        <label for="">Nome</label>
        <input type="text" name="campo1">

        <label for="">Sobrenome</label>
        <input type="text" name="campo2">

        <label for="">telefone</label>
        <input type="text" name="campo3">

        <label for="">E-mail</label>
        <input type="email" name="campo4">

        <label for="">Cidade</label>
        <input type="text" name="campo5">

        <input type="submit" value="Enviar">
    </form>
    </center>

    <?php 
    //Definir as informações de conexão ao banco de dados
    $servidor = "localhost";
    $usuarios = "root";
    $senha = "";
    $dbnome = "banco";

    //Criar a conexão com banco de dados - função
    $conexao = mysqli_connect($servidor, $usuarios, $senha, $dbnome);

    //Verificar se o formulario foi enviado pelo metooo POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["campo1"];
        $sobrenome = $_POST["campo2"];
        $telefone = $_POST["campo3"];
        $email = $_POST["campo4"];
        $cidade = $_POST["campo5"];

        //Definir a consulta SQL para selecionar os registros da tabela
        $comando_banco = "INSERT INTO usuarios (nome, sobrenome, telefone, email, cidade) VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$cidade')";

        //Verificação se foi enviado com sucesso ou erro
        if(mysqli_query($conexao, $comando_banco)) {
            echo "Registro enviado com sucesso";
        } else{
            echo "Erro ao enviar o formulário";
        }
    }
    ?>
</body>
</html>