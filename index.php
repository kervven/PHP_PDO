<?php

    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';


    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            select * from tb_usuarios
        ';

        foreach($conexao->query($query) as $key => $value) {
            print_r($value);
            //print_r($value['nome']);
            //print_r($value[1]);
            echo '<hr>';

            /* outra forma de fazer consulta por listagem de registro é usando a tecnica 
            query-one-the-one, onde toda a logica da consulta fica simplemente dentro 
            de um foreach sem precisar do fetchAll. Por padrão ele vem com os tipos de associação, tanto por indice ou nome 
            e para alterarmos o tipo de retorno por somente indice ou nome, é só colocar como parâmetro o tipo específico do retorno que queremos*/
        }  


        //$stmt = $conexao->query($query);

        /* $lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($lista_usuarios as $key => $value) {
            echo $value['nome'];
            echo '<hr>';
        } */

        /* essa é uma maneira eficaz de fazermos listagem de registros em um banco de dados a partir do comando
        foreach, conseguimos listar todos os dados de uma coluna de uma tabela, ou todos os dados de uma tabala de forma mais separada. */


    } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
        echo '<br> <br>';
        echo "Esse banco de dados nao existe";
    }

