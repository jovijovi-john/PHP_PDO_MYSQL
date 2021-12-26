<?php

    if(!empty($_POST["usuario"]) && !empty($_POST["senha"])) {

        $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
        $user = "root";
        $password = ""; 
    
        try {
            $conexao = new PDO($dsn, $user, $password);

            // query

            $query = "select * from tb_usuarios where ";
            $query .= "email = '{$_POST["usuario"]}' ";
            $query .= "AND senha = '{$_POST["senha"]}'";

            echo $query;
                    
            $statement = $conexao->query($query);
            $usuario = $statement->fetch();

            echo "<pre>";
            
            print_r($usuario);
            echo "</pre>";
        
        } catch (PDOException $err) {
            
            print_r("Erro: ".$err->getCode()."<br/>");
            print_r("Mensagem: ".$err->getMessage());
    
            // registrar erro
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="index.php">

        <input type="text" placeholder="usuário" name="usuario">
        <br/><br/>
        
        <input type="password" placeholder="senha" name="senha">
        <br/><br/>
        
        <button type="submit">
            Logar
        </button>

    </form>
    
</body>
</html>