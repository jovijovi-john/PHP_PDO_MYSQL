PDO = Php Data Objects

Conjunto de objetos que nos auxiliam no trabalho com banco de dados
Objetivo: Padronização da forma com que o PHP se comunica com os bancos de dados. Na prática, esses objetos são agregados PHP no formato de extensão. Portanto, tais objetos podem ser habilitados ou desabilitados através do arquivo PHP inin


pdo_oci -> ORACLE
pdo_mysql -> MySQL
pdo_pgsql -> PostgreSQL
pdo_odbc / lib -> SQL Server

PDO tem proteção contra as SQL injection

A partir de um drive de comunicação (é uma extensão) - o MySQL ja vem por padrão - Nós podemos nos comunicar com os mais diversos SBD's distintos. 

As vezes a extensão não está disponível no PHP inin. Logo, é necessario o acréscimo de alguma biblioteca ou ate mesmo a utilização de um driver configurado no odbc da máquina.

Exemplo:

    O SQLServer não possui uma extensão PDO nativa. Nesse caso a própria Microsoft disponibiliza uma lib que pode ser agregada ao PHP funcionando como sua respectiva extensão para o PDO. Também é possível utilizar o pdo_dbc para utilizar o odbc do próprio servidor como sendo uma ponte de acesso ao driver nativo de manipulação daquele banco de dados.

    Caso esteja trabalhando com algum SGBD que não seja nativamente suportado pelo PDO, verifique se o fabricante daquele SGBD possui alguma lib que pode ser agregada ao PHP para funcionar como sendo um driver PDO.