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
echo $retorno;    //QUE SERÁ ZERO. 


//Query de testes para inserir dados na tabela criada:
$query = 'INSERT INTO tb_teste( novoNome, novoEmal, novaSenha) VALUES ("Maria Macis", "maas@ol.com.br", "993934")';

//Sempre lembrar que quando criar a query é necessário utilizar o método para executá-la. 
$retorno = $conexao1->exec($query);  //Reaproveitando a variável
echo $retorno;

//Podemos fazer uma Query de delete também, para apagar todos os registros do banco
$novaQ= 'delete from tb_teste' ;
$conexao1->exec($novaQ);       // Vai apagar tudo do BD. 

echo $novaQ;                  //Imprimir a variável que contém a info de delete. 


//OBS: Se ficar "atualizando" a página, cada atualização vai ser um registro colocado na tabela do banco de dados. Podem ser feitos vários registros ao mesmo tempo reaproveitando a variável query.


//Utilização do PDOStatement Object/Query(agora não é mais a utilização do método exec) :

$query = 'select * from tb_teste';


$stmt = $conexao1-> query($query); //acesso aos dados
print_r($stmt);

//A partir desse objeto podemos executar MÉTODOS novos: 

$lista = $stmt->fetchAll();
echo'<pre>';
print_r($lista);    // Arry 
echo '</pre>';


//Acesso a mais detalhes dos dados do BD:

echo $lista[1]['novoEmal'];   //Vai printar a informação da posição de memória 2 com o email.


}


catch(PDOException $erro){
	print_r($erro);  

echo "Erro" . $erro->getCode().'Mensagem:'. $erro->getMessage();

//Pegando o erro utilizando os métodos públicos e a mensagem do erro também.
//Registrando esse erro(para analisar e evitar erros semelhantes futuros).

}



?>