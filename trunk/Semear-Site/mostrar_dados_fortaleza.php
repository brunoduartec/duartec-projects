<html>
 <head>
  <title>Exibir dados com PHP/MySql</title>
 </head>
<body>

<h1>Dados inscrição Fortaleza</h1>

<?php

$dbname='abraaoba_isemear';
$usuario='abraaoba_fortal';
$password='isemear13';

$id = mysql_connect('localhost',$usuario,$password);

$con=mysql_select_db($dbname,$id);

mysql_select_db($banco); /*seleciona o banco a ser usado*/

$sql = "select * from Dados_ins_fortaleza";

$res = mysql_query($sql); /*Executa o comando SQL, no caso para pegar todos os usuarios do sistema e retorna o valor da consulta em uma variavel ($res)  */
echo "<h1>Dados da coluna</h1><table border='1'><th> Nome </th><th> CPF </th><th> Telefone 1 </th> <th> Telefone 2 </th><th> Telefone 3 </th><th> Email </th><th> Data de Nascimento </th><th> Endereco </th><th> Escola </th><th> Cursinho </th><th> Porque </th><th> Aprovacao </th><th> Universidade </th><th> Cidade </th><th> Estado </th><th> Curso </th><th> Inicio das aulas </th>";
while($escrever=mysql_fetch_array($res)){
echo "<tr><td>".utf8_decode($escrever['nome'])."</td><td>".$escrever['cpf']."</td><td>".$escrever['tel1']."</td><td>".$escrever['tel2']."</td><td>".$escrever['tel3']."</td><td>".$escrever['email']."</td><td>".$escrever['nascimento']."</td><td>".$escrever['end']."</td><td>".$escrever['escola']."</td><td>".$escrever['curso']."</td><td>".$escrever['porque']."</td><td>".$escrever['aprov']."</td><td>".$escrever['univ']."</td><td>".$escrever['cidade']."</td><td>".$escrever['estado']."</td><td>".$escrever['curso2']."</td><td>".$escrever['inicio']."</td></tr>";
}
echo "</table>";
?>

</body>
</html>