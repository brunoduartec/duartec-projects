<?php
/*
Plugin Name: Loop Banner
Plugin URI: http://blog.plic-plac.com/
Description: Sorteia um determinado banner, imagem, video cadastrado e exibe
Version: 1.1
Author: Mari Assmann
Author URI: http://blog.plic-plac.com/
*/

define('LBADMINPASTA','edit.php?page=loop-banner.php');
add_action('activate_loop-banner.php',lb_ativar_data);
add_action('deactivate_loop-banner.php',lb_remover_data);
add_action('admin_menu',lb_menu_setup);

function lb_ativar_data() {
global $wpdb;
$tabela = $wpdb->prefix . "loopbanner";
$sql = "CREATE TABLE IF NOT EXISTS " . $tabela . " (
nuloopbanner integer NOT NULL auto_increment,
nmloopbanner varchar(150) NOT NULL,
nmbanner text NOT NULL,
nmgrupo varchar(30) NOT NULL,
dtcadastro datetime NOT NULL,
nuexibicao bigint(20) NOT NULL default '0',
tpativo char(1) default 'S',
PRIMARY KEY (nuloopbanner));";
$wpdb->query($sql);
add_option('lbremover', false);
}

function lb_remover_data() {
global $wpdb;
if(get_option('lbremover')) {
    $tabela = $wpdb->prefix . "loopbanner";
    $wpdb->query("DROP TABLE IF EXISTS " . $tabela);
    delete_option('lbremover');
    }
}

function lb_menu_setup() {
add_submenu_page('edit.php','Plugin Loop Banner','Loop Banner',9,'loop-banner.php','lb_pagina_admin');
}

function lb_admin_formulario($lbid) {
global $wpdb;
$tabela = $wpdb->prefix . "loopbanner";
if($lbid == 0)	{
	$lbdescricao='';
	$lbbanner='';
	$lbgrupo='';
	$lbativo='';
	$lbtotal=0;
	$formacao='acao=lbnovo';
	} 
else {
	$lista=$wpdb->get_row("SELECT * FROM " . $tabela . " WHERE nuloopbanner=$lbid");
	$lbdescricao=$lista->nmloopbanner;
	$lbbanner=$lista->nmbanner;
	$lbgrupo=$lista->nmgrupo;
	$lbativo=$lista->tpativo;
	$lbtotal=$lista->nuexibicao;
	$formacao='acao=lbsalvar';
	}	
?>

<div class="wrap">
	<a id="formtop"></a>
		<h2><?php _e('Criar/Editar Loop Banner') ?></h2>
			<fieldset class="options">
				<legend>Loop Banner</legend>	
					<form name="lbformulario" id="lbformulario" method="post" action="<?php echo(LBADMINPASTA); ?>&amp;<?php echo($formacao); ?>" ENCTYPE="multipart/form-data">
						<input type="hidden" name="lbid" value="<?php echo($lbid); ?>">
							<table width="77%">
								<tr>
									<td width="20%">Descri&ccedil;&atilde;o:</td>
									<td><input type="text" size="50" maxlength="150" name="lbdescricao" value="<?php echo($lbdescricao); ?>"></td>
								</tr>
								<tr valign="top">
									<td width="20%">Fonte do Banner:<br/><br/>Tags HTML (links, imagens, flash, youtube, googleAds, ...)</td>
									<td><textarea name="lbbanner" maxlength="1000" cols="70" rows="10"><?php echo($lbbanner); ?></textarea></td>
								</tr>
								<tr>
									<td width="20%">Grupo:</td>
									<td><input type="text" size="30" maxlength="30" name="lbgrupo" value="<?php echo($lbgrupo); ?>"></td>
								</tr>
								<tr>
									<td width="20%">Ativo:</td>
									<td><input type="checkbox" name="lbativo" <?php if($lbativo == "S") {?> checked="checked" <?php } ?> /></td>
								</tr>
								<tr>
									<td width="20%">Total Exibi&ccedil;&otilde;es:</td>
									<td><input type="text" size="6" name="lbtotal" value="<?php echo($lbtotal); ?>"></td>
								</tr>
								<tr>
							    	<td align="center" width="20%"><input type="submit" class="sfcontrol" name="lbnovo" value="Salvar"></td>
								    <td align="right"><small>Acesse: <a href="http://www.plic-plac.com">Site</a>&nbsp;|&nbsp;<a href="http://www.plic-plac.com/forum/">F&oacute;rum</a></small></td>
								</tr>
							</table>
 		            </form>
            </fieldset>
</div>
<?php
}

