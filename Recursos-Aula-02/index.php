<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = "root";
    $password = ""; 

    try {
        $conexao = new PDO($dsn, $user, $password);
        
        $query = "
            select * from tb_usuarios;
        ";

        foreach($conexao->query($query) as $key => $value){
            echo "$key: ";
            print_r($value["nome"]);
            echo "<br/>";
        };

        // $stmt = $conexao->query($query);
        // $registers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // foreach($registers as $register => $value) {
        //     print_r($value);
        //     echo "<br/>";
        //     foreach($value as $collum => $valor) {
        //         print_r($valor);
        //         echo "<br/>";
        //     }
            
        //     echo "<br/>";
        //     echo "<br/>";
        // };

        
        // echo $registers[0]["nome"]."<br/>";

    } catch (PDOException $err) {
        
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar erro
    }

?>