<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="ArtigoEditar.aspx.cs" Inherits="ASPApoio.Apoio.ArtigoEditar" %>
<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>
<%@ Register src="Controles/UploadArquivo.ascx" tagname="UploadArquivo" tagprefix="uc1" %>
<%@ Register assembly="CuteEditor" namespace="CuteEditor" tagprefix="CE" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td valign="top" colspan="2" class="titulo001">
                Adicionar</td>
        </tr>
        <tr>
        <td valign="top" width="30%">
        <table cellpadding="1" cellspacing="1" width="100%">
            <tr>
                <td class=titulo002>
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td><asp:CheckBox ID="txtativo" runat="server" Checked="true" Text="Publicado" /></td>
                            <td><asp:CheckBox ID="txtdestaque" runat="server" Checked="true" Text="Destaque na home" /></td>
                            <td style="text-align:right"><asp:TextBox ID="txtData" runat="server" Width="70px" MaxLength="10"></asp:TextBox>
                                <asp:CalendarExtender ID="txtData_CalendarExtender" runat="server" TargetControlID="txtData" Format="dd/MM/yyyy">
                                </asp:CalendarExtender>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="titulo002">
                    SEÇÃO 
                    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" 
                        runat="server" ControlToValidate="txtsecao" 
                        ErrorMessage=" - CAMPO INVÁLIDO." Display="Dynamic"></asp:RequiredFieldValidator>
                </td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:DropDownList ID="txtSecao" runat="server" AutoPostBack="True" 
                        onselectedindexchanged="txtSecao_SelectedIndexChanged">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class=titulo002>
                    categoria<asp:RequiredFieldValidator ID="RequiredFieldValidator2" 
                        runat="server" ControlToValidate="txtcategoria" 
                        ErrorMessage=" - CAMPO INVÁLIDO." Display="Dynamic"></asp:RequiredFieldValidator>
                </td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:DropDownList ID="txtcategoria" runat="server">
                    </asp:DropDownList>
                </td>
            </tr>
            <tr>
                <td class="titulo002">
                    Título<asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                        ControlToValidate="txttitulo" ErrorMessage=" - CAMPO INVÁLIDO." 
                        Display="Dynamic"></asp:RequiredFieldValidator>
                </td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:TextBox ID="txttitulo" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="titulo002">
                    Palavras chave</td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:TextBox ID="txtpalavras" runat="server"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="titulo002">
                    Sucinto</td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:TextBox ID="txtSucinto" runat="server" Rows="3" TextMode="MultiLine"></asp:TextBox>
                </td>
            </tr>
            <tr>
                <td class="titulo002">
                    Redirecionar link</td>
            </tr>
            <tr>
                <td bgcolor="#d9d9d9">
                    <asp:TextBox ID="txtLink" runat="server"></asp:TextBox>
                </td>
            </tr>
        </table>
    <table cellpadding="1" cellspacing="1" width="100%">
        <tr>
            <td class="titulo002">
                Foto em destaqueaque</td>
        </tr>
        <tr>
            <td bgcolor="#d9d9d9">
                <uc1:UploadArquivo ID="UploadFoto" runat="server" />
            </td>
        </tr>
        <tr>
            <td class="titulo002">
                Arquivo em destaque</td>
        </tr>
        <tr>
            <td bgcolor="#d9d9d9">
                <uc1:UploadArquivo ID="UploadArquivo" runat="server" />
            </td>
        </tr>
        <tr>
            <td bgcolor="#d9d9d9">
                <asp:Button ID="btSalvar" runat="server" Height="30px" Text="SALVAR" 
                    Width="100%" ForeColor="Red" onclick="btSalvar_Click" />
            </td>
        </tr>
    </table>
</td>
<td valign="top">
    <div class="titulo002">Corpo</div>
    <div>
        <CE:Editor ID="txtCorpo" runat="server" Height="440px" Width="100%" 
            ConfigurationPath="~/Apoio/Comum/CuteEditor/Configuration/AutoConfigure/ASPSol.config" 
            EnableStripIframeTags="False"></CE:Editor>
    </div>
    </td>
</tr>
</table>
</asp:Content>