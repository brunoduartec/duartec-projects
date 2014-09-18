<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="EmailCategoriasEditar.aspx.cs" Inherits="ASPApoio.Apoio.EmailCategoriasEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td colspan="2" class="titulo001">Editar Categoria de usuários de e-mails.</td>
        </tr>
        <tr>
            <td class="titulo002" width="80%">
                Categoria</td>
            <td class="titulo002">
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:TextBox ID="txtEmailCategoria" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="btSalvar" runat="server" Text="Salvar" Height="23px" 
                    Width="100%" onclick="btSalvar_Click"/>
            </td>
        </tr>
    </table>
</asp:Content>
