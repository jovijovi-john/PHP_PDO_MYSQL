<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = "root";
    $password = ""; 

    try {
        $conexao = new PDO($dsn, $user, $password);
        
        $query = "
            select * from tb_usuarios order by id desc limit 1;
        ";

        $stmt = $conexao->query($query);
        $registers = $stmt->fetch(PDO::FETCH_OBJ);

        echo "<pre>";
        print_r($registers);
        echo "</pre>";

        
        echo $registers->nome."<br/>";

    } catch (PDOException $err) {
        
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar erro
    }

?>