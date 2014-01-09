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
     if (data.length == 10){
//		data = data + '.';
        campoData.value = data;
        return true;
     }
}	 

/*
function letras(){  
    tecla = event.keyCode;  
    if (tecla >= 48 && tecla <= 57){  
        return false;  
    }else{  
       return true;  
    }  
} 
*/


function somenteLetra(pEvento)
{

var tecla;
	var keychar;
	var reg;
	
	//retorna o cÃ³digo do caracter digitado
	tecla = obterCodigo(pEvento);
	if (tecla >= 48 && tecla <= 57){  
        return false;  
    }else{  
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
	
	/*
	if(document.dados.telefone2.value=="")
	{
		alert( "Preencha campo TELEFONE 2  corretamente!" );
		document.dados.telefone2.focus();
		return false;
	}
	*/
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
    	<style type="text/css">

h1
	{margin-top:14.0pt;
	margin-right:0cm;
	margin-bottom:14.0pt;
	margin-left:21.6pt;
	text-indent:-21.6pt;
	tab-stops:list 0cm;
	font-size:24.0pt;
	font-family:"Arial Unicode MS","sans-serif";
	}
 p.MsoNormal
	{margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Arial","sans-serif";
			margin-left: 0cm;
			margin-right: 0cm;
			margin-top: 0cm;
		}
span.MsoHyperlink
	{color:blue;
	text-decoration:underline;
	text-underline:single;
		}
a:link
	{color:blue;
	text-decoration:underline;
	text-underline:single;
		}
		</style>
    </head>
    <body >
                               
								
  
                             
	<h1 style="margin-top: 0cm; mso-list: l0 level1 lfo1; background: white">
	<span style="font-size:18.0pt">Inscrição para o Processo de Seleção 2014 – 
	matriz do Semear (São José dos Campos):</span><o:p></o:p></h1>
	<p class="MsoNormal" style="background: white">Este Processo de Seleção está 
	aberto aos seguintes candidatos:<o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="margin-left: 36.0pt; text-indent: -18.0pt; mso-list: l2 level1 lfo3; tab-stops: list 36.0pt; background: white">
	<![if !supportLists]>
	<span style="font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
Symbol"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</span></span></span><![endif]>residentes no Vale do Paraíba e que passaram 
	no vestibular de universidades públicas do Vale do Paraíba ou de qualquer 
	outra cidade do país<o:p></o:p></p>
	<p class="MsoNormal" style="margin-left: 36.0pt; text-indent: -18.0pt; mso-list: l2 level1 lfo3; tab-stops: list 36.0pt; background: white">
	<![if !supportLists]>
	<span style="font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
Symbol"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</span></span></span><![endif]>residentes no Vale do Paraíba e que passaram 
	no vestibular de universidades particulares de São José dos Campos, Jacareí 
	ou Taubaté, com bolsa integral ProUni<o:p></o:p></p>
	<p class="MsoNormal" style="margin-left: 36.0pt; text-indent: -18.0pt; mso-list: l2 level1 lfo3; tab-stops: list 36.0pt; background: white">
	<![if !supportLists]>
	<span style="font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
Symbol"><span style="mso-list:Ignore">·<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</span></span></span><![endif]>não residentes no Vale do Paraíba, mas que 
	passaram no vestibular de universidades públicas do Vale do Paraíba ou de 
	universidades particulares de São José dos Campos, Jacareí ou Taubaté, com 
	bolsa integral ProUni<o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">Além disso, os candidatos 
	devem obedecer aos seguintes critérios:<o:p></o:p></p>
	<p class="MsoNormal" style="margin-left: 36.0pt; text-indent: -18.0pt; mso-list: l1 level1 lfo2; tab-stops: list 36.0pt; background: white">
	<![if !supportLists]>
	<span style="font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
Symbol"><span style="mso-list:Ignore">-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</span></span></span><![endif]>ter estudado em escola pública (ou particular 
	com bolsa integral) nos últimos 5 anos escolares<o:p></o:p></p>
	<p class="MsoNormal" style="margin-left: 36.0pt; text-indent: -18.0pt; mso-list: l1 level1 lfo2; tab-stops: list 36.0pt; background: white">
	<![if !supportLists]>
	<span style="font-family:Symbol;mso-fareast-font-family:Symbol;mso-bidi-font-family:
Symbol"><span style="mso-list:Ignore">-<span style="font:7.0pt &quot;Times New Roman&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</span></span></span><![endif]>iniciar a faculdade em 2014 (seja no início 
	ou metade do ano)<o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">A inscrição para o Processo 
	Seletivo <b>começará no dia 9/1 e poderá ser realizada até o dia 2/2</b>.
	<span style="font-size:8.0pt"><o:p></o:p></span></p>
	<p class="MsoNormal" style="background: white">
	<span style="font-size:8.0pt">Excepcionalmente os candidatos que passarem 
	para UNICAMP ou UNESP poderão realizar a inscrição até o dia 8/2.</span><o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">O Processo Seletivo 
	acontecerá entre os dias <b>9/1</b> e <b>21/2/2014</b> e está regido pelo<span style="mso-spacerun:yes">&nbsp;
	</span><a href="documents/2014/Edital 2014.pdf">Edital 2014</a><o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">Os processos de seleção das 
	filiais de Fortaleza, Rio de Janeiro e São Paulo (capital) ainda não estão 
	abertos.<o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">Os candidatos deverão 
	apresentar a seguinte documentação em local e data a serem divulgados por 
	e-mail: <a href="documents/2014/Documentos Selecao 2014.pdf">Documentos Seleção 2014</a>.<o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<p class="MsoNormal" style="background: white">Caso seja necessário (de 
	acordo com as instruções do arquivo acima), deverão ser preenchidas as 
	Declarações a seguir:
	<a href="documents/2014/Declaracao Residencia Cedida.doc">Declaração de 
	Residência Cedida</a> e
	<a href="documents/2014/Declaracao Trabalho Informal.doc">Declaração de 
	Trabalho Informal</a> <br style="mso-special-character:line-break"><![if !supportLineBreakNewLine]>
	<br style="mso-special-character:line-break"><![endif]><o:p></o:p></p>
	<p class="MsoNormal" style="background: white">Além disso, o candidato deve 
	preencher a ficha abaixo:<span class="MsoHyperlink"><o:p></o:p></span></p>
	<p class="MsoNormal" style="background: white">
	<a href="documents/2014/Ficha de Identificacao Social.doc">
	Ficha de Indentificação Social</a><o:p></o:p></p>
	<p class="MsoNormal" style="background: white"><o:p>&nbsp;</o:p></p>
	<span style="font-size:12.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-fareast-font-family:
&quot;Times New Roman&quot;;mso-ansi-language:PT-BR;mso-fareast-language:ZH-CN;
mso-bidi-language:AR-SA">Atenção: os próximos passos para o Processo Seletivo 
	serão divulgados através do e-mail cadastrado no Formulário abaixo. Caso 
	você não receba nenhum comunicado até o dia 3/2, entre em contato 
	imediatamente através do e-mail <a href="mailto:contato@isemear.com.br">
	contato@isemear.org.br</a> ou do telefone (12) 99781-0847.<br style="mso-special-character:line-break">
	<![if !supportLineBreakNewLine]>
	<br style="mso-special-character:line-break"><![endif]></span>

<br><br>

<form method="post" name="dados" action="cadastrar.php" onSubmit="return enviardados();" >
<table border="0">
<tr>
   <td colspan='2'>Nome completo *:</td>
   <td>CPF (Somente números)*:</td>
</tr>
<tr>
   <td colspan='2'><input type="text" size="80" name="nome" maxlength="100" onkeypress="return somenteLetra(event);" ></td>
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
   <td>telefone 1 (DD-XXXXXXXXX)*:</td>
   <td>telefone 2 (DD-XXXXXXXXX):</td>
   <td>telefone 3 (DD-XXXXXXXXX):</td>
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