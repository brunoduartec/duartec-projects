<html>
 <head>
  <title>Exibir dados com PHP/MySql</title>
 </head>
<body>

<h1>Dados inscritos Sao Paulo 2014</h1>

<?php

$dbname='abraaoba_isemear';
$usuario='abraaoba_fortal';
$password='isemear13';

$id = mysql_connect('localhost',$usuario,$password);

$con=mysql_select_db($dbname,$id);

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$sql = "select * from candidato_2014 where cadt_dt_inscricao >= '2013-12-19' and cadt_unidade = 'SP' order by cadt_id";
$sqlcount = "select count(*) as count from candidato_2014 where cadt_dt_inscricao >= '2013-12-19' and cadt_unidade = 'SP'";

//ALTER TABLE tablename AUTO_INCREMENT = 1

$res = mysql_query($sql); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel 
($res)  */
$rescount = mysql_query($sqlcount);
	$rowcount = mysql_fetch_array($rescount);

echo "Inscritos: ".$rowcount['count']."</br>";
echo "<h1>Dados da coluna</h1><table border='1'>   <th> ID </th><th>Nome</th><th>Curso</th><th> Inscricao </th><th> Email </th><th> Telefone 1 </th> <th> Telefone 2 </th><th> Telefone 3 </th><th> Universidade </th><th>Cidade</th><th> Estado </th><th> Data de Nascimento </th><th> Porque </th><th> Endere&#65533;o </th><th> CPF </th><th> Escola </th><th>  Cursinho </th><th> Inicio das aulas </th>";
while($escrever=mysql_fetch_array($res)){
echo "<tr><td>".$escrever['cadt_id']."</td><td>".$escrever['cadt_nome']."</td><td>".$escrever['cadt_curso']."</td><td>".$escrever['cadt_dt_inscricao']."</td><td>".$escrever['cadt_email']."</td><td>".$escrever['cadt_telefone1']."</td><td>".$escrever['cadt_telefone2']."</td><td>".$escrever['cadt_telefone3']."</td><td>".$escrever['cadt_universidade']."</td><td>".$escrever['cadt_cidade']."</td><td>".$escrever['cadt_estado']."</td><td>".$escrever['cadt_dataNascimento']."</td><td>".$escrever['cadt_motivo']."</td><td>".$escrever['cadt_endereco']."</td><td>".$escrever['cadt_cpf']."</td><td>".$escrever['cadt_escola']."</td><td>".$escrever['cadt_cursinho']."</td><td>".$escrever['cadt_dataInicio']."</td></tr>";
}
echo "</table>";?>

</body>
</html>