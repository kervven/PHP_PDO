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
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ);

        /* por padrão o retorno do metodo fetchAll é um array de arrays do banco de dados vem com
        os dois tipo de associação (numero e associativa(o nome da coluna)). Para configurar o tipo
        da associação do array, devemos por como parâmetro do metodo fetch All o comando PDO::FETCH_NUM
        para associação numerica ou FETCH_ASSOC para associação com os nomes das colunas da tabela.  */

/*         mas também há o tipo FETCH_OBJ que altera o tipo de retorno do fetchAll, fazendo que ele retorne um array de objetos.
        quando o retorno é um array de objetos e nao mais um array de arrays, a maneira que fazemos para acessar os objetos do banco de dados muda 
        invés de ser por exemplo echo $lista[0][nome] vai ficar echo $lista[0]->nome; */

        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        //echo $lista[0]['nome'];
        echo $lista[0]->nome;

    } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
        echo '<br> <br>';
        echo "Esse banco de dados nao existe";
    }

