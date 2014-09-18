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

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Folia de Luz - Inscrição</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />	
</head>

<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<span id="connect">
					<a href="https://www.facebook.com/groups/225856300789330/?fref=ts" target="_blank" class="facebook"></a>
				</span>

				<a href="http://www.foliadeluz.org.br/principal.html" id="logo"></a> <!-- /#logo -->
				<ul id="navigation">
					<li><a href="http://www.foliadeluz.org.br/principal.html">Home</a></li>
					<li><a href="http://www.foliadeluz.org.br/about.html">A Associação</a></li>
					<li><a href="http://www.foliadeluz.org.br/evento.html">O Evento</a></li>
					<li class="selected"><a href="http://www.foliadeluz.org.br/inscr.php">Inscrições</a></li>
					<li><a href="http://www.foliadeluz.org.br/contato.html">Contato</a></li>
				</ul>
			</div> <!-- /#header -->
			<div id="contents">
<center>
<center>
<h1>Inscrições para o Folia de Luz 2013 !</h1><hr color="#CCCCCC" size="1"><br>
<?php
if($aceito==NULL)
	{
		echo '<h3>Desculpe, Não posso continuar o seu cadastro sem voce ter aceito as Regras do Evento.</h3>';
		echo '<br><input type="button" value="Voltar" onClick="history.go(-1);">';
	}
	else
	{
$msg .= "Dados do Participante -----------------------------\n";
$msg .= "Nome:\t$nome_completo\n";
$msg .= "RG:\t$rg\n";
$msg .= "Nome Cracha:\t$nome_cracha\n";
$msg .= "Idade:\t$idade\n";
$msg .= "Dt. Nasc.:\t$data_de_nascimento\n";
$msg .= "Sexo:\t$sexo\n";
$msg .= "Telefone Residencial:\t$telefone_resi\n";
$msg .= "Celular:\t$telefone_celu\n";
$msg .= "E-Mail:\t$email\n";
$msg .= "Endereço:\t$endereco\n";
$msg .= "Cidade:\t$cidade\n";
$msg .= "Estado:\t$estado\n";
$msg .= "Alguma Medicação:\t$medicacao\n";
$msg .= "Qual:\t$qualmed\n";
$msg .= "Responsável -----------------------------\n";
$msg .= "Nome Responsavel:\t$nome_responsavel\n";
$msg .= "RG Responsavel:\t$rg_responsavel\n";
$msg .= "Telefone Responsavel:\t$telefone_responsavel\n";
$msg .= "Parentesco:\t$parentesco\n";
$msg .= "Parentesco Outro:\t$grauoutro\n";
$msg .= "Movimento Espírita (Participação) -----------------------------\n";
$msg .= "Participa de Alguma Mocidade Espírita:\t$participa_mocidade\n";
$msg .= "Nome da Casa:\t$nome_da_casa\n";
$msg .= "Participação na Mocidade Espírita (ME):\t$voce_e\n";
$msg .= "Participação na Mocidade Espírita (ME) - Outro:\t$voce_e_outro\n";
$msg .= "Pesquisa -----------------------------\n";
$msg .= "Como ficou sabendo do Folia de Luz: \t$pesquisa\n";
$msg .= "Regras e Termos de Responsabilidade -----------------------------\n";
$msg .= "Aceito Todas as Regras do Evento e comprometo-me a segui-las:\t$aceito\n";
$msg .= "Aceito que minha imagem seja utilizada pela Associação Espírita Folia de Luz:\t$aceito_foto\n";

$cabecalho .= "From: WebSite Folia de Luz\n";
$cabecalho .= "Reply-To: $email\n\n";

$to = "foliadeluz@gmail.com , myrna_maximo@hotmail.com"; // note the comma

mail($to, "Folia de Luz - Formulário de Inscrição", $msg, $cabecalho);

echo "<P ALIGN=\"CENTER\" style='font-size: 14px; font-family: Arial, Helvetica, sans-serif;'> ". $nome_cracha . " - Inscrição Concluida";
echo "<P ALIGN=\"CENTER\" style='font-size: 14px; font-family: Arial, Helvetica, sans-serif;'>Obrigado.</P>";


	}
?>

</center>				
		  </div> 		  <div id="featured">
			<ul>
						<li><a href="camiseta.html"><img src="images/shirt-branca.jpg" alt="shirt" width="142" height="174" /></a>Camiseta</li>
						<li><a href="images/cartaz2013.pdf" target="_blank"><img src="images/cartaz.jpg" alt="shirt" width="141" height="174" /></a>Cartaz</li>
						<li><a href="inscr.php"><img src="images/ficha-inscr.jpg" alt="shirt" width="141" height="174" /></a>Ficha de Inscrição</li>
                        <li><a href="lista.html"><img src="images/lista-esq.jpg" alt="shirt" width="141" height="174" /></a>Não Esquecer de Levar...</li>
						<li class="last"><a href="doacao.html"><img src="images/doacao.jpg" alt="shirt" width="141" height="174" /></a>Lista de Arrecadação - Doação</li>
		    </ul>
				</div>
	  </div> <!-- /#contents -->
			<div id="footer">
			  <div id="description">
					<div>
						<a href="http://www.visionid.com.br" target="_blank" class="logo"></a>
						<span>Desenvolvido por Vision | Internet Designer - <a href="http://www.visionid.com.br" target="_blank">www.visionid.com.br</a></span>
					</div>
				  <p><br>
				    Contato: foliadeluz@hotmail.com<br>
				  Tels: Myrna (12)9791-4331 / Juliana (12)8219-7921 / Fernanda (11)8154-5250</p>
				</div>
				<div class="navigation">
					<a href="http://www.foliadeluz.org.br/principal.html">Home</a>|
					<a href="http://www.foliadeluz.org.br/about.html">Associação</a>|
					<a href="http://www.foliadeluz.org.br/evento.html">O Evento</a>|
					<a href="http://www.foliadeluz.org.br/inscr.php">Inscrições</a>|
					<a href="http://www.foliadeluz.org.br/contato.html">Contato</a>
				</div>
			</div> <!-- /#footer -->
		</div> <!-- /#page -->
	</div> <!-- /#background -->
</body>
</html>