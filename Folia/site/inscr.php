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

				<a href="principal.html" id="logo"></a> <!-- /#logo -->
				<ul id="navigation">
					<li><a href="principal.html">Home</a></li>
					<li><a href="about.html">A Associação</a></li>
					<li><a href="evento.html">O Evento</a></li>
					<li class="selected"><a href="inscr.php">Inscrições</a></li>
					<li><a href="contato.html">Contato</a></li>
				</ul>
			</div> <!-- /#header -->
			<div id="contents">
<center>
<?php

date_default_timezone_set('America/Sao_Paulo');

$dia = date("d");
$mes = date("m");
$ano = date("y");

if($ano == 14 && $mes == 02 )
{ ?>
<h1>Inscrições para o Folia de Luz 2014 !</h1><hr color="#CCCCCC" size="1">
<font size="-3">(*) Campos Obrigatórios</font><br>
<form name="form" method="post" action="http://www.visionid.com.br/cliente/inscrok.php">
<table border="0" cellpadding="4" cellspacing="0">
	<tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center"> Seus Dados</td>
    </tr>
    <tr>
		<td>Nome Completo:*</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="nomecomp"></td>
	</tr>
    <tr>
		<td>RG:*</td>
        <td colspan="2"><input type="text" size="2" maxlength="2" name="rg1">.<input type="text" size="3" maxlength="3" name="rg2">.
        <input type="text" size="3" maxlength="3" name="rg3">-<input type="text" size="1" maxlength="1" name="rg4"></td>
	</tr>
    <tr>
    	<td colspan="3">Caso você não tenha um RG, use o do seu Responsável.</td>
    </tr>
    <tr>
		<td>Nome para Crachá:*</td>
        <td><input type="text" size="20" maxlength="60" name="nomecracha"></td>
        <td></td>
	</tr>
    <tr>
		<td>Idade:*
        <select name="selectidade">
        <?php 
		$alpha=10;
		
		while($alpha<81)
		{ 
		?>
        	<option><?php echo $alpha; ?></option>      
        <?php 
			$alpha=$alpha+1;
		}
		?>
        </select>
        </td>
        <td>Data de Nascimento:*<input type="text" size="2" maxlength="2" name="dianasc">/<input type="text" size="2" maxlength="2" name="mesnasc">/<input type="text" size="4" maxlength="4" name="anonasc"></td>
        <td>Sexo:* F<input type="radio" value="Feminino" name="radiosexo" checked> M<input type="radio" value="Masculino" name="radiosexo"></td>
	</tr>
    <tr>
		<td>Telefone Residêncial:*</td>
        <td>(<input type="text" size="2" maxlength="2" name="codtelefone">)<input type="text" size="8" maxlength="8" name="telefoneresd"></td>
        <td></td>
	</tr>
    <tr>
		<td>Telefone Celular:</td>
        <td>(<input type="text" size="2" maxlength="2" name="codcelular">)<input type="text" size="8" maxlength="8" name="telefonecelular"></td>
        <td></td>
	</tr>
    <tr>
		<td>E-Mail:*</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="email"></td>
	</tr>
    <tr>
		<td>Endereço:*</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="endereco"></td>
	</tr>
    <tr>
		<td>Cidade:*</td>
        <td><input type="text" size="20" maxlength="255" name="cidade"></td>
        <td>Estado:*
        <select name="estado">
        <option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CE</option>
		<option value="DF">DF</option>
		<option value="ES">ES</option>
		<option value="GO">GO</option>
		<option value="MA">MA</option>
		<option value="MT">MT</option>
		<option value="MS">MS</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RR">RR</option>
		<option value="RO">RO</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="SC">SC</option>
		<option value="SP" selected>SP</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
        </select>
        </td>
	</tr>
    <tr>
    	<td>Alguma Medicação:*</td>
        <td colspan="2">Sim<input type="radio" name="medicacao" value="Sim"> Não<input type="radio" name="medicacao" value="Não" checked></td>
    </tr>
    <tr>
    	<td>Qual?</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="qualmed"></td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center"> Menor de Idade, Informe abaixo os dados dos seus Responsáveis</td>
    </tr>
    <tr>
		<td>Nome Completo:</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="nomecompresp"></td>
	</tr>
    <tr>
		<td>RG:</td>
        <td colspan="2"><input type="text" size="2" maxlength="2" name="rg1a">.<input type="text" size="3" maxlength="3" name="rg2a">.
        <input type="text" size="3" maxlength="3" name="rg3a">-<input type="text" size="1" maxlength="1" name="rg4a"></td>
	</tr>
    <tr>
    	<td colspan="3">Digite Novamente, Mesmo em Caso de Já ter Utilizado Acima.</td>
    </tr>
    <tr>
    	<td>Telefone:</td>
         <td>(<input type="text" size="2" maxlength="2" name="codtelefoneresp">)<input type="text" size="8" maxlength="8" name="telefoneresp"></td>
        <td></td>
    </tr>
    <tr>
    	<td>Grau de Parentesco:</td>
        <td>Pai/Mãe<input type="radio" name="parentesco" value="Pai/Mãe"> Outro<input type="radio" name="parentesco" value="0"> (caso de outro, especificar)</td>
        <td><input type="text" size="20" maxlength="255" name="grauoutro"></td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center"> Movimento Espírita (Participação)</td>
    </tr>
    <tr>
    	<td colspan="3">Participa de Alguma Mocidade Espírita:* Sim<input type="radio" name="mocidade" value="Sim"> Não<input type="radio" name="mocidade" value="Não" checked></td>
    </tr>
    <tr>
    	<td>Nome da Casa:</td>
        <td colspan="2"><input type="text" size="80" maxlength="255" name="casaespirita"></td>
    </tr>
    <tr>
    	<td colspan="3">Participação na Mocidade Espírita (ME):</td>
    </tr>
    <tr>
    	<td colspan="3">
        Aluno<input type="radio" name="mocidadepart" value="Aluno"> Dirigente<input type="radio" name="mocidadepart" value="Dirigente">
        Convidado<input type="radio" name="mocidadepart" value="Convidado"> Outro<input type="radio" name="mocidadepart" value="Outro"> 
        (caso de outro, especificar)&nbsp; <input type="text" size="20" maxlength="255" name="outromocidade">
        </td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center"> Pesquisa</td>
    </tr>
    <tr>
        <td colspan="3">Como ficou sabendo do Folia de Luz ? <input type="text" size="60" maxlength="255" name="pesquisa"></td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center"> Regras e Termos de Responsabilidade</td>
    </tr>
    <tr>
        <td colspan="3">
        <textarea cols="80" rows="8" readonly>
Evitaremos transtornos desnecessários se todos respeitarem as regras básicas:
-----------------------------------------------------------------------------

1°: Não será permitido "ficar" e namorar durante o encontro;

2°: Não será permitido o uso de qualquer tipo de produto fumígero (cigarro, charuto, etc) ou drogas de qualquer natureza no recinto do evento;

3°: Não será permitido bebida alcoólica;

4°: Não será permitido o uso de equipamentos eletrônicos durante as atividades e plenário (mp3, iPod, celulares...);

5°: Não será permitido porte de armas de qualquer espécie;

6°: Respeitar horários (acordar, dormir, refeições...);

7°: Comunicar a organização qualquer problema de saúde durante o encontro;

8°: Os participantes não poderão sair/voltar do encontro sem autorização da organização do evento;

9°: O evento será no verão, mas as roupas devem estar de acordo com o ambiente religioso e fraterno (não usar shorts, mini-blusas, roupas transparentes, decotadas, etc).

10°: Sempre vale ressaltar que se trata de um EVENTO RELIGIOSO, portanto bom senso com as palavras, gestos, vestuário, respeitando o ambiente e o colega.

11°: Pedimos a colaboração de todos os participantes para juntos mantermos um ambiente agradável e fraterno, pois o encontro é de amigos e afins, e os que não estiverem com esse propósito não estarão no local adequado.

Em Caso de Violação Grave das Regras, o Responsavel poderá ser chamado ao local. (em caso de menores de idade)

Maiores de Idade, poderão ser convidados a se retirar do evento.
    </textarea>
    <br> <input type="checkbox" name="aceito" value="Sim"> Aceito Todas as Regras do Evento e comprometo-me a segui-las.
    </td>
    </tr>
    <tr>
        <td colspan="3">
        <textarea cols="80" rows="8" readonly>
Termos de uso de Imagem:
-----------------------------------------------------------------------------
De Acordo com o Código Civil - CC - L-010.406-2002 
Dos Direitos da personalidade.

Os direitos fundamentais garantidos pela Constituição da República Federativa do Brasil a todos os cidadãos, tratam também do direito à imagem, sendo a mesma de extrema importância para a reputação da pessoa ou de seus herdeiros, cônjuges ou membros de sua família. A privacidade do ser humano é um bem que, se for de alguma maneira atingida, deve ser indenizado a fim de reparar os danos causados por essa invasão. No desenvolvimento deste artigo, sintetizamos os tópicos mais relevantes, que tratam desde a introdução, passando pela indenização, dano moral e patrimonial e pela fixação do “quantum debeatur”, visando um esclarecimento detalhado sobre o assunto.

Os conceitos do assunto abordado pelos doutrinadores Maria Helena Diniz, Sílvio Rodrigues e Sílvio de Salvo Venosa não se diferem em geral, uma vez que o direito da personalidade, no que trata de “direito a imagem”, classifica o mesmo como inalienável, intransmissível, imprescritível e irrenunciável, conforme descreve o art. 11 do Código Civil:

“Art. 11. Com exceção dos casos previstos em lei, os direitos da personalidade são intransmissíveis e irrenunciáveis, não podendo seu exercício sofrer limitação voluntária.”

Nenhuma pessoa deseja ver sua imagem ou seu nome exposto em público ou comercializado sem o seu consenso, causando algum dano a sua própria reputação, através de qualquer meio tecnológico. Incluído no Código Civil de 2002, esse direito pode ser visto como a obrigação que todos têm de respeitar a imagem física e moral de outrem, preservando seu aspecto físico, assim dispondo:

“Art. 20. Salvo se autorizadas, ou se necessárias à administração da justiça ou à manutenção da ordem pública, a divulgação de escritos, a transmissão de palavra, ou a publicação, a exposição ou a utilização da imagem de uma pessoa poderão ser proibidas, a seu requerimento e sem prejuízo da indenização que couber, se lhe atingirem a honra, a boa fama ou a respeitabilidade, ou se se destinarem a fins comerciais.”

A Constituição Federal, ao tratar dos direitos fundamentais nos quais se colocam a proteção a personalidade, em três oportunidades menciona a tutela à direito a própria imagem, o fazendo em seu artigo 5º, X E XVII, dentro do contexto de proteção a ofensas de índole moral, referindo-se também a inviolabilidade da intimidade da vida privada.

-----------------------------------------------------------------------------
Por Meio desta Declaração, Você poderá dar o Direito a Associação Espírita Folia de Luz, de Utilizar sua Imagem (Fotos, Vídeos e etc) em seu Website, em Divulgações do Evento Espírita Folia de Luz, em Blogs e Páginas Sociais e outros Meios de Divulgação do Evento.

A Autorização é Gratuita, não dando o Direito a Processos ou a Mal Entendidos dos Acrodos aqui Propostos.

Peço que todos pensem que essas imagens são de âmbito apenas publicitário ou para recordações da Associação e do evento Folia de Luz, não sendo ultizada em nenhuma publicação ou divulgação Comercial.
    </textarea>
    <br> <input type="checkbox" name="aceito2" value="Sim"> Aceito que minha imagem seja utilizada pela Associação Espírita Folia de Luz
    </td>
    </tr>
    <tr>
    	<td colspan="5" height="1" bgcolor="#CCCCCC" align="center"></td>
    </tr>
    <tr>
    	<td colspan="3"><input type="submit" name="enviar" value="Enviar a Ficha"> <input type="reset" name="reset" value="Limpar todos os Campos"></td>
    </tr>
    <tr>
    	<td colspan="3"><p>Aviso sobre a <b>Taxa</b><br>
    	  1) 01 litro de leite (longa vida) <br>
    	  2) 01 caneca de plástico (será usada durante o evento e doada para a  escola)<br>
    	  3) 01 pacote de bolacha (doce/salgada)</p>
    	  <ul>
    	    <li>Pedimos a colaboração de todos os participantes para  juntos mantermos um ambiente agradável e fraterno, pois o encontro é de amigos  e afins, e os que não estiverem com esse propósito não estarão no local  adequado.</li>
    	    <li>Não será permitida a saída do local do evento sem <u>autorização</u> da <u>organização</u> e do <u>responsável legal</u> do participante quando for <u>Menor</u> (18 anos).</li>
  	    </ul>
    	  <p align="right"><strong><em>&ldquo;Tudo  me é permitido, porém nem tudo me convém.&rdquo; (Paulo de Tarso)</em></strong><strong> </strong></p>
<p>&nbsp;</p></td>
    </tr>
</table>
</form>
<br><br>
<?php }else{ ?>

<h1>Inscrições Encerradas</h1>

<?php } ?>
</center>				
		  </div> 		  <div id="featured">
			<ul>
						<li><a href="camiseta.html"><img src="images/shirt-branca.jpg" alt="shirt" width="142" height="174" /></a>Camiseta</li>
						<li><a href="images/cartaz2014.jpg" target="_blank"><img src="images/cartaz.jpg" alt="shirt" width="141" height="174" /></a>Cartaz</li>
						<li><a href="inscr.php"><img src="images/ficha-inscr.jpg" alt="shirt" width="141" height="174" /></a>Ficha de Inscrição</li>
                        <li><a href="lista.html"><img src="images/lista-esq.jpg" alt="shirt" width="141" height="174" /></a>Não Esquecer de Levar...</li>
						<li class="last"><a href="doacao.html"><img src="images/doacao.jpg" alt="shirt" width="141" height="174" /></a>Programação Especial</li>
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
				    Contato: foliadeluz@gmail.com<br>
				  Tels: Myrna (12)99791-4331 / Amanda: (12) 99632-0552  / Fernanda (11)98154-5250</p>
				</div>
				<div class="navigation">
					<a href="principal.html">Home</a>|
					<a href="about.html">Associação</a>|
					<a href="evento.html">O Evento</a>|
					<a href="inscr.php">Inscrições</a>|
					<a href="contato.html">Contato</a>
				</div>
			</div> <!-- /#footer -->
		</div> <!-- /#page -->
	</div> <!-- /#background -->
</body>
</html>