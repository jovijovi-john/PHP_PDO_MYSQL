Criando uma conexão entre o PHP e o MySQL com PDO

    DSN = Data Source Name -> Nome da fonte de dados (mysql)
        -> Esse parâmetro é importante pois diz respeito ao drive de conexão que será utilizado
            Se quiser usar outro banco, é necessário entrar no php.ini e descomentar o banco. Reinicie o Apashe
            APASHE => Config => Php.ini
    
    host = pode ser localhost, ip, ou url

    $conexao = new PDO("DSN:host=localhost;dbname=php_com_pdo", "user", "password")

    collation = utf8_unicode_ci que reúne o maior número de caracteres e que não faz distinção entre caracteres maiúsculos e minúsculos