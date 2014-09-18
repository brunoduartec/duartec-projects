<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="UsuariosAdd.aspx.cs" Inherits="ASPApoio.Apoio.UsuarioAdd" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:UpdatePanel ID="UpdatePanel" runat="server">
        <ContentTemplate>
            <table width="100%" cellpadding="1" cellspacing="1" class="borda001">
                <tr>
                    <td width="25%" colspan="2" class="titulo001">
                        Novo usuário</td>
                </tr>
                <tr>
                    <td class="titulo002" width="25%">
                        Ativo:&nbsp; </td>
                    <td width="75%">
                        <asp:CheckBox ID="txtAtivo" runat="server" Checked="True" 
                            Text="Sim (para ativo)" />
                    </td>
                </tr>
                <tr>
                    <td class="titulo002">
                        <asp:Label ID="txtv" runat="server" ForeColor="Red" Text="*"></asp:Label>
                        Nome:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                            ControlToValidate="txtUsuarioNome" ErrorMessage="Campo inválido." 
                            Display="Dynamic"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="txtUsuarioNome" runat="server" MaxLength="50"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="titulo002">
                        <asp:Label ID="txtv5" runat="server" ForeColor="Red" Text="*"></asp:Label>
                        E-mail:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                            ControlToValidate="txtUsuarioEmail" ErrorMessage="Campo inválido." 
                            Display="Dynamic"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="txtUsuarioEmail" runat="server" MaxLength="100"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="titulo002">
                        <asp:Label ID="txtv3" runat="server" ForeColor="Red" Text="*"></asp:Label>
                        Usuário:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                            ControlToValidate="txtUsuarioUser" ErrorMessage="Campo inválido." 
                            Display="Dynamic"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="txtUsuarioUser" runat="server" MaxLength="20"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="titulo002">
                        <asp:Label ID="txtv4" runat="server" ForeColor="Red" Text="*"></asp:Label>
                        Senha:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                            ControlToValidate="txtUsuarioSenha" ErrorMessage="Campo inválido." 
                            Display="Dynamic"></asp:RequiredFieldValidator>
                    </td>
                    <td>
                        <asp:TextBox ID="txtUsuarioSenha" runat="server" MaxLength="20" 
                            TextMode="Password"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td class="titulo002" valign="top">
                        Permissões:&nbsp; </td>
                    <td>
                        <asp:CheckBoxList ID="txtPermissoes" runat="server">
                        </asp:CheckBoxList>
                    </td>
                </tr>
                <tr>
                    <td class="titulo002" valign="top">
                        &nbsp;</td>
                    <td>
                        <asp:Button ID="bt_novo" runat="server" Height="28px" Text="ADICIONAR" 
                            Width="100%" onclick="bt_novo_Click" />
                    </td>
                </tr>
            </table>
        </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>
