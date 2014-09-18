<?php

	session_start('inscricao');
	
	$nome_completo = $_POST['nomecomp'];
	
	$rg = $_POST['rg1'].$_POST['rg2'].$_POST['rg3'].$_POST['rg4'];
	
	$nome_cracha = $_POST['nomecracha'];
	
	$idade = $_POST['selectidade'];
	
	$data_de_nascimento = $_POST['dianasc'].'/'.$_POST['mesnasc'].'/'.$_POST['anonasc'];
	
	$sexo = $_POST['radiosexo'];
	
	$telefone_resi = '('.$_POST['codtelefone'].')'.$_POST['telefoneresd'];
	
	$telefone_celu = '('.$_POST['codcelular'].')'.$_POST['telefonecelular'];
	
	$email = $_POST['email'];
	
	$endereco = $_POST['endereco'];
	
	$cidade = $_POST['cidade'];
	
	$estado = $_POST['estado'];
	
	$medicacao = $_POST['medicacao'];
	$qualmed = $_POST['qualmed'];
	
	$nome_responsavel = $_POST['nomecompresp'];
	
	$rg_responsavel = $_POST['rg1a'].$_POST['rg2a'].$_POST['rg3a'].$_POST['rg4a'];
	
	$telefone_responsavel = '('.$_POST['codtelefoneresp'].')'.$_POST['telefoneresp'];
	
	$parentesco = $_POST['parentesco'];
	
	$grauoutro = $_POST['grauoutro'];
	
	$participa_mocidade = $_POST['mocidade'];
	
	$nome_da_casa = $_POST['casaespirita'];
	
	$voce_e = $_POST['mocidadepart'];
	$voce_e_outro = $_POST['outromocidade'];
	
	$pesquisa = $_POST['pesquisa'];
	
	$aceito = $_POST['aceito'];
	
	$aceito_foto = $_POST['aceito2'];
	
	if($nome_completo=='')
	{
		?>
		<script language= "JavaScript">
		alert('Preencha seu Nome');
		history.back();	
		</script>
        <?php
	}
	else
	{
		if($rg=='')
		{
			?>
			<script language= "JavaScript">
			alert('Preencha seu RG');
			history.back();
			</script>
    	    <?php
		}
		else
		{
			if($nome_cracha=='')
			{
				?>
				<script language= "JavaScript">
				alert('Preencha seu Nome do Cracha');
				history.back();
				</script>
	    	   	 <?php
			}
			else
			{
				if($data_de_nascimento=='')
				{
					?>
					<script language= "JavaScript">
					alert('Preencha sua Data de Nascimento');
					history.back();	
					</script>
	    	   	 	<?php
				}
				else
				{
					if($telefone_resi=='')
					{
					?>
					<script language= "JavaScript">
					alert('Preencha seu Telefone');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
						
					if($email=='')
					{
					?>
					<script language= "JavaScript">
					alert('Preencha seu Email');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if($endereco=='')
					{
					?>
					<script language= "JavaScript">
					alert('Preencha seu Endereço');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if($cidade=='')
					{
					?>
					<script language= "JavaScript">
					alert('Preencha sua Cidade');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if(($qualmed=='') and ($medicacao==1))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o medicamento que você toma.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
										
					if(($telefone_resi=='') or (($telefone_responsavel=='') and ($idade < 18)))
					{
					?>
					<script language= "JavaScript">
					alert('Um dos telefones informados não é Válido.');
					history.back();
					</script>
	    	   	 	<?php
					}
					else
					{
						
					if(($nome_responsavel=='') and ($idade < 18))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o nome do seu Responsavel.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if(($rg_responsavel=='') and ($idade < 18))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o nome do seu Responsavel.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if(($telefone_responsavel=='') and ($idade < 18))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o nome do seu Responsavel.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
						
					if(($parentesco=='0') and ($idade < 18) and ($grauoutro==''))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o grau de parentesco de seu Responsavel.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
					
					if(($participa_mocidade==1) and ($nome_da_casa==''))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha o nome da Casa ou Centro Espírita que você Participa.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
						
					if(($participa_mocidade==1) and ($voce_e==''))
					{
					?>
					<script language= "JavaScript">
					alert('Escolha qual é a sua participação nas Mocidades.');
					history.back();
					</script>
	    	   	 	<?php	
					}
					else
					{
	
					if(($voce_e_outro='') and ($voce_e==4) and ($participa_mocidade==1))
					{
					?>
					<script language= "JavaScript">
					alert('Preencha qual é a sua participação nas Mocidades. (outro)');
					history.back();
					</script>
	    	   	 	<?php
					}
					else
					{
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
						
					}
				}
			}
		}
	}

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
	<li><a href="../index.php">Home</a></li>
	<li><a>A Associação Folia de Luz</a>
    <ul>
			<li><a href="../historia.html">Nossa História</a></li>
			<li><a href="../trabalho.html">Trabalho Voluntário</a></li>
			<li><a href="../patro.html">Patrocínio / Apoio</a></li>
			<li><a href="../food.html">Alementação / Doações</a></li>
	</ul>
    </li>
	<li><a>O Evento Folia de Luz</a>
    <ul>
			<li><a href="../regras.php">Regras</a></li>
			<li><a href="../avisos.php">Avisos</a></li>
			<li><a href="../programacao.php">Programação</a></li>
			<li><a href="../info.php">Informações</a></li>
            <li><a>Edições Anteriores</a>
            <ul>
            	<li><a href="../fotos.php">Fotos</a></li>
                <li><a href="../videos.php">Videos</a></li>
                <li><a href="../temas.php">Temas</a></li>
            </ul>
            </li>
            <li><a href="../camisas.php">Camisetas</a></li>
	</ul>
    </li>
    <li class="current"><a href="../registro.php">Inscrições</a></li>
    <li><a href="../contato.html">Contato</a></li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>
<br><br>
<div class="maincontent">
<center>
<h1>Inscrições para o Folia de Luz 2012 !</h1><hr color="#CCCCCC" size="1"><br>
<?php
if($aceito==NULL)
	{
		echo '<h3>Desculpe, Não posso continuar o seu cadastro sem voce ter aceito as Regras do Evento.</h3>';
		echo '<br><input type="button" value="Voltar" onClick="history.go(-1);">';
	}
	else
	{
		$i=1;
		while($i!=0)
		{
		
		$b = rand(1,9);
		
		if($b==1)
		{
			$random = 'A';
		}
		if($b==2)
		{
			$random = 'B';
		}
		if($b==3)
		{
			$random = 'C';
		}
		if($b==4)
		{
			$random = 'D';
		}
		if($b==5)
		{
			$random = 'E';
		}
		if($b==6)
		{
			$random = 'F';
		}
		if($b==7)
		{
			$random = 'G';
		}
		if($b==8)
		{
			$random = 'H';
		}
		if($b==9)
		{
			$random = 'I';
		}
		
		$seu_codigo = rand(1000000,9999999).$random;
		require('conect.php');
		$query = " SELECT controle FROM inscritos WHERE controle='$seu_codigo' ";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)!=0)
		{
			
		}
		else
		{
			//Liberando Código.
			$i=0;
		}
		
		}
?>
        <br>
		Por Favor, Guarde com Carinho este Código:<br>
        <h1><?php echo $seu_codigo; ?></h1>
        Este é o Seu Código para acesso aos seus dados no site do Folia de Luz.<br>
        <?php
		
		// Adicionando as Variaveis a Sessão
		
	$_SESSION['nome_completo'] = $nome_completo;
	
	$_SESSION['seu_rg'] = $rg;
	
	$_SESSION['nome_cracha'] = $nome_cracha;
	
	$_SESSION['idade'] = $idade;
	
	$_SESSION['data_de_nascimento'] = $data_de_nascimento;
	
	$_SESSION['sexo'] = $sexo;
	
	$_SESSION['seu_telefone'] = $telefone_resi;
	
	$_SESSION['seu_celular'] = $telefone_celu;
	
	$_SESSION['seu_email'] = $email;
	
	$_SESSION['seu_endereco'] = $endereco;
	
	$_SESSION['sua_cidade'] = $cidade;
	
	$_SESSION['seu_estado'] = $estado;
	
	if($medicacao==1)
	{
	$_SESSION['sua_medicacao'] = $qualmed;
	}
	
	$_SESSION['nome_responsavel'] = $nome_responsavel;
	
	$_SESSION['rg_responsavel'] = $rg_responsavel;
	
	$_SESSION['telefone_responsavel'] = $telefone_responsavel;
	
	if($parentesco==0)
	{
	$_SESSION['parentesco_responsavel'] = $grauoutro;
	}
	else
	{
	$_SESSION['parentesco_responsavel'] = $parentesco;
	}
	
	$_SESSION['participa_mocidade'] = $participa_mocidade;
	
	$_SESSION['nome_da_casa'] = $nome_da_casa;
	
	if($voce_e==4)
	{
		$_SESSION['voce_e'] = $voce_e_outro;
	}
	else
	{
		$c='';
		
		if($voce_e==1)
		{
			$c = 'Aluno';
		}
		if($voce_e==2)
		{
			$c = 'Dirigente';
		}
		if($voce_e==3)
		{
			$c = 'Convidado';
		}
		
		$_SESSION['voce_e'] = $c;
	}
	
	$_SESSION['pesquisa'] = $pesquisa;
	
	$_SESSION['aceito_foto'] = $aceito_foto;
	
	$_SESSION['seu_codigo'] = $seu_codigo;
		
        $query5 = " INSERT INTO  
		inscritos (nome ,rg ,nick ,idade ,nasc ,sexo ,telefone ,celular ,email ,endereco ,cidade ,estado ,medicacao ,resp_nome ,resp_rg ,resp_telefone ,resp_parentesco ,mocidade ,nomedacasa ,participacao ,pesquisa ,aceito_imagem ,controle) VALUES ('".$_SESSION['nome_completo']."',  '".$_SESSION['seu_rg']."', '".$_SESSION['nome_cracha']."',  '".$_SESSION['idade']."', '".$_SESSION['data_de_nascimento']."',  '".$_SESSION['sexo']."', '".$_SESSION['seu_telefone']."',  '".$_SESSION['seu_celular']."', '".$_SESSION['seu_email']."',  '".$_SESSION['seu_endereco']."', '".$_SESSION['sua_cidade']."',  '".$_SESSION['seu_estado']."', '".$_SESSION['sua_medicacao']."',  '".$_SESSION['nome_responsavel']."','".$_SESSION['rg_responsavel']."',  '".$_SESSION['telefone_responsavel']."','".$_SESSION['parentesco_responsavel']."', '".$_SESSION['participa_mocidade']."',  '".$_SESSION['nome_da_casa']."',  '".$_SESSION['voce_e']."', '".$_SESSION['pesquisa']."', '".$_SESSION['aceito_foto']."', '".$_SESSION['seu_codigo']."') ";
		
		$result5 = mysql_query($query5) or die(mysql_error().'<br> Caso você veja um Erro, comunique imediatamente ao site.');

		$a = $_SESSION['seu_codigo'];

		session_destroy();

	}
?>
Seu Cadastro foi realizado com sucesso.
<br><br>
</center>
</div>
<center><h4>Desenvolvido por Pedro Nicodemos - www.kokorostudios.com.br - 2011/2012</h4></center>
</body>
</html>
