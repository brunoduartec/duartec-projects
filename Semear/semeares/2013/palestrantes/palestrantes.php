<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>

<script type="text/javascript">

var agent = navigator.userAgent.toLowerCase();
var isIE = agent.indexOf( "msie" ) > 0;


function validaTamanho(pElement,pSize){
	
	if(pElement.value.length>=pSize){
		pElement.value = pElement.value.substring(0,pSize-1);
	}
};

function obterCodigo(pEvento){	
	// pega o código de acordo com o browser
	return isIE ? pEvento.keyCode : pEvento.which;
};

function validarEmail(email){

	if (email != ""){
		var exp = /^[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
		if(exp.test(email))
			return true;
	}

	return false;
}

function validaDat(campo,valor) {

	if(valor == "")
		return true;
	
	var date=valor;
	var ardt=new Array;
	var ExpReg=new RegExp("(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[012])/[12][0-9]{3}");
	ardt=date.split("/");
	erro=false;
	if ( date.search(ExpReg)==-1){
		erro = true;
		}
	else if (((ardt[1]==4)||(ardt[1]==6)||(ardt[1]==9)||(ardt[1]==11))&&(ardt[0]>30))
		erro = true;
	else if ( ardt[1]==2) {
		if ((ardt[0]>28)&&((ardt[2]%4)!=0))
			erro = true;
		if ((ardt[0]>29)&&((ardt[2]%4)==0))
			erro = true;
	}
	if (erro) {
		alert("\"" + valor + "\" n�o � uma data v�lida!");
		campo.focus();
		campo.value = "";
		return false;
	}
	return true;
}

function mascaraData(campoData){
    var data = campoData.value;
     if (data.length == 2){
		data = data + '/';
		campoData.value = data;
      return true;              
     }
     if (data.length == 5){
		data = data + '/';
        campoData.value = data;
        return true;
     }
}

function mascaraFone(campoData){
    var data = campoData.value;
     if (data.length == 2){
		data = data + '-';
		campoData.value = data;
      return true;              
     }
     if (data.length == 8){
		data = data + '.';
        campoData.value = data;
        return true;
     }
}	 

function somenteNumeros(pEvento){

	var key;
	var keychar;
	var reg;
	
	//retorna o código do caracter digitado
	key = obterCodigo(pEvento);

	//se key for diferente de: 
	//8  - backspace
	//0 - seta esquerda, seta direita, del
	if (key!=8 && key!=0){
		keychar = String.fromCharCode(key);
		reg = /\d/;		
		return reg.test(keychar);
	}
	return true;
}


function enviardados(){

	if(document.dados.nome.value=="")
	{
		alert( "Preencha campo NOME corretamente!" );
		document.dados.nome.focus();
		return false;
	}

	if(document.dados.cpf.value=="" || document.dados.cpf.value.length < 11)
	{
		alert( "Preencha campo CPF  corretamente!" );
		document.dados.cpf.focus();
		return false;
	}

	if( !validarEmail(document.dados.email.value))
	{
		alert( "Preencha campo EMAIL corretamente!" );
		document.dados.email.focus();
		return false;
	}

	if(document.dados.dataNascimento.value=="")
	{
		alert( "Preencha campo DATA DE NASCIMENTO corretamente!" );
		document.dados.dataNascimento.focus();
		return false;
	}

	if(document.dados.telefone.value=="")
	{
		alert( "Preencha campo TELEFONE  corretamente!" );
		document.dados.telefone1.focus();
		return false;
	}
	
	
	
	if(document.dados.endereco.value=="")
	{
		alert( "Preencha campo ENDERE�O  corretamente!" );
		document.dados.endereco.focus();
		return false;
	}
	
	if(document.dados.universidade.value=="")
	{
		alert( "Preencha campo UNIVERSIDADE  corretamente!" );
		document.dados.universidade.focus();
		return false;
	}
	
	
	if(document.dados.cidade.value=="")
	{
		alert( "Preencha campo CIDADE  corretamente!" );
		document.dados.cidade.focus();
		return false;
	}
	
	
	if(document.dados.curso.value=="")
	{
		alert( "Preencha campo CURSO  corretamente!" );
		document.dados.curso.focus();
		return false;
	}
	
	if(document.dados.motivo.value=="")
	{
		alert( "Preencha campo MOTIVO DE PARTICIPAR DO SEMEAR!" );
		document.dados.motivo.focus();
		return false;
	}
	
	return true;
}


function validaCPF (campo,valor) {

	if(valor == "")
		return true;
		
	if (!vercpf(valor)) {
		alert("\"" + valor + "\" n�o � um cpf v�lido!");
		campo.focus();
		campo.value = "";
		return false;
	}

	return true
}


function vercpf (cpf) 
{
if (cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
return false;
add = 0;
for (i=0; i < 9; i ++)
add += parseInt(cpf.charAt(i)) * (10 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(9)))
return false;
add = 0;
for (i = 0; i < 10; i ++)
add += parseInt(cpf.charAt(i)) * (11 - i);
rev = 11 - (add % 11);
if (rev == 10 || rev == 11)
rev = 0;
if (rev != parseInt(cpf.charAt(10)))
	return false;
	
return true;
}


</script>
<!-- #BeginEditable "doctitle" -->
<title></title>
<!-- #EndEditable -->
<link href="../styles/style4.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />

</head>

<body>

<!-- Begin Navigation -->
	<div id="navigation">
	
	
	
<table>
	<tr>	
	<td><a href="../default.html"><img src="../images/semeares-logo.png" /></a></td>

			<td style="width: 100px" align="center"><a href="../default.html">Sobre o Semeares</a></td>
			<td style="width: 100px" align="center">
			<a href="../about/default.html">Sobre 
			n�s</a></td>
			<td style="width: 90px" align="center">
			<a href="../service/default.html">Servi�o</a></td>
			
			<td style="width: 80px" align="center">
			<a href="../photo_gallery/default.html">Galeria</a></td>
			
		
			<td style="width: 100px" align="center"><a href="palestrantes.php">Palestrantes</a></td>
			<td style="width: 100px" align="center"><a href="http://www.isemear.org.br">
			<img alt="" src="../images/logo.png" width="150px" />  </a></td>
			
			</tr>
	
	</table>
			
				
		
	</div>
	
	
	
	
	
	<!-- End Navigation -->
<!-- Begin Container -->
<div id="container">
	<!-- Begin Masthead -->
	<div id="masthead">

	</div>
	<!-- End Masthead -->
	
	<!-- Begin Page Content -->
	<div id="page_content">
		<!-- Begin Content -->
		<div id="content">
			<!-- #BeginEditable "content" -->
<title></title>

			<h2>Palestrantes</h2>
			
		<table>
			
			<?  
	$conexao = mysql_connect("localhost","abraaoba_isemear","abraao123");
    mysql_select_db("abraaoba_isemear",$conexao);
	
	$oResult = mysql_query("SELECT * from palestrante", $conexao);
	
	
	
/*
	while($row = mysql_fetch_array($oResult))
  {
   
	echo "<tr><td><img src=\"images/".$row['image']." \"/></td> <td>".sprintf('%011s',$row['info'])."</td></tr>"  ;
	}
  
   mysql_close($conexao);
   */
   
   ?>


      <tr>
     <td><img src="images/Amanda Lechinski.png"></td>
   </tr>

   <tr>
     <td><img src="images/Ozires Silva.png"></td>
   </tr>

   
   <tr>
     <td><img src="images/Jonatas Artur.png"></td>
   </tr>
   
   <tr>
     <td><img src="images/Tiago Bevilaqua.png"></td>
   </tr>


<tr>
     <td><img src="images/Sergio Walter Alexandrino.png"></td>
   </tr>
   
   <tr>
     <td><img src="images/Caio Dib.png"></td>
   </tr>
   <tr>
     <td><img src="images/Ana Cristina Zuccaro.png"></td>
   </tr>


<tr>
     <td><img src="images/Tiago Feijao.png"></td>
   </tr>



<tr>
     <td><img src="images/Ana Elisa Siqueira.png"></td>
   </tr>

   

			
</table>
					
			<!-- #EndEditable --></div>
		<!-- End Content -->
		<!-- Begin Sidebar -->
		<!-- End Sidebar --></div>
	<!-- End Page Content -->
	<!-- Begin Footer -->
	<div id="footer">
		<p><a href="../default.html">Sobre o Semeares</a> 
		| <a href="../service/default.html">Servi�o</a> | 
		 <a href="../photo_gallery/default.html">Galeria</a> |
		<a href="default.html">Palestrantes</a> </p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
