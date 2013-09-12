<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        
		<script type="text/javascript">

var agent = navigator.userAgent.toLowerCase();
var isIE = agent.indexOf( "msie" ) > 0;


function validaTamanho(pElement,pSize){
	
	if(pElement.value.length>=pSize){
		pElement.value = pElement.value.substring(0,pSize-1);
	}
};

function obterCodigo(pEvento){	
	// pega o cÃ³digo de acordo com o browser
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
		alert("\"" + valor + "\" não é uma data válida!");
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
     if (data.length == 7){
		data = data + '.';
        campoData.value = data;
        return true;
     }
}	 

function somenteNumeros(pEvento){

	var key;
	var keychar;
	var reg;
	
	//retorna o cÃ³digo do caracter digitado
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

	if(document.dados.telefone1.value=="")
	{
		alert( "Preencha campo TELEFONE 1  corretamente!" );
		document.dados.telefone1.focus();
		return false;
	}
	
	
	if(document.dados.telefone2.value=="")
	{
		alert( "Preencha campo TELEFONE 2  corretamente!" );
		document.dados.telefone2.focus();
		return false;
	}
	
	if(document.dados.endereco.value=="")
	{
		alert( "Preencha campo ENDEREÇO  corretamente!" );
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
		alert("\"" + valor + "\" não é um cpf válido!");
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

        <title></title>
    </head>
    <body >
                               
								
  
                             
<h2>Inscrição para o Processo de Seleção 2013 – matriz do Semear (São José dos Campos):</h2>

Este Processo de Seleção está aberto a candidatos de São José dos Campos, cidades vizinhas e São Paulo (capital), e suas regras são estabelecidas por este <a href="edital.pdf">edital</a>.
<br><br>
Somente são aptos a participar deste Processo Seletivo os candidatos que:
<br>
-	conquistaram uma vaga em qualquer universidade pública e vão iniciar o curso em 2013 (seja no início ou metade do ano).
<br>
-	estudaram em escola pública (ou particular com bolsa integral).
<br><br>
Este Processo Seletivo acontecerá entre os dias <b>8 e 23 de fevereiro, sendo obrigatória a presença nos dias 15, 16, 17 e em outros dias</b>, conforme aprovação nas etapas do processo. Os que obtiverem aprovação em todas as etapas deverão comparecer ao Primeiro Encontro dos Bolsistas, no dia <b>23</b> (dia todo). 
<br><br>
A inscrição no Processo Seletivo poderá ser feita até o dia <b>12</b>, contudo o candidato deverá estar apto já no dia 13 a se apresentar no local que será divulgado com toda a documentação necessária: <a href="documentos_selecao_2013.pdf">documentos selecao 2013</a>.
<br><br>
Caso seja necessário (de acordo com as instruções do arquivo acima), deverão ser preenchidas as Declarações a seguir: <a href="Declaracao_de_Residencia_Cedida.pdf">Declaração de Residência Cedida</a> e <a href="Declaracao_de_Trabalho_Informal.pdf">Declaração de Trabalho Informal</a>.
<br><br>
A nota do Enem também deverá ser apresentada (impressão pelo site <a target="_blank" href="http://sistemasenem2.inep.gov.br/resultadosenem">http://sistemasenem2.inep.gov.br/resultadosenem</a>). 
<br><br>
O Processo Seletivo ocorrerá na cidade de São José dos Campos, mas haverá transporte gratuito para os candidatos de São Paulo. Para estes candidatos será obrigatória a presença nos dias 16 e 17 de fevereiro, pelo menos.
<br><br>
Além disso, o candidato deve preencher a ficha abaixo. 
<br>
Atenção: os próximos passos para o Processo Seletivo serão divulgados através do e-mail cadastrado no Formulário abaixo. Caso você não receba nenhum comunicado até o dia 9 de fevereiro, entre em contato imediatamente através do e-mail: contato@isemear.com.br ou do telefone: 9781-0847.

<br><br>

<form method="post" name="dados" action="cadastrar.php" onSubmit="return enviardados();" >
<table border="0">
<tr>
   <td colspan='2'>Nome completo *:</td>
   <td>CPF (Somente números)*:</td>
</tr>
<tr>
   <td colspan='2'><input type="text" size="80" name="nome" maxlength="100"></td>
   <td><input type="text" size="11" name="cpf" maxlength="11" onblur="validaCPF(this,this.value)" onkeypress="return somenteNumeros(event);"></td>
</tr>

<tr>
   <td colspan='2'>Email *:</td>
   <td >Data de nascimento (DD/MM/AAAA)*:</td>
   
</tr>
<tr>
   <td colspan='2'><input type="text" size="80" name="email" maxlength="100"></td>
   <td><input type="text" size="10" name="dataNascimento" onblur="validaDat(this,this.value)" OnKeyUp="mascaraData(this);" onkeypress="return somenteNumeros(event);" maxlength="10"></td>
</tr>


<tr>
   <td>telefone 1 (celular) (DD-XXXX.XXXX)*:</td>
   <td>telefone 2 (casa) (DD-XXXX.XXXX)*:</td>
   <td>telefone 3 (contato) (DD-XXXX.XXXX):</td>
</tr>
<tr>
   <td><input type="text" size="11" name="telefone1" maxlength="12" OnKeyUp="mascaraFone(this);"  onkeypress="return somenteNumeros(event);" ></td>
   <td><input type="text" size="11" name="telefone2" maxlength="12" OnKeyUp="mascaraFone(this);"  onkeypress="return somenteNumeros(event);" ></td>
   <td><input type="text" size="11" name="telefone3" maxlength="12" OnKeyUp="mascaraFone(this);"  onkeypress="return somenteNumeros(event);" ></td>
   
</tr>

<tr>
   <td colspan="3">Endereço Completo (com CEP)*: </td>
</tr>
<tr>
   <td colspan="3"><input type="text" size="120" name="endereco" maxlength="200"></td>
   </td>
</tr>


<tr>
   <td colspan="3">&nbsp;</td>
</tr>

<tr>
   <td>Escola em que estudou:</td>
   <td colspan="2">Frequentou algum cursinho? Se sim, qual o nome?</td>
</tr>
<tr>
   <td><input type="text" size="30" name="escola" maxlength="100"></td>
   <td colspan="2"><input type="text" size="30" name="cursinho" maxlength="100"></td>
</tr>

<tr>
   <td colspan="3">Por que você deseja fazer parte do Semear? * (máx. 200 caracteres)</td>
</tr>
<tr>
   <td colspan="3"><textarea cols="100" rows="2" name="motivo" maxlength="200" 
	onkeydown="validaTamanho(this,200);"
	onkeyup="validaTamanho(this,200);"></textarea></td>
</tr>

<tr>
   <td colspan="3">&nbsp;</td>
</tr>

<tr>
   <td colspan="3"><b>Aprovação no Vestibular: </b></td>
</tr>
<tr>
<td  colspan="3">
<table>
<tr>
   <td>Universidade *:</td>
   <td>Cidade *:</td>
   <td>Estado (sigla)*:</td>
</tr>
<tr>
   <td><input type="text" size="30" name="universidade" maxlength="100"></td>
   <td><input type="text" size="20" name="cidade" maxlength="20"></td>
   <td><input type="text" size="2" name="estado" maxlength="2"></td>
</tr>
<tr>
   <td>Curso *:</td>
   <td colspan="2">Início das aulas (DD/MM/AAAA):</td>
</tr>
<tr>
   <td><input type="text" size="30" name="curso" maxlength="100"></td>
   <td colspan="2"><input type="text" size="10" name="dataInicio" OnKeyUp="mascaraData(this);" onblur="validaDat(this,this.value)" onkeypress="return somenteNumeros(event);" maxlength="10"></td>
</tr>

</table>
</td></tr>
</table>
<input type="submit" value="Cadastrar">
</form>

(*) Campos Obrigatórios
							 
</body>
    
</html>