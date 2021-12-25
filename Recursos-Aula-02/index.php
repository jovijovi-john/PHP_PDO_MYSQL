<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = "root";
    $password = ""; 

    try {
        $conexao = new PDO($dsn, $user, $password);
        
        $query = "
            select * from tb_usuarios
        ";

        $stmt = $conexao->query($query);
        $registers = $stmt->fetchAll(PDO::FETCH_OBJ);

        echo "<pre>";
        print_r($registers);
        echo "</pre>";

        
        echo $registers[0]->nome."<br/>";

    } catch (PDOException $err) {
        
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar erro
    }

?>