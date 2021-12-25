<?php

    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $user = "root";
    $password = ""; 

    try {
        $conexao = new PDO($dsn, $user, $password);
        $query = "
            create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            );
        ";

        $retorno = $conexao->exec($query);
        echo "$retorno";
        
        // $query = "
        // insert into tb_usuarios (
        //     nome, email, senha
        //     ) values (
        //         'john', 'jovijovi2019@gmail.com', 123456
        //     );
        // ";

        // $retorno = $conexao->exec($query);
        // echo "$retorno";
        
        $query = "
        delete from tb_usuarios;
        ";

        $retorno = $conexao->exec($query);
        echo "$retorno";

    } catch (PDOException $err) {
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar erro
    }

?>