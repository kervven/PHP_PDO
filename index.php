<?php

    $dsn = 'mysql:host=localhost;dbname=php_pdo';
    $usuario = 'root';
    $senha = '';


    try{
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            select * from tb_usuarios where id = 21
        ';

        $stmt = $conexao->query($query);
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

/*         para fazer consultas de apenas um dado, temos que alterar primeiramente a query com a regra de consultas
        em seguida mudar o metodo do stmt para somente fetch (as regras anteriormente com o fetechAll funcionam igualmente) */

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';

        //echo $usuario[0]['nome'];
        echo $usuario->nome;

    } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
        echo '<br> <br>';
        echo "Esse banco de dados nao existe";
    }

