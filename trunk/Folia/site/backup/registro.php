<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Folia de Luz</title>
<link rel="stylesheet" type="text/css" href="./css.css" />
</head>

<body>

<ul id="nav">
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
	<li><a href="index.php">Home</a></li>
	<li><a>A Associação Folia de Luz</a>
    <ul>
			<li><a href="historia.html">Nossa História</a></li>
			<li><a href="trabalho.html">Trabalho Voluntário</a></li>
			<li><a href="patro.html">Patrocínio / Apoio</a></li>
			<li><a href="food.html">Alimentação / Doações</a></li>
	</ul>
    </li>
	<li><a>O Evento Folia de Luz</a>
    <ul>
			<li><a href="regras.php">Regras</a></li>
			<li><a href="avisos.php">Avisos</a></li>
			<li><a href="programacao.php">Programação</a></li>
			<li><a href="info.php">Informações</a></li>
            <li><a>Edições Anteriores</a>
            <ul>
            	<li><a href="fotos.php">Fotos</a></li>
                <li><a href="videos.php">Videos</a></li>
                <li><a href="temas.php">Temas</a></li>
            </ul>
            </li>
            <li><a href="camisas.php">Camisetas</a></li>
	</ul>
    </li>
    <li class="current"><a href="registro.php">Inscrições</a></li>
    <li><a href="contato.html">Contato</a></li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>
<br><br>
<div class="maincontent">
<center>
<?php 
$abacate = 2;
if($abacate == 3)
{ ?>
<h1>Inscrições para o Folia de Luz 2012 !</h1><hr color="#CCCCCC" size="1">
<font size="-3">(*) Campos Obrigatórios</font><br>
<form name="form" method="post" action="./sistema/controle.php">
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
        <td colspan="2">Sim<input type="radio" name="medicacao" value="1"> Não<input type="radio" name="medicacao" value="0" checked></td>
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
    	<td colspan="3">Participa de Alguma Mocidade Espírita:* Sim<input type="radio" name="mocidade" value="1"> Não<input type="radio" name="mocidade" value="0" checked></td>
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
        Aluno<input type="radio" name="mocidadepart" value="1"> Dirigente<input type="radio" name="mocidadepart" value="2">
        Convidado<input type="radio" name="mocidadepart" value="3"> Outro<input type="radio" name="mocidadepart" value="4"> 
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
    <br> <input type="checkbox" name="aceito" value="1"> Aceito Todas as Regras do Evento e comprometo-me a segui-las.
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
    <br> <input type="checkbox" name="aceito2" value="1"> Aceito que minha imagem seja utilizada pela Associação Espírita Folia de Luz
    </td>
    </tr>
    <tr>
    	<td colspan="3" bgcolor="#CCCCCC" align="center">&nbsp; </td>
    </tr>
    <tr>
    	<td colspan="3"><input type="submit" name="enviar" value="Enviar a Ficha"> <input type="reset" name="reset" value="Limpar todos os Campos"></td>
    </tr>
    <tr>
    	<td colspan="3">Aviso sobre a <b>Taxa</b><br>
1) 01 Litro de Leite Longa Vida (consumo durante o evento – será recolhido na recepção)<br>
2) 01 Bolacha Doce e Salgada (consumo durante o evento – será recolhido na recepção)<br>
3) 01 Livro INFANTIL</td>
    </tr>
</table>
</form>
<br><br>
<?php }else{ ?>

<h1>Inscrições Encerradas</h1>

<?php } ?>
</center>
</div>
<center><h4>Desenvolvido por Pedro Nicodemos - www.kokorostudios.com.br - 2011/2012</h4></center>
</body>
</html>
