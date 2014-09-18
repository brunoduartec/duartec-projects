<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="BoletimEnviar.aspx.cs" Inherits="ASPApoio.Apoio.BoletimEnviar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">

    <table width="100%" cellpadding="2" cellspacing="1" class="borda001">
        <tr>
            <td class="titulo001">
                Enviar boletim</td>
        </tr>
        <tr>
            <td>
                <strong>Título: </strong>
                <asp:Label ID="lbArtigoTitulo" runat="server" ForeColor="Red"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Sucinto: </strong>
                <asp:Label ID="lbSucinto" runat="server" ForeColor="Red"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                <strong>Categorias de usuãrios a enviar:</strong></td>
        </tr>
        <tr>
            <td>
                <asp:CheckBoxList ID="txtEmailCategorias" runat="server" RepeatColumns="4" 
                    Width="100%">
                </asp:CheckBoxList>
            </td>
        </tr>
        <tr>
            <td>
                <asp:Button ID="btEnviar" runat="server" Text="ENVIAR PARA OS SELECIONADOS" 
                    Height="30px" onclick="btEnviar_Click" Width="100%" />
            </td>
        </tr>
    </table>

</asp:Content>
