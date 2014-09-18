<?php
		session_start('inscricao');
		
		require('conect.php');
		$query = " INSERT INTO  
		inscritos (nome ,rg ,nick ,idade ,nasc ,sexo ,telefone ,celular ,email ,endereco ,cidade ,estado ,medicacao ,resp_nome ,resp_rg ,resp_telefone ,resp_parentesco ,mocidade ,nomedacasa ,participacao ,pesquisa ,aceito_imagem ,controle) VALUES ('".$_SESSION['nome_completo']."',  '".$_SESSION['seu_rg']."', '".$_SESSION['nome_cracha']."',  '".$_SESSION['idade']."', '".$_SESSION['data_de_nascimento']."',  '".$_SESSION['sexo']."', '".$_SESSION['seu_telefone']."',  '".$_SESSION['seu_celular']."', '".$_SESSION['seu_email']."',  '".$_SESSION['seu_endereco']."', '".$_SESSION['sua_cidade']."',  '".$_SESSION['seu_estado']."', '".$_SESSION['sua_medicacao']."',  '".$_SESSION['nome_responsavel']."','".$_SESSION['rg_responsavel']."',  '".$_SESSION['telefone_responsavel']."','".$_SESSION['parentesco_responsavel']."', '".$_SESSION['participa_mocidade']."',  '".$_SESSION['nome_da_casa']."',  '".$_SESSION['voce_e']."', '".$_SESSION['pesquisa']."', '".$_SESSION['aceito_foto']."', '".$_SESSION['seu_codigo']."') ";
		
		$result = mysql_query($query) or die(mysql_error().'<br> Caso você veja um Erro, comunique imediatamente ao site.');

		$a = $_SESSION['seu_codigo'];

		session_destroy();

?>
					<script language= "JavaScript">
					alert('Cadastro Realizado com Sucesso, não esqueça do seu Código <?php echo $a ;?> ');
					location.href="../index.php";
					</script>