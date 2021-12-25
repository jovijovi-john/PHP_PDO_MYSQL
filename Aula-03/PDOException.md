Tratando Excepetions -> (PDOExceptions)

    Sempre que o PDO identifica um erro(DSN errado, referência à uma tabela inexistente no banco, query inválida),
    O PDO trata esse erro e produz uma Exceção, que é  a PDOException pode ser capturada pelo PHP de modo que possamos tratar esse erro de forma reativa. Para isso, utilizaremos o try catch

    no caso do PDO capturaremos um erro do tipo PDOException. Pense em PDOException como sendo um objeto dentro de PDO que conterá as informações do erro. Então, ocorrendo um erro, haverá dentro do PDO um throw que vai disparar esse PDOException

    https://www.php.net/manual/pt_BR/class.pdoexception.php

    $e->getCode()       -> codigo do erro
    $e->getMessage()    -> mensagem

    try {
        $conexao = new PDO($dsn, $user, $password);
    } catch (PDOException $err) {
        print_r("Erro: ".$err->getCode()."<br/>");
        print_r("Mensagem: ".$err->getMessage());

        // registrar esse erro de alguma forma
    }