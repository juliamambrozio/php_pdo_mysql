<?php



if(!empty($_POST['nome']) && !empty($_POST['senha'])){ //verificando se não está vazio
   
$dsn = 'mysql:host=localhost;dbname=php_com_pdo'; // //DSN (nome da fonte de dados = mysql) nome do bd
$usuario = 'root';
$senha = 'julia9122';



try{
    $conexao = new PDO($dsn, $usuario,  $senha);

    //VERIFICANDO SE EXISTE NO BD

    $query = "Select * from tb_usuarios where";
    $query .= " nome = :nome "; //.= concatenação
    $query .= "AND senha = :senha ";

    //DEIXANDO MAIS SEGURO

    $stmt = $conexao->prepare($query); //separa os comandos SQL dos valores que vão ser enviados (evitando ações maliciosas), espera o execute para executar o comando

    $stmt->bindValue(':nome', $_POST['nome']); //cria ligação dos dados enviados para uma variável que é encaminhado para a query
    $stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_INT); //PDO: caso o usuário tente fezer alguma coisa no sistema através do input, o sistema só irá recuperar as informações númericas

    $stmt->execute(); //executação do código

    $usuario = $stmt->fetch();

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