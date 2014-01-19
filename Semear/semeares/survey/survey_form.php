<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">


<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="af" http-equiv="Content-Language" />

<script type="text/javascript">

var agent = navigator.userAgent.toLowerCase();
var isIE = agent.indexOf( "msie" ) > 0;


function validaTamanho(pElement,pSize){
	
	if(pElement.value.length>=pSize){
		pElement.value = pElement.value.substring(0,pSize-1);
	}
};


function validarEmail(email){

	if (email != ""){
		var exp = /^[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;
		if(exp.test(email))
			return true;
	}

	return false;
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
		alert( "Preencha campo ENDERE&#65533;O  corretamente!" );
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




</script>

<title>Formulário de satisfação</title>



<style type="text/css">
.style1 {
	font-size: xx-large;
}
.style2 {
	text-align: center;
}
</style>


</head>

<body bgcolor="#FFBB77">


	
	
	
	<img alt="" src="../images/semeares-logo-lite.png" />
<p align="center">
			<span class="style1">Pesquisa de satisfação</span>
</span><br>
			Nos ajude a fazer o Semeares cada vez melhor nos dando sua opinião 
			sobre a experiência que teve.</p>

<form method="post" name="dados" action="insert_action.php" onSubmit="return enviardados();" >
<table border="0" align="center" width="60%" bgcolor="#669900">
<tr>
   <td>&nbsp;</td>
  
   <td>Nome completo:</td>
  
</tr>
<tr>
   <td>&nbsp;</td>
   
   <td><input type="text" size="80" name="nome" maxlength="100"></td>
   
</tr>

<tr>
   <td>&nbsp;</td>
   
   
   <td>Email:</td>
   
   
</tr>
<tr>
   <td>&nbsp;</td>
  
   <td><input type="text" size="80" name="email" maxlength="100"></td>
  
</tr>


<tr>
   <td>&nbsp;</td>
   
   <td>Palestrante favorito:</td>
   
</tr>
<tr>
   <td>
    &nbsp;</td>
    
   <td>
   
       <select name="palestrante1">
				<option>Nenhum</option>
				<option>Ozires Silva</option>
     			<option>Jonatas Artur</option>								
				<option>Sérgio Walter</option>
				<option>Almir Mello</option>				
				<option>Amanda Lechinski</option>
				<option>Tiago Bevilaqua</option>
				<option>Ana Cristina Zucaro</option>
				<option>Armando Milioni</option>
				<option>Caio Dib</option>
				<option>Thiago Feijão</option>
				<option>Ana Elisa Siqueira</option>
			</select>

   </td>
    
</tr>

<tr>
   <td>&nbsp;</td>
   
   <td>Segundo Palestrante favorito:</td>
   
</tr>
<tr>
   <td>
     &nbsp;</td>
    
   <td>
     <select name="palestrante2">
				<option>Nenhum</option>
				<option>Ozires Silva</option>
     			<option>Jonatas Artur</option>								
				<option>Sérgio Walter</option>
				<option>Almir Mello</option>				
				<option>Amanda Lechinski</option>
				<option>Tiago Bevilaqua</option>
				<option>Ana Cristina Zucaro</option>
				<option>Armando Milioni</option>
				<option>Caio Dib</option>
				<option>Thiago Feijão</option>
				<option>Ana Elisa Siqueira</option>
			</select>
   </td>
    
</tr>



<tr>
   <td>&nbsp;</td>
   
   <td>O que você achou da duração do evento:</td>
   
</tr>
<tr>
   <td>
     &nbsp;</td>
    
   <td>
     <select name="duracao">
					<option>Muito Longo</option>
					<option>Longo</option>
					<option>Adequado</option>
					<option>Curto</option>
					<option>Muito Curto</option>
				
			</select>
   </td>
    
</tr>

<tr>
   <td>&nbsp;</td>
   
   <td>Quanto à organização do evento (recepção, coffee break, espaço do evento etc), indique seu grau de satisfação:</td>
   
</tr>
<tr>
   <td>
     &nbsp;</td>
    
   <td>
     <select name="organizacao">
					<option>Excelente</option>
					<option>Bom</option>
					<option>Médio</option>
					<option>Ruim</option>
					<option>Muito Ruim</option>
				
			</select>
   </td>
    
</tr>



<tr>
   <td>&nbsp;</td>
   
   <td>Por causa do evento SemeAres, você ficou interessado em participar/contribuir com o Instituto Semear?</td>
   
</tr>
<tr>
   <td>
     &nbsp;</td>
    
   <td>
     <select name="participacao">
					<option>SIM</option>
					<option>NÃO</option>
	</select>
   </td>
    
</tr>


<tr>
   <td>&nbsp;</td>
   
   <td>Caso positivo,você tomou alguma iniciativa para isso ?</td>
   
</tr>
<tr>
   <td>
     &nbsp;</td>
    
   <td>
    <textarea name="iniciativa" cols="40" rows="5"></textarea>
   </td>
    
</tr>



<tr>
   <td>&nbsp;</td>
   
   <td>Do que gostou no evento ?</td>
   
</tr>
<tr>
   <td>&nbsp;</td>
    
   <td>
   <textarea name="gosto" cols="40" rows="5"></textarea>
    
</tr>

<tr>
   <td>&nbsp;</td>
   
   <td>Do que não gostou no evento ?</td>
   
</tr>
<tr>
   <td>&nbsp;</td>
    
   <td>  <textarea name="nao_gosto" cols="40" rows="5"></textarea>
   </td>
    
</tr>

<tr>
   <td>&nbsp;</td>
   
   <td>Sugestão:</td>
   
</tr>
<tr>
   <td>&nbsp;</td>
    
   <td>
   <textarea name="sugiro" cols="40" rows="5"></textarea>
	</td>
    
</tr>

<tr>
   <td>&nbsp;</td>
   
   <td>Você pretende participar do próximo SemeAres ?</td>
   
</tr>
<tr>
   <td>&nbsp;</td>
    
   <td>
   <select name="proximo">
				<option>SIM</option>
				<option>NÃO</option>
			</select>
   </td>
    
</tr>


</td></tr>

<tr>
	<td>
	&nbsp;</td>
	<td>
	<input type="submit" value="Cadastrar">
	</td>
</tr>

<tr>
	<td>
	&nbsp;</td>
	<td>
	&nbsp;</td>
</tr>

</table>

</form>

<div class="style2">


		
</div>
			
		
</body>

<!-- #EndTemplate -->

</html>
