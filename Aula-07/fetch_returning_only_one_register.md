fetch -> retornando apenas um registro

    $query = "
        select * from tb_usuarios where id=7
    ";

    $stmt = $conexao->query($query);
    $registers = $stmt->fetch(PDO::FETCH_OBJ); 
    // vai retornar apenas um registro, logo não será um array, mas sim um objeto

    $query = "
        select * from tb_usuarios order by id desc limit 1;
    "; 
    // retornará todos os elementos de tb_usuarios ordenados de maneira decrescente com referencia ao id, e limitando-se a retornar apenas um registro