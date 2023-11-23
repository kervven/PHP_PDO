<?php

    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';


    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            select * from tb_usuarios
        ';

        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll();

        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        echo $lista[0]['nome'];


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

