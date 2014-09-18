<?php
	session_start('core');

	if($_SESSION['sistema']==1)
	{
		
	$c = $_POST['codigo'];
	$_SESSION['c'] = $c;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Folia de Luz</title>
<link rel="stylesheet" type="text/css" href="../css.css" />
</head>

<body>

<ul id="nav">
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li><a href="./verlista.php">Voltar</a></li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </li>
</ul>
<br><br>
<div class="maincontent">
	<table border="0" width="100%" style="padding-top:7px;">
    <tr><td valign="middle" width="337">Bem Vindo(a) Administrador do Sistema </td></tr></table>
    <font size="-4">Sistema nicodemos core 2012</font>
    <hr color="#888888" size="1">
	<center>
    <?php
		require('conect.php');
		////////////////////////////////////////////////////
		$query = " SELECT * FROM inscritos WHERE codigo=$c ";		
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			if($row['codigo']==1)
			{
			}
			else
			{
			?>
            Dados Pessoais:
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="10%" bgcolor="#CCCCCC">Código:</td>
                <td width="90%" bgcolor="#CCCCCC">Nome Completo:</td>
            </tr>
            <tr>
            	<td width="10%"><?php echo $row['controle']; ?></td>
                <td width="90%"><?php echo $row['nome']; ?></td>
            </tr>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="10%" bgcolor="#CCCCCC">Sexo:</td>
                <td width="90%" bgcolor="#CCCCCC">Apelido para o Cracha:</td>
            </tr>
            <tr>
            	<td><?php echo $row['sexo']; ?></td>
                <td><?php echo $row['nick']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="50%" bgcolor="#CCCCCC">Idade:</td>
                <td width="50%" bgcolor="#CCCCCC">Data de Nascimento:</td>
            </tr>
            <tr>
            	<td><?php echo $row['idade']; ?></td>
                <td><?php echo $row['nasc']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td bgcolor="#CCCCCC">Email:</td>
            </tr>
            <tr>
            	<td><?php echo $row['email']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td bgcolor="#CCCCCC">RG:</td>
            </tr>
            <tr>
            	<td><?php echo $row['rg']; ?></td>
            </tr>
            </table>
            Dados de Correspondência:
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td bgcolor="#CCCCCC">Endereço:</td>
            </tr>
            <tr>
            	<td><?php echo $row['endereco']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Cidade:</td>
                <td width="20%" bgcolor="#CCCCCC">Estado:</td>
            </tr>
            <tr>
            	<td><?php echo $row['cidade']; ?></td>
            	<td><?php echo $row['estado']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="50%" bgcolor="#CCCCCC">Telefone:</td>
                <td width="50%" bgcolor="#CCCCCC">Celular:</td>
            </tr>
            <tr>
            	<td><?php echo $row['telefone']; ?></td>
                <td><?php echo $row['celular']; ?></td>
            </tr>
            </table>
            <?php
			if($row['medicacao']!='')
			{
				echo 'Dados Médicos' ;
				?>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Medicação:</td>
            </tr>
            <tr>
            	<td><?php echo $row['medicacao']; ?></td>
            </tr>
            </table>
                <?php
			}
			if($row['idade']<18)
			{
			?>
            Dados do Responsável:
			<table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Nome:</td>
                <td width="20%" bgcolor="#CCCCCC">Parentesco:</td>
            </tr>
            <tr>
            	<td><?php echo $row['resp_nome']; ?></td>
                <td><?php echo $row['resp_parentesco']; ?></td>
            </tr>
            </table>
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="40%" bgcolor="#CCCCCC">RG:</td>
                <td width="60%" bgcolor="#CCCCCC">Telefone:</td>
            </tr>
            <tr>
            	<td><?php echo $row['resp_rg']; ?></td>
                <td><?php echo $row['resp_telefone']; ?></td>
            </tr>
            </table>
            <?php
			}
			if($row['mocidade']==1)
			{
			?>
            Dados da Mocidade:
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Nome da Casa:</td>
                <td width="20%" bgcolor="#CCCCCC">Participa como:</td>
            </tr>
            <tr>
            	<td><?php echo $row['nomedacasa']; ?></td>
                <td><?php echo $row['participacao']; ?></td>
            </tr>
            </table>
            <?php
			}
			if($row['aceito_imagem']==1)
			{
			?>
            Uso da Imagem:
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Esta Pessoa Autorizou o Uso de Sua Imagem.</td>
            </tr>
            </table>
            <?php
			}
			else
			{
			?>
            Uso da Imagem:
            <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
            <tr>
            	<td width="80%" bgcolor="#CCCCCC">Esta Pessoa Não Autorizou o Uso de Sua Imagem.</td>
            </tr>
            </table>
            <?php
			}
			}
		}
	?>
    <br><a href="./print2.php">Versão para Impressão</a>
    </center>
<br><br><br>
</center>
</div>
<center><h4>Desenvolvido por Pedro Nicodemos - www.kokorostudios.com.br - 2011/2012 </h4></center>
</body>
</html>
<?php
	}
	else
	{
	session_destroy();
	?>
			<script language= "JavaScript">
				alert('Você não tem Autorização para entrar nesta página');
				location.href="../index.php" 	
			</script>
    <?php
	}
?>