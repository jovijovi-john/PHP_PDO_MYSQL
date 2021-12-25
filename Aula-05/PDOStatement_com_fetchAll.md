PDOStatement Object (Query) com fetchAll

    Vamos aprender como utilizar o método query do PDO para enviar do PHP para o PDO instruções SQL, de modo que o PDO nos retorne um PDOStatement Object. Ou seja, um objeto que contenha a declaração da nossa query e que nos permita, por exemplo, recuperar as informações contidas no banco de dados.

    $query = "
    insert into tb_usuarios (nome, email, senha)
    values 
        ('Jovi', 'jovijovi_123@gmail.com', '123456'),
        ('John', 'john_john@hotmail.com', '654321'),
        ('Jorge Sant Ana', 'jorge@teste.com.br', '123456');
    ";

    $retorno = $conexao->exec($query);
    echo "$retorno";

    agora faremos uma query de consulta
    
    $stmt = $conexao->query($query); retornar um PDOStatement, um objeto de consulta
    stmt == STateMenT
    O stmt so tem uma propriedade, que é queryString(Used query string).

    dentro dessa instancia do PDOStatement há um método que retorna todos os registros recuperados da consulta: fetchAll()

    um exemplo do retorno desse método é o seguinte:

    Array
    (
        [0] => Array
            (
                [id] => 6
                [0] => 6
                [nome] => Jovi
                [1] => Jovi
                [email] => jovijovi_123@gmail.com
                [2] => jovijovi_123@gmail.com
                [senha] => 123456
                [3] => 123456
            )

        [1] => Array
            (
                [id] => 7
                [0] => 7
                [nome] => John
                [1] => John
                [email] => john_john@hotmail.com
                [2] => john_john@hotmail.com
                [senha] => 654321
                [3] => 654321
            )

        [2] => Array
            (
                [id] => 8
                [0] => 8
                [nome] => Jorge Sant Ana
                [1] => Jorge Sant Ana
                [email] => jorge@teste.com.br
                [2] => jorge@teste.com.br
                [senha] => 123456
                [3] => 123456
            )
    )

    pode-se notar, que podemos acessar as propriedades de cada posição desse arry por índice ou pelo nome da coluna, que são indices associativos, neste caso.    

    echo $registers[0]["nome"]."<br/>";
    echo $registers[1]["email"]."<br/>";
    echo $registers[2][3]."<br/>";