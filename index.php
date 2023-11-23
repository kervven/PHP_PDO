<?php

    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';


    try{
        $conexao = new PDO($dsn, $usuario, $senha);

    } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
        echo '<br> <br>';
        echo "Esse banco de dados nao existe";
    }

