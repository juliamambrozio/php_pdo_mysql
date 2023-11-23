<?php

//CONEXÃO DE COMUNICAÇÃO COM O BD

$dsn = 'mysql:host=localhost;dbname=php_com_pdo'; // //DSN (nome da fonte de dados = mysql) nome do bd
$usuario = 'root';
$senha = 'julia9122';



try{
    $conexao = new PDO($dsn, $usuario,  $senha);

}catch(PDOException $e){
    echo 'Erro: '. $e->getCode().' Mensagem: '. $e->getMessage(); //código do erro, onde está o erro
    //registrar erro

}


?>