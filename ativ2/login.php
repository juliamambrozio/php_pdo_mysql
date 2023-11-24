<?php

print_r($_POST);


if(!empty($_POST['nome']) && !empty($_POST['senha'])){ //verificando se não está vazio
   
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo'; // //DSN (nome da fonte de dados = mysql) nome do bd
$usuario = 'root';
$senha = 'julia9122';



try{
    $conexao = new PDO($dsn, $usuario,  $senha);

    //VERIFICANDO SE EXISTE NO BD

    $query = "Select * from tb_usuarios where";
    $query .= " nome = '{$_POST['nome']}' "; //.= concatenação
    $query .= "AND senha = '{$_POST['senha']}' ";

    echo $query;

    $stmt = $conexao->query($query); //executa o código

    //$usuario = $stmt->fetch();
    echo '<hr>';

    echo '<pre>';
        print_r($usuario);
    echo '</pre>';

}catch(PDOException $e){
    echo 'Erro: '. $e->getCode().' Mensagem: '. $e->getMessage(); 

}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" id="" placeholder="Usuário" name="nome">
        <input type="password"id="" placeholder="Senha" name="senha">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>