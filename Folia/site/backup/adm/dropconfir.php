<?php
	session_start('core');

	if($_SESSION['sistema']==1)
	{
		
	$c = $_POST['codigo']
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
	<center>
    Tem Certeza de que Deseja Deletar Este Registro ?
    <form method="post" action="./drop.php"><input type="hidden" value="<?php echo $c; ?>" name="codigo">
    <input type="submit" value="Deletar" name="visu"><input type="button" value="Voltar" onClick="javascript:location.href='./dropinscrito.php';">
    </form></td>
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