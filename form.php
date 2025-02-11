<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fomulário - PHP</title>
</head>
<body>
    <h1>Formulário de Admin</h1>

    //Formulário para acesso da página de ADM
    <form action="#" method="POST">
        <label>E-mail:</label>
        <input type="email" name="email">
        <br><br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <input type="submit">
    </form>

    <?php 
    echo "Banco de Dados";

    //Definir as informações de conexão ao banco de dados
    $servidor = "localhost";
    $usuarios = "root";
    $senha = "";
    $dbnome = "banco";

    //Criar a conexão com banco de dados - função
    $conexao = mysqli_connect($servidor, $usuarios, $senha, $dbnome);

    //Definindo usúario permitido
    $usuario_email = "reidacaixinha@gmail.com";
    $usuario_senha = "yanVolei";

    //Verificando se o formulário foi enviado pelo METHOD = POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Obtém os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];


        if($email == $usuario_email && $senha == $usuario_senha) {
            //Redirecionamento do usúario de acordo com o email e senha corretos
            header('Location: adm.php');
            exit();

        } else {
            echo "<script>alert('E-mail ou senha incorretos')</script>";
        }
    }
    ?>
</body>
</html>