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
<link rel="stylesheet" type="text/css" href="../css.css" />
</head>

<body>

<ul id="nav">
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li><a href="#">Admin</a></li>
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
    <table border="0"><tr><td valign="top">
    <table border="0"><tr><td valign="top">
    Gerenciar Lista de Inscritos:<hr size="1" color="#333333"><center>
    <input type="button" onClick="javascript:location.href='./verlista.php';" value="Exibir Toda Lista de Inscritos">
    <input type="button" onClick="javascript:location.href='./verlistah.php';" value="Exibir Inscritos Homens"><hr size="1" color="#999999">
    <input type="button" onClick="javascript:location.href='./verlistam.php';" value="Exibir Inscritos Mulheres">
    <input type="button" onClick="javascript:location.href='./dropinscrito.php';" value="Deletar Algum dos Inscritos"><hr size="1" color="#999999">
    <input type="button" disabled onClick="javascript:location.href='./editinscrito.php';" value="Editar Algum dos Inscritos">
    <input type="button" onClick="javascript:location.href='../registro2.php';" value="Adicionar Alguém aos Inscritos"></center>
    </td></tr></table></td><td valign="top">
    <table border="0"><tr><td valign="top">
    Gerenciar Sessões do Site (em construção):<hr size="1" color="#333333">
    <input type="button" disabled onClick="" value="Atualizar Noticias">
    <input type="button" disabled onClick="" value="Atualizar Lista de Doações"><hr size="1" color="#999999">
    <input type="button" disabled onClick="" value="Atualizar Regras">
    <input type="button" disabled onClick="" value="Atualizar Avisos">
    </td></tr></table></td></tr>
    <tr><td colspan="2" valign="top">
    Gerenciar as Edições Anteriores (em construção):<hr size="1" color="#333333">
    <input type="button" disabled onClick="" value="Atualizar Fotos">
    <input type="button" disabled onClick="" value="Atualizar Videos">
    <input type="button" disabled onClick="" value="Atualizar Temas">
    </td></tr>
    <tr><td colspan="2" valign="top">
    Opções do Usuário:<hr size="1" color="#333333">
    <input type="button" onClick="javascript:location.href='./logout.php';" value="Sair do Sistema">
    <input type="button" disabled onClick="javascript:location.href='./senha.php';" value="Alterar Senha do Administrador">
    </td></tr></table>
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