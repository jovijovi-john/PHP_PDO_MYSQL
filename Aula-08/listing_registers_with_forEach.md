Listando registros utilizando forEach

    $query = "
        select * from tb_usuarios;
    ";

    $stmt = $conexao->query($query);
    $registers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    """
    foreach($registers as $register => $value) {
          
            print_r($value);
            echo "<br/>";
          
            foreach($value as $collumn => $valor) {
                print_r($valor);
                echo "<br/>";
            }
            
            echo "<br/>";
            echo "<br/>";
    };

    o $register e o $collumn vao guardar os nomes dos índices, $value e $valor vao guardar os valores do array naquele índice em específico

    """

    Agora listaremos os valores da nossa consulta através de um foreach. Para isso, usaremos uma técnica chamada query on the run, ou seja, recuperando cada um desses registros no instante da execução do método query

     foreach($conexao->query($query) as $key => $value){
        echo "$key: ";
        print_r($value);
        echo "<br/>";
    };

    foreach($conexao->query($query) as $key => $value){
            echo "$key: ";
            print_r($value["nome"]);
            echo "<br/>";
        };