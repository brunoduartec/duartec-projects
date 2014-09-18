<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="ArtigosSecoesEditar.aspx.cs" Inherits="ASPApoio.Apoio.ArtigosSecoesEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td class="titulo001">&nbsp;</td>
            <td colspan="3" class="titulo001">Editar Seção</td>
        </tr>
        <tr>
            <td class="titulo002" width="1%">
                ME</td>
            <td class="titulo002" width="70%">
                Seção</td>
            <td class="titulo002" width="10%">
                Ordem</td>
            <td class="titulo002" width="20%">
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:CheckBox ID="txtMenu" runat="server" />
            </td>
            <td>
                <asp:TextBox ID="txtSecao" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtOrdem" runat="server" MaxLength="3"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="btSalvar" runat="server" Text="SALVAR" Height="23px" 
                    Width="100%" onclick="btSalvar_Click" />
            </td>
        </tr>
    </table>
</asp:Content>
