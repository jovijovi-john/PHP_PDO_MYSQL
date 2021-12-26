SQL Injection

    é uma grande vunerabilidade quando nossas aplicações não tratam devidamente as instruções SQL que são submetidas para o SGBD. SQL Injection é literalmente a injeção de instruções SQL, seja na URL ou no body do request, de informações que serão utilizadas para compor as nossas queryes do lado do back end


    $query = "select * from tb_usuarios where ";
    $query .= "email = '{$_POST["usuario"]}' ";
    $query .= "AND senha = '{$_POST["senha"]}'";

    echo $query;
    $conexao->query($query);
        

    quando usamos as chaves dentro de uma string, estamos criando um novo escopo php

    {
        <?php

            if(!empty($_POST["usuario"]) && !empty($_POST["senha"])) {

                $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
                $user = "root";
                $password = ""; 
            
                try {
                    $conexao = new PDO($dsn, $user, $password);

                    // query

                    $query = "select * from tb_usuarios where ";
                    $query .= "email = '{$_POST["usuario"]}' ";
                    $query .= "AND senha = '{$_POST["senha"]}'";

                    echo $query;
                            
                    $statement = $conexao->query($query);
                    $usuario = $statement->fetch();

                    echo "<pre>";
                    
                    print_r($usuario);
                    echo "</pre>";
                
                } catch (PDOException $err) {
                    
                    print_r("Erro: ".$err->getCode()."<br/>");
                    print_r("Mensagem: ".$err->getMessage());
            
                    // registrar erro
                }
            }

        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
        </head>
        <body>
            <form method="POST" action="index.php">

                <input type="text" placeholder="usuário" name="usuario">
                <br/><br/>
                
                <input type="password" placeholder="senha" name="senha">
                <br/><br/>
                
                <button type="submit">
                    Logar
                </button>

            </form>
            
        </body>
        </html>
    }

    nesse codigo acima, se digitar um usuario válido

    ex:
        'jovijovi_123@gmail.com
    e digitar uma senha válida
         senha = 123456
    
    ele pode muito bem fechar a instrução com '; dentro do proprio campo de senha e continuar injetando instruções sql

    ex:
        
        senha=123456';delete from tb_usuarios where 'a' = 'a
    a outra aspa ja tem no codigo, e assim completará duas queries no banco. Uma que era a original, e a segunda irá deletar todos os registros dessa tabela, já que 
        
        delete from tabela where true apagará tudo

