Prepare Statement

    Ao invés de simplesmente executar uma query nós vamos, na verdade, preparar um statement. Ou seja,  vamos executar o método prepare que continua nos retornando um PDOStatement, porém nós iremos, antes da execução do nosso statement da nossa declaração, fazer algumas tratativas nos parametros que irão compor as nossas queries. 

    * vamos injetar alguns registros no banco de dados,  já que no ultimo script inserimos uma instrução de delete via SQL Injection

    // query

            $query = "insert into tb_usuarios(nome, email, senha) values (
                'John Víctor Gonçalves', 'jovijovi2021@hotmail.com', 123456
            );";
            $statement = $conexao->query($query);

            $query = "insert into tb_usuarios(nome, email, senha) values (
                'Ikki de fenix', 'ikki_001@hotmail.com', 112233
            );";
            $statement = $conexao->query($query);

            $query = "insert into tb_usuarios(nome, email, senha) values (
                'Aiolia de Leão Fernandes', 'Aiolia_sola@hotmail.com', 777777
            );";
            $statement = $conexao->query($query);

    // nova query

            $query = "select * from tb_usuarios where ";
            $query .= "email ='{$_POST["email"]}' ";
            $query .= "AND senha ={$_POST["senha"]};";

            $stmt = $conexao->prepare(

            a diferença entre o prepare e o query, é que o prepare nao executa a query diretamente, ele fica aguardando a ordem de execução. Isso porque, antes de executar a query devemos tratá-la.
            Para tanto, utilizaremos o método bindValue() do objeto statement que é retornado pleo método prepare

            $stmt->bindValue($variavelDeLigacao, $valorDaLigacao)

    
// query

            $query = "select * from tb_usuarios where ";
            $query .= " email = :usuario ";
            $query .= " AND senha = :senha ";

            $stmt = $conexao->prepare($query);

            $stmt->bindValue(':usuario', $_POST["usuario"]); // vai tratar de não aceitar SQL Injection
            $stmt->bindValue(':senha', $_POST["senha"]);     // vai tratar de não aceitar SQL Injection

            $stmt->execute();

            echo "<pre>";
            print_r($stmt);
            echo "</pre>";
        
            $usuario = $stmt->fetch();

            echo "<pre>";
            print_r($usuario);
            echo "</pre>";

    o método bindValue pode trabalhar com um terceiro parâmetro, que é o tipo de dado dentro do parâmetro que estamos informando que deve ser considerado caso haja um SQL Injection.

    Seria como fazer uma análise do valor contido dentro desse segundo parâmetro mesmo que esse parâmetro contenha injeções SQL de valores que poderiam de fato serem utilizados na consulta.

    $stmt->bindValue($variavelDeLigacao, $valorDaLigacao, $data_type)

    por default, o value encaminhado é interpretado como String, logo todo o valor passado é compreendido como sendo um texto.
    
    PDO::PARAM_INT para extrair valores inteiros dentro do campo, e usar apenas esse valor extraido na nossa query

    $stmt->bindValue(':senha', $_POST["senha"], PDO::PARAM_INT);
