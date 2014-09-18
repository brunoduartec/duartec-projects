<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="BoletimContatosEditar.aspx.cs" Inherits="ASPApoio.Apoio.BoletimContatosEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="2" cellspacing="1" class="borda001" width="100%">
        <tr>
            <td class="titulo001" colspan="5">Editar contato</td>
        </tr>
        <tr>
            <td width="1%" class="titulo002">A</td>
            <td width="25%" class="titulo002">Categoria
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="txtEmailCategoria" Display="Dynamic" 
                    ErrorMessage="Campo obrigatório" ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            </td>
            <td width="25%" class="titulo002">Nome</td>
            <td width="30%" class="titulo002">Email
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtEmail" Display="Dynamic" ErrorMessage="Campo obrigatório" 
                    ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            </td>
            <td width="20%" class="titulo002">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:CheckBox ID="txtValido" runat="server" />
            </td>
            <td>
                <asp:DropDownList ID="txtEmailCategoria" runat="server">
                </asp:DropDownList>
            </td>
            <td>
                <asp:TextBox ID="txtNome" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtEmail" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="btSalvar" runat="server" Text="Salvar" Width="100%" 
                    Height="23px" ValidationGroup="ADD" onclick="btSalvar_Click" />
            </td>
        </tr>
    </table>
    <font color="red">Inative by <asp:Literal ID="lbErro" runat="server"></asp:Literal></font>
</asp:Content>
