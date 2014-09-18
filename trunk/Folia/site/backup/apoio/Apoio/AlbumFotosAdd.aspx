<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="AlbumFotosAdd.aspx.cs" Inherits="ASPApoio.Apoio.AlbumFotosAdd" %>
<%@ Register src="Controles/UploadAlbumFotos.ascx" tagname="UploadAlbumFotos" tagprefix="uc1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
<script type="text/javascript" src="Comum/js/modalWindow.js"></script>
<script type="text/javascript">
    function apagarFoto(id) {
        if(confirm("Confirma a exclusão da foto?\nEsta foto não poderá ser mais recuperada no servidor.")){
            window.location = ("AlbumFotosApagar.aspx?id=" + id);
        }
    }
</script>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:UpdatePanel ID="UpdatePanelFotos" runat="server">
        <ContentTemplate>
            <div class="titulo001">Adicionar fotos de álbum</div>
            <div class="titulo002"><asp:Label ID="lbTitulo" runat="server"></asp:Label></div>
            <uc1:UploadAlbumFotos ID="UploadAlbumFotos" runat="server" />
            <br />
            <div class="titulo001">FOTOS ADICIONADAS</div>
            <table cellpadding="0" cellspacing="0" class="borda001" width="100%">
                <tr>
                    <td><asp:Label ID="lbFotos" runat="server"></asp:Label>
                        <br />
                    </td>
                </tr>
            </table>
            <br />
            <asp:Button ID="btApagarSelecionados" runat="server" Text="APAGAR SELECIONADOS" Height="30" Width="100%" onclick="btApagarSelecionados_Click" />
        </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>
