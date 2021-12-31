<?php

    if(!empty($_POST["usuario"]) && !empty($_POST["senha"])) {

        $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
        $user = "root";
        $password = ""; 
    
        try {
            $conexao = new PDO($dsn, $user, $password);

            // query

            $query = "select * from tb_usuarios where ";
            $query .= " email = :usuario ";
            $query .= " AND senha = :senha ";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(':usuario', $_POST["usuario"]); // vai tratar de não aceitar SQL Injection
            $stmt->bindValue(':senha', $_POST["senha"]); // vai tratar de não// vai tratar de não aceitar SQL Injection

            $stmt->execute();

            echo "<pre>";
            print_r($stmt);
            echo "</pre>";
        
            $usuario = $stmt->fetch();

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

    <style>
        body::-webkit-scrollbar{
        width: 0.75rem;
        background-color: #dddddd;
        }
        body::-webkit-scrollbar-thumb{
        border-radius: 100px;
        background-color: #ab12ef;
        }
    </style>
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