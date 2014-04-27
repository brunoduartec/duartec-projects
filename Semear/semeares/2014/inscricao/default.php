<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<!-- #BeginTemplate "../master.dwt" -->

<head>
<!-- #BeginEditable "doctitle" -->
<title>Semeares 2014 - Inscrição</title>
<!-- #EndEditable -->
<link href="../styles/style1.css" media="screen" rel="stylesheet" title="CSS" type="text/css" />
</head>

<body>

<!-- Begin Container -->
<div id="container">
	<!-- Begin Masthead -->
	<div id="masthead">
<table>
<tr>
<td><img alt="" src="../images/logo-2014.png"/></td>
<td><img src="../images/tema.png"/></td>
</tr>
</table>
		

	</div>
	<!-- End Masthead -->
	<!-- Begin Navigation -->
	
	<div id="navigation">
		<ul>
			<li><a href="../default.htm">Home</a></li>
			<li><a href="../programacao/default.php">Programação</a></li>
			<li><a href="../facilitadores/default.php">Facilitadores</a></li>
			<li><a href="../sobre/default.php">Sobre o Instituto</a></li>
			<li><a href="../imprensa/default.php">Na imprensa</a></li>
			<li><a href="../galeria/default.php">Galeria</a></li>
			<li><a href="default.php">Inscrições</a></li>
			<li><a href="../local/default.php">Local</a></li>
			<li><a href="../contato/default.php">Contato</a></li>
		</ul>
	</div>
	
	
	<!-- End Navigation -->
	<!-- Begin Page Content -->
	<div id="page_content">
		<!-- Begin Left Column -->
		<div id="column_l">
			<!-- #BeginEditable "content" -->
			<h2>Inscrição</h2>
			
			<form method="post" name="dados" action="cadastrar_semeares.php" onSubmit="return enviardados();" >
			<table border="0">
<tr>
   <td>Nome completo *:</td>
  
</tr>
<tr>
   <td><input type="text" size="80" name="nome" maxlength="100"></td>
   
</tr>

<tr>
   <td>Email *:</td>
   
   
</tr>
<tr>
   <td><input type="text" size="80" name="email" maxlength="100"></td>
  
</tr>

<tr>
   <td>Idade *:</td>
   
   
</tr>
<tr>
   <td><input type="text" size="80" name="age" maxlength="100"></td>
  
</tr>

<tr>
   <td>Sexo *:</td>
   
   
</tr>
<tr>
   <td><select name="gender">
<option value="M">Masculino</option>
<option value="F">Feminino</option>
</select></td>
  
</tr>


<tr>
   <td>telefone(DD-XXXXX.XXXX):</td>
   
</tr>
<tr>
   <td><input type="text" size="11" name="telefone" maxlength="13" OnKeyUp="mascaraFone(this);"  onkeypress="return somenteNumeros(event);" ></td>
    
</tr>

<tr>
   <td>&nbsp;</td>
</tr>

<tr>
   <td>Instituição:</td>
   
</tr>
<tr>
   <td><input type="text" size="30" name="escola" maxlength="100"></td>
   
</tr>

<tr>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Por que deseja participar do Semeares ?</td>
   
</tr>
<tr>
   <td>
   <select name="motivo">
<option value="Conhecer">Conhecer o Semear</option>
<option value="Tema">Ouvir sobre o Tema</option>
<option value="Palestrante">Ouvir um Palestrante</option>
<option value="Outro">Outro</option>
</select>
<br>
Informações adicionais:<br>
   <input type="text" size="30" name="motivo2" maxlength="300" style="width: 301px; height: 134px"></td>
   
</tr>

<tr>
   <td>&nbsp;</td>
</tr>

<tr>
   <td>Deseja receber certificado:</td>
   
   
</tr>
<tr>
   <td><select name="certification">
<option value="TRUE">Sim</option>
<option value="FALSE">Não</option>
</select></td>
  
</tr>


</table>
<input type="submit" value="Cadastrar">
<br/> * Lembre-se de levar um quilo de alimento no dia do evento
</form>

(*) Campos Obrigatórios	
			
			
			<!-- #EndEditable --></div>
		<!-- End Left Column -->
		<!-- Begin Right Column -->
		
		<!-- End Right Column --></div>
	<!-- End Page Content -->
	<!-- Begin Footer -->
<div id="footer">
		<p>Patrocinadores</p>
		<p>Parceria</p>
		<p>Apoio Institucional</p>
		<p>Realizador</p>
		<p>Organizador: Cida Gouvêa Eventos</p>
		
		<p>Copyright © Semear. All Rights Reserved.</p>
	</div>
	<!-- End Footer --></div>
<!-- End Container -->

</body>

<!-- #EndTemplate -->

</html>