function lb_pagina_admin() {
global $wpdb;
$lbid = 0;
if(isset($_GET['acao'])) {
    switch($_GET['acao']) {
        case 'lbeditar': $lbid = $_GET['id'];
				         break;
		case 'lbsalvar': lb_atualiza_tabela();
				         break;
		case 'lbnovo': lb_novo_registro();
				        break;
		case 'lbdeletar': lb_deleta_registro($_GET['id']);
				          break;
        case 'lbopcao': lb_atualiza_opcao();
                         break;
        }
	}
$tabela = $wpdb->prefix . "loopbanner";
$lista = $wpdb->get_results("select nuloopbanner, nmloopbanner, nmbanner, nmgrupo, date_format(dtcadastro, '%d/%m/%Y') as data, nuexibicao, tpativo from " . $tabela . " order by tpativo desc, dtcadastro desc");
if($lista) {
?>
    <div class="wrap">
	    <h2><?php _e('Loop Banner') ?></h2>
		    <fieldset class="options"><legend>Loop Banner Atuais</legend>
			    <table width="100%" cellpadding="5" cellspacing="3" rules="rows" frame="below">
				    <tr>
					    <th align="left">C&oacute;digo</th>
    					<th align="left">Descri&ccedil;&atilde;o</th>
						<th align="left">Grupo</th>
						<th align="left">Ativo</th>
		    			<th align="center">Data<br/>Cadastro</th>
						<th align="center">Total<br/>Exibi&ccedil;&atilde;o</th>
				    	<th></th>
					    <th></th>
	    			</tr>
<?php
	$cnt = count($lista);
	for($i = 0; $i < $cnt; $i++) {
		if (($i % 2) == 1) {
?>
           <tr>
<?php
			}
		else {
?>
			<tr class="alternate">
<?php		}
				echo('<td><strong>'.$lista[$i]->nuloopbanner.'</strong></td>');
				echo('<td><strong>'.$lista[$i]->nmloopbanner.'</strong></td>');
				echo('<td>'.$lista[$i]->nmgrupo.'</td>');
				echo('<td>'.lb_ativo_inativo($lista[$i]->tpativo).'</td>');
				echo('<td align="center"><small>'.$lista[$i]->data.'</small></td>');
				echo('<td align="right">'.$lista[$i]->nuexibicao.'</td>');
?>
				<td align="center"><a href="<?php echo(LBADMINPASTA); ?>&acao=lbdeletar&id=<?php echo($lista[$i]->nuloopbanner); ?>" onclick="return confirm('Voc&ecirc; tem certeza que quer deletar este registro ?')">Apagar</a></td>
				<td align="center"><a href="<?php echo(LBADMINPASTA); ?>&acao=lbeditar&id=<?php echo($lista[$i]->nuloopbanner); ?>#formtop">Editar</a></td>
			</tr>
<?php
		}
?>
		</table>
	<p>Total de Loop Banner:&nbsp;&nbsp;<?php echo(count($lista)); ?></p>
	</fieldset>
	</div>
<?php
	}
 else {
?>
			<div class="wrap">
			<h3>Nenhum Loop Banner cadastrado.</h3>
			</div>
<?php
	}
lb_admin_formulario($lbid);
lb_opcoes_admin();
return;
}

function lb_opcoes_admin() {
$lbremover = get_option('lbremover');
?>
  <div class="wrap">
    <h2><?php _e('Op&ccedil;&otilde;es') ?></h2>
      <fieldset class="options">
        <legend>Op&ccedil;&otilde;es do Loop Banner</legend>
		  <form name="lb_opcao_form" id="lb_opcao_form" method="post" action="<?php echo(LBADMINPASTA); ?>&amp;acao=lbopcao" ENCTYPE="multipart/form-data">
		    <table width="70%">
			  <tr valign="top">
			    <td width="25%">Remover Plugin Loop Banner:</td>
				  <td><input name="lbremover" type="checkbox" id="lbremover" <?php if($lbremover == TRUE) {?> checked="checked" <?php } ?> />&nbsp;&nbsp;&nbsp;Se voc&ecirc; marcar esta op&ccedil;&atilde;o, todas as tabelas e registros vinculados ao loop banner ser&atilde;o removidos quando o plugin for desativado.</td>
			  </tr>
			</table>
		  <input type="submit" class="sfcontrol" name="lbopcao" value="Salvar Op&ccedil;&atilde;o">
		  </form>
	  </fieldset>
  </div>
<?php
return;
}

