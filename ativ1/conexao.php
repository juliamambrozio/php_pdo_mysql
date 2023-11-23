<?php

//CONEXÃO DE COMUNICAÇÃO COM O BD

$dsn = 'mysql:host=localhost;dbname=php_com_pdo'; // //DSN (nome da fonte de dados = mysql) nome do bd
$usuario = 'root';
$senha = 'julia9122';



try{
    $conexao = new PDO($dsn, $usuario,  $senha);


    //CRIANDO TABELAS

   /*  $query = '
        create table if not exists tb_usuarios(
            id int not null primary key auto_increment,
            nome varchar(50) not null,
            email varchar(100) not null,
            senha varchar(32) not null
            )

    '; */
    //$retorno = $conexao->exec($query); //só volta dados (1) caso é modificado ou removido (limitado) 
    //echo $retorno; //0

    /* $query = '
    insert into tb_usuarios(
        nome, email, senha )values("Júlia", "ju@gmail.com", "123")
   
    ';

    $retorno = $conexao->exec($query);
    echo $retorno; //1 */

    $query = '
    select * from tb_usuarios';

    //EXIBINDO DADOS

    $PDOStatement = $conexao->query($query); //query = recuperar dados específicos, retorna um PDOStatement
    $lista = $PDOStatement->fetchAll(PDO::FETCH_ASSOC); //array lista,
    //PDO::FETCH_ASSOC (retornar índices associativos), PDO::FETCH_NUM (retornar índices númericos), PDO::FETCH_OBJ (retornar em formato de objeto)(acessar valores com ->, ex: $lista[1]->nome)
    //fetchAll: retorna todos os registros
    //fetch: retorna apenas um

    foreach($lista as $key => $value){
        //array, chaves, valores
        echo $value['nome'].'<br/>';
        echo $value['email'].'<br/>';
        echo $value['senha'].'<br/>';
        echo '<hr>';

    }
  

}catch(PDOException $e){
    echo 'Erro: '. $e->getCode().' Mensagem: '. $e->getMessage(); //código do erro, onde está o erro
    //registrar erro

}


?>