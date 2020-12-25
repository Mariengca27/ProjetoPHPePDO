<?php
/*    25/12/2020  -- Projeto básico utilizando as principais ideias do PDO 
       
       PONTOS importantes:
       
       1º Sevidor XAMPP - Apache e MySQL devem estar ativados.
       2º O banco de dados já deve ter sido criado e nomeado(sem nada dentro de preferência).
       



*/

try
{
$conexao1 = new PDO('mysql: host=localhost; dbname=crudpdo','root','' ); //Passando os parâmetros para a conexão  
echo "Conexão existe";

$query = 'create table tb_teste(
      id int not null primary key AUTO_INCREMENT, 
      novoNome varchar(50) not null, 
      novoEmal varchar(100) not null,
      novaSenha varchar(32) not null 
       

) ';  //Já que a conexão existe, a partir disso podemos criar uma tabela dentro do BD.

$retorno = $conexao1 ->exec($query);
echo $retorno;    //QUE SERÁ ZERO

}


catch(PDOException $erro){
	print_r($erro);  

echo "Erro" . $erro->getCode().'Mensagem:'. $erro->getMessage();

//Pegando o erro utilizando os métodos públicos e a mensagem do erro também.
//Registrando esse erro(para analisar e evitar erros semelhantes futuros).

}



?>