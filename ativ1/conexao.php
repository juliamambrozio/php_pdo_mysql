<?php

//CONEXÃO DE COMUNICAÇÃO COM O BD

$dsn = 'mysql:host=localhost;dbname=php_com_pdo'; // //DSN (nome da fonte de dados = mysql) nome do bd
$usuario = 'root';
$senha = 'julia9122';



try{
    $conexao = new PDO($dsn, $usuario,  $senha);


    //CRIANDO TABELAS

    $query = '
        create table if not exists tb_usuarios(
            id int not null primary key auto_increment,
            nome varchar(50) not null,
            email varchar(100) not null,
            senha varchar(32) not null
            )

    ';
    $retorno = $conexao->exec($query); //só volta dados (1) caso é modificado ou removido (limitado) 
    echo $retorno; //0

    $query = '
    delete from tb_usuarios
    ';
    
    $retorno = $conexao->exec($query);
    echo $retorno; //1
  

}catch(PDOException $e){
    echo 'Erro: '. $e->getCode().' Mensagem: '. $e->getMessage(); //código do erro, onde está o erro
    //registrar erro

}


?>