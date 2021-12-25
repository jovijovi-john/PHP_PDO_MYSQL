fetchAll -> Trabalhando os tipos de retorno

    para trazer os registros apenas de maneira associativa:
        fetchAll(PDO::FETCH_ASSOC)

    para trazer os registros apenas de maneira indexada numericamente:
        fetchAll(PDO::FETCH_NUM)

    para trazer os registros de ambas maneiras:
        fetchAll(PDO::FETCH_BOTH) // esse já vem por default

    para trazer os registros como objetos:
        fetchAll(PDO::OBJ) 
        
        echo $registers[0]->nome."<br/>";

        
