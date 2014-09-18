<?php
 		session_start('core');
 		$c = $_POST['codigo'];
		
		?>    
<script>
					<?php
					require('conect.php');
 					$query = " DELETE FROM inscritos WHERE codigo='$c' ";		
					$result = mysql_query($query) or die(mysql_error());
					?>
					alert('Deletado com Sucesso.');
					location.href="./adm.php";
</script>
        
		