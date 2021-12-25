<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = "root";
    $password = ""; 

    try {
        $conexao = new PDO($dsn, $user, $password);
    } catch (PDOException $err) {
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar erro
    }

?>