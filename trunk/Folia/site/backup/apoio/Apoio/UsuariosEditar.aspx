<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="UsuariosEditar.aspx.cs" Inherits="ASPApoio.Apoio.UsuariosEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
        <ContentTemplate>
    <table width="100%" cellpadding="1" cellspacing="1" class="borda001">
        <tr>
            <td colspan="3" class="titulo001">
                Editar usuário</td>
        </tr>
        <tr>
            <td class="titulo002" width="30%">
                Ativo:&nbsp; </td>
            <td width="75%" colspan="2">
                <asp:CheckBox ID="txtAtivo" runat="server" Checked="True" 
                    Text="Sim (para ativo)" />
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                <asp:Label ID="txtv" runat="server" ForeColor="Red" Text="*"></asp:Label>
                Nome:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtNome" ErrorMessage="Campo inválido." 
                    Display="Dynamic" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
            <td colspan="2">
                <asp:TextBox ID="txtNome" runat="server" MaxLength="50"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                <asp:Label ID="txtv5" runat="server" ForeColor="Red" Text="*"></asp:Label>
                E-mail:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                    ControlToValidate="txtEmail" ErrorMessage="Campo inválido." 
                    Display="Dynamic" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
            <td colspan="2">
                <asp:TextBox ID="txtEmail" runat="server" MaxLength="100"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                <asp:Label ID="txtv3" runat="server" ForeColor="Red" Text="*"></asp:Label>
                Usuário:&nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ControlToValidate="txtUser" ErrorMessage="Campo inválido." 
                    Display="Dynamic" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
            <td colspan="2">
                <asp:TextBox ID="txtUser" runat="server" MaxLength="20"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="titulo002" valign="top">
                Permissões:&nbsp; </td>
            <td colspan="2">
                <asp:CheckBoxList ID="txtPermissoes" runat="server">
                </asp:CheckBoxList>
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                &nbsp;</td>
            <td>
                <asp:Button ID="bt_salvar" runat="server" Height="30px" Text="SALVAR" 
                    Width="100%" ForeColor="Red" onclick="bt_salvar_Click" />
            </td>
            <td>
                <asp:Button ID="btVoltar" runat="server" Height="30px" Text="VOLTAR" 
                    Width="100%"/>
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                &nbsp;</td>
            <td colspan="2">
                <asp:Button ID="btAbrirPainelSenha" runat="server" Height="30px" 
                    Text="ALTERAR SENHA" ValidationGroup="Nenhum" Width="100%" 
                    ForeColor="Red" onclick="btAbrirPainelSenha_Click" />
                <asp:Panel ID="pnSenha" runat="server" Visible="false">
                    <table width="100%">
                        <tr>
                            <td class="titulo002">
                                Nova senha
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                                    ControlToValidate="txtSenhaNova" Display="Dynamic" 
                                    ErrorMessage="Campo inválido." ValidationGroup="GrupoSenha" 
                                    ForeColor="Red"></asp:RequiredFieldValidator>
                            </td>
                            <td class="titulo002" width="33%">
                                Confirme nova senha
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                                    ControlToValidate="txtSenhaConfirma" Display="Dynamic" 
                                    ErrorMessage="Campo inválido." ValidationGroup="GrupoSenha" 
                                    ForeColor="Red"></asp:RequiredFieldValidator>
                            </td>
                            <td class="titulo002" width="34%">
                                &nbsp;</td>
                        </tr>
                        <tr>
                            <td class="style2">
                                <asp:TextBox ID="txtSenhaNova" runat="server" MaxLength="12" 
                                    TextMode="Password" ValidationGroup="GrupoSenha" width="98%"></asp:TextBox>
                            </td>
                            <td>
                                <asp:TextBox ID="txtSenhaConfirma" runat="server" MaxLength="12" 
                                    TextMode="Password" ValidationGroup="GrupoSenha" width="98%"></asp:TextBox>
                            </td>
                            <td>
                                <asp:Button ID="btSalvarSenha" runat="server" Text="SALVAR SENHA" 
                                    ValidationGroup="GrupoSenha" Width="100%" onclick="btSalvarSenha_Click" />
                            </td>
                        </tr>
                    </table>
                </asp:Panel>
            </td>
        </tr>
        </table>
        </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>