function lb_atualiza_opcao() {
if(isset($_POST['lbremover'])) {
    update_option('lbremover', true);
	}
else {
    update_option('lbremover', false);
	}
lb_mensagem("Op&ccedil;&otilde;es atualizadas");
return;
}

function lb_ativo_inativo($ativo) {
if ($ativo == "S") {
    return 'Sim';
	}
else {
	return '<font color="red">N&atilde;o</font>';
	}
}

function lb_atualiza_tabela() {
global $wpdb;
if(lb_checar_dados() == false)
	return;
$tabela = $wpdb->prefix . "loopbanner";
$sql = "UPDATE " . $tabela . " SET ";
$sql.= "nmloopbanner='".$_POST['lbdescricao']."', ";
$sql.= "nmbanner='".$_POST['lbbanner']."', ";
$sql.= "nmgrupo='".$_POST['lbgrupo']."', ";
if(isset($_POST['lbativo'])) {
	$sql.= "tpativo='S', ";
	}
else {
    $sql.= "tpativo='N', ";
	}
$sql.= "nuexibicao=".$_POST['lbtotal']." ";
$sql.= "WHERE nuloopbanner=".$_POST['lbid'].";";
$wpdb->query($sql);
lb_mensagem("Registro Atualizado.");
return;
}

function incrementa_loop_banner($id) {
global $wpdb;
$tabela = $wpdb->prefix . "loopbanner";
$sql = "UPDATE " . $tabela . " SET ";
$sql.= "nuexibicao = (nuexibicao + 1)";
$sql.= "WHERE nuloopbanner = " . $id . ";";
$wpdb->query($sql);
}

function lb_novo_registro() {
global $wpdb;
if(lb_checar_dados() == false)
	return;
if(isset($_POST['lbativo'])) {
	$ativo = 'S';
	}
else {
    $ativo = 'N';
	}
$tabela = $wpdb->prefix . "loopbanner";
$sql ="INSERT INTO " . $tabela . " (nmloopbanner, nmbanner, dtcadastro, nmgrupo, tpativo, nuexibicao) ";
$sql.="VALUES ('".$_POST['lbdescricao']."', '".$_POST['lbbanner']."', '".date("Y-m-d G:i:s")."', '".$_POST['lbgrupo']."', '".$ativo."', ".$_POST['lbtotal'].");";
if($wpdb->query($sql) === false) {
	lb_mensagem('Erro - N&atilde;o foi poss&iuml;vel salvar o registro');
	}
else {
	lb_mensagem("Novo registro criado.");
	}
return;
}

function lb_checar_dados() {
if(empty($_POST['lbdescricao'])) {
	lb_mensagem("Descri&ccedil;&atilde;o n&atilde;o informada. Abortado.");
	return false;
	}
if(empty($_POST['lbbanner'])) {
	lb_mensagem("Banner n&atilde;o informado. Abortado");
	return false;
	}
if(empty($_POST['lbgrupo'])) {
	lb_mensagem("Grupo n&atilde;o informado. Abortado");
	return false;
	}
return true;
}

function lb_deleta_registro($lbid) {
global $wpdb;
$tabela = $wpdb->prefix . "loopbanner";
$wpdb->query("DELETE FROM " . $tabela . " WHERE nuloopbanner=".$lbid);
lb_mensagem("Registro deletado.");
return;
}

function lb_mensagem($msg) {
echo '<div id="message" class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
return;
}

function show_loop_banner($grupo = "", $codigo = 0) {
global $wpdb;
$tabela = $wpdb->prefix . "loopbanner";
$sql = "select nuloopbanner, nmbanner from " . $tabela;
$sql .= " where tpativo = 'S'";
if ($codigo > 0)
    $sql .= " and nuloopbanner = " . $codigo;
else
    if ($grupo != "")
        $sql .= " and nmgrupo = '" . $grupo . "'";
$busca = $wpdb->get_results($sql);
if (!empty($busca)) {
    $pos = rand(0,count($busca) - 1);
    incrementa_loop_banner($busca[$pos]->nuloopbanner);
    echo $busca[$pos]->nmbanner;
    }
}
?>
