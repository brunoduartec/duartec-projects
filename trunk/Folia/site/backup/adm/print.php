<?php
	session_start('core');

	if($_SESSION['sistema']==1)
	{
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Folia de Luz</title>
</head>

<body>

    <table width="100%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5" width="100%">
    <?php
		require('conect.php');
		////////////////////////////////////////////////////
		if($_SESSION['PRINTOL'] == 1)
		{
		$query = " SELECT * FROM inscritos ORDER BY nome";		
		}
		if($_SESSION['PRINTOL'] == 2)
		{
		$query = " SELECT * FROM inscritos WHERE sexo='Masculino' ORDER BY nome";		
		}
		if($_SESSION['PRINTOL'] == 3)
		{
		$query = " SELECT * FROM inscritos WHERE sexo='Feminino' ORDER BY nome";	
		}
		$result = mysql_query($query) or die(mysql_error());
		$i=0;
		$e=0;
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
                <td width="80%"><?php echo $row['nome']; ?></td>
                <td width="10%"><?php echo $row['sexo']; ?></td>
            </tr>
            <?php
			$e=$e+1;
			$i=$i+1;
			if($i==27)
			{
				$i=0;
				?>
				</table>
                <br><br><br>
                <table width="100%" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="5" width="100%">
				<?php
			}
			}
		}
	?>
    </table>
    <?php echo 'Total de Inscritos: '.$e ?>

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