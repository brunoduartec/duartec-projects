<?
$nome = $_POST['nome']; 
$cpf = $_POST['cpf'];
$email = $_POST['email'];  
$nascimento = $_POST['nascimento']; 
$tel1 = $_POST['tel1'];
$tel2 = $_POST['tel2']; 
$tel3 = $_POST['tel3'];  
$end = $_POST['end'];
$escola = $_POST['escola'];
$curso = $_POST['curso'];
$porque = $_POST['porque'];
$aprov = $_POST['aprov'];
$univ = $_POST['univ'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$curso2 = $_POST['curso2'];
$inicio = $_POST['inicio'];

$dbname='abraaoba_isemear';
$usuario='abraaoba_fortal';
$password='isemear13';
if(!($id = mysql_connect('localhost',$usuario,$password)))
{
   echo "Não foi possível estabelecer
uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
} 
if(!($con=mysql_select_db($dbname,$id))) { 
   echo "Não foi possível estabelecer
uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit; 
} 
$sql = "insert Dados_ins_fortaleza set nome = '$nome', cpf = '$cpf', email = '$email', nascimento = '$nascimento', tel1 = '$tel1', tel2 = '$tel2', tel3 = '$tel3', end = '$end', escola = '$escola', curso = '$curso', porque = '$porque', aprov = '$aprov', univ = '$univ', cidade = '$cidade', estado = '$estado', curso2 = '$curso2', inicio = '$inicio' ";
$resultado = mysql_query($sql) or die ("Erro . :" . mysql_error());
if($resultado){
	echo "O cadastro foi realizado com sucesso! Em breve lhe enviaremos um email com os processos seguintes.";
        header('refresh:4; url=http://www.isemear.com.br' ); 
}
else
  echo "Ocorreu um erro, tente novamente";
	
?>