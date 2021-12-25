Executando instruções SQL (Exec)

Ao inves de fazer isso:
  $query = "create tabletb_usuarios;"

Faça isso:
  $query = "create table if not exists tb_usuarios;"

Assim, a tabela só será criada caso não exista previamente no banco de dados

    $query = "
            create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            );
        ";

        $conexao->exec($query);

    DETALHE:

        O método exec do PDO retorna apenas o número de linhas que foram modificadas ou removidas pela instrução SQL que estamos encaminhando. Ou seja, em comandos DDL, sempre teremos o retorno 0. Isso porque, nesse processo de definição dos dados não estamos afetando, modificando ou removendo os dados.

        Um select (DML) retornaria 0 pois não está modificando nem removendo registros. Já em instruções UPDATE, DELETE e INSERT iriam retornar para nós o número de linhas afetadas no processo.

        Para as instruções de CRUD não iremos usar o exec pois ele é bem limitado

        Create
        Read
        Update
        Delete

        A partir do exec podemos executar qualquer tipo de query. CMS's como wordpress, moodle, sugar, etc. No processo de instalação possuem uma série de queries de criação de tabelas, são queries da subcategoria DDL, que estruturam toda a nossa base de dados

    $query = "
        insert into tb_usuarios (
            nome, email, senha
            ) values (
                'john', 'jovijovi2019@gmail.com', 123456
            );
        ";

        $retorno = $conexao->exec($query);
        echo "$retorno";
    
    se recarregar a página ele vai criar a mesma linha novamente, já que o id será autoincrementado, logo os registros não serão iguais. Muito cuidado...
    
    $query = "
        delete from tb_usuarios;
        ";

    $retorno = $conexao->exec($query);
        echo "$retorno"; 
    