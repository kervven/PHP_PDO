<?php

    if(!empty($_POST['usuario']) && !empty($_POST['senha'])) {

        $dsn = 'mysql:host=localhost;dbname=php_pdo';
        $usuario = 'root';
        $senha = '';

        try{
            $conexao = new PDO($dsn, $usuario, $senha);

            $query = "select * from tb_usuarios where ";
            $query .= " email = '{$_POST['usuario']}' ";
            $query .= " AND senha = '{$_POST['senha']}' ";

            echo $query;

            $stmt = $conexao->query($query);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            echo '<hr>';

            echo '<pre>';
            print_r($usuario);
            echo '</pre>';
        } catch(PDOException $e){
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage(); 
            echo '<br> <br>';
            echo "Esse banco de dados nao existe";
        }
    };



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form method="post" action="index.php">
        <input type="text" placeholder="usuário" name="usuario">
        <br>
        <input type="password" placeholder="senha" name="senha">
        <br>
        <button type="submit">entrar</button>
    </form>
</body>
</html>

