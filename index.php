<?php

    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';


    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(50) not null
            )
        ';

        $query = '
            insert into tb_usuarios(
                nome, email, senha
            ) values  (
                "Kerven Kildhery", "kervenkildhery@gmail.com", "123456"
            )
        ';

        $query = '
            delete from tb_usuarios
        ';

        $retorno = $conexao->exec($query); 
        echo $retorno;


        //o exec é um metodo de execução de queries(SQL) para o banco de dados de retorno limitado,
        //ele apenas executa a query e retorna a quantidade de linhas que foram alteradas.
        //Para criação de tabelas, por exemplo, o retorno sempre será 0, pois criação de tabela
        //nao afeta nenhuma linha, mas o seeding no banco de dados sim. É aí que o exec pode ser útil
        //porque sempre será retornado a quantidade de linhas que aquela determinada query afetou.


    } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
        echo '<br> <br>';
        echo "Esse banco de dados nao existe";
    }

