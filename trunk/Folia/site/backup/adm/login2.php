<?php
//LOGIN ACORE
session_start('core');

$c = $_POST['codigo'];
$r = $_POST['rg'];

if($c=='')
{
	?>
			<script language= "JavaScript">
				alert('Por Favor, Insira um codigo valido');
				history.back(); 	
			</script>
    <?php
}
else
{
if($r=='')
{
	?>
			<script language= "JavaScript">
				alert('Por Favor, Insira um RG valido');
				history.back(); 	
			</script>
    <?php
}
else
{
	require('conect.php');
	
	//Codigo Principal
	$query = " SELECT controle FROM inscritos WHERE controle='$c' ";		
	$result = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($result)!=0)
	{
		$query2 = " SELECT * FROM inscritos WHERE controle='$c' and rg='$r' ";		
		$result2 = mysql_query($query2) or die(mysql_error());
		
		$beta = mysql_fetch_array($result2);
		
		if($beta['codigo']==1)
		{
			$_SESSION['sistema']=1;
			?>
				<script language= "JavaScript">
					location.href="adm.php"
				</script>
            <?php
		}
		else
		{
	
		if(mysql_num_rows($result2)!=0)
		{
			$_SESSION['sistema']=0;
			?>
				<script language= "JavaScript">
					location.href="usr.php"
				</script>
            <?php
		}
		else
		{
			?>
			<script language= "JavaScript">
				alert('Dados Incorretos, preencha novamente.');
				history.back(); 	
			</script>
    		<?php
		}
		}
	}
	else
	{
		?>
			<script language= "JavaScript">
				alert('Dados Incorretos, preencha novamente.');
				history.back(); 	
			</script>
    	<?php
	}
}
}

?>