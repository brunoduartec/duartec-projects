<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="PermissoesEditar.aspx.cs" Inherits="ASPApoio.Apoio.PermissoesEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td colspan="3" class="titulo001">Editar Permissão</td>
        </tr>
        <tr>
            <td class="titulo002" width="20%">
                Permissão</td>
            <td class="titulo002" width="70%">
                descrição</td>
            <td class="titulo002" width="10%">
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:TextBox ID="txtPermissao" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtDescricao" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="btSalvar" runat="server" Text="SALVAR" Height="23px" 
                    Width="100%" onclick="btSalvar_Click"/>
            </td>
        </tr>
    </table>
</asp:Content>
