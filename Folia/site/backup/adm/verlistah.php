<?php
	session_start('core');

	if($_SESSION['sistema']==1)
	{
		
	$_SESSION['PRINTOL'] = 2;
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
	<li><a href="./adm.php">Voltar</a></li>
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
    <br>
    <center>
    <table width="95%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5">
    <?php
		require('conect.php');
		////////////////////////////////////////////////////
		$query = " SELECT * FROM inscritos WHERE sexo='Masculino' ORDER BY nome";		
		$result = mysql_query($query) or die(mysql_error());
		$i=0;
		while($row = mysql_fetch_array($result))
		{
			if($row['codigo']==1)
			{
			}
			else
			{
			?>
            <tr>
            	<td width="10%"><?php echo $row['nick']; ?></td>
                <td width="70%"><?php echo $row['nome']; ?></td>
                <td width="10%"><?php echo $row['sexo']; ?></td>
                <td width="20%"><form method="post" action="./verinscrito.php"><input type="hidden" value="<?php echo $row['codigo']; ?>" name="codigo">
                <input type="submit" value="Visualizar" name="visu"></form></td>
            </tr>
            <?php
			$i=$i+1;
			}
		}
	?>
    </table>
    <?php echo 'Total de Inscritos: '.$i ?><br>
    <a href="./print.php">Versão para Impressão</a>
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