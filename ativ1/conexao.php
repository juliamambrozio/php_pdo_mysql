<?php

//CONEXÃO DE COMUNICAÇÃO COM O BD

$dsn = 'mysql:host=localhost;dbname=php_com_pdo';
$usuario = 'root';
$senha = 'julia9122';

$conexao = new PDO($dsn, $usuario,  $senha); //DSN (nome da fonte de dados = mysql)


?>