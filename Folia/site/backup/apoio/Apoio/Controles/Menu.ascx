<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="Menu.ascx.cs" Inherits="ASPApoio.Apoio.Controles.Menu" %>
<script type="text/javascript" src="Comum/js/hoverIntent.js"></script>
<script type="text/javascript" src="Comum/js/superfish.js"></script>
<script type="text/javascript">
	jQuery(function () {
		jQuery('ul.sf-menu').superfish();
	});
</script>
<ul class="sf-menu">
    <asp:PlaceHolder ID="pnAdmin" runat="server">
        <li class="current">
			<a href="#a">ADMINISTRAÇÃO</a>
			<ul>
				<li>
					<a href="ArtigosSecoes.aspx">SEÇÕES</a>
				</li>
				<li>
					<a href="ArtigosCategorias.aspx">CATEGORIAS</a>
				</li>
				<li>
					<a href="PermissoesAdd.aspx">PERMISSÕES</a>
				</li>
				<li>
					<a href="Usuarios.aspx">USUÁRIOS</a>
				</li>
			</ul>
		</li>
    </asp:PlaceHolder>

    <asp:PlaceHolder ID="pnArtigos" runat="server">
    <li class="current">
		<a href="Artigos.aspx">ARTIGOS</a>
        <ul>
			<li>
				<a href="ArtigoAdd.aspx">NOVO</a>
			</li>
			<li>
				<a href="Artigos.aspx">ARTIGOS</a>
			</li>
        </ul>
	</li>
    </asp:PlaceHolder>

    <asp:PlaceHolder ID="pnBoletins" runat="server">
        <li class="current">
		    <a href="Boletins.aspx">BOLETINS</a>
		    <ul>
			    <li>
				    <a href="EmailCategorias.aspx">CATEGORIAS</a>
			    </li>
			    <li>
				    <a href="BoletimContatos.aspx">CONTATOS</a>
			    </li>
			    <li>
				    <a href="EmailImportar.aspx">IMPORTAR E-MAILS</a>
			    </li>
			    <li>
				    <a href="Boletins.aspx">BOLETINS ENVIADOS</a>
			    </li>
		    </ul>
	    </li>
    </asp:PlaceHolder>

		<li class="current">
			<a href="Sair.aspx">SAIR</a>
		</li>	
</ul>
