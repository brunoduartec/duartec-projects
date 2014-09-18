<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="ArtigosCategoriasEditar.aspx.cs" Inherits="ASPApoio.Apoio.ArtigosCategoriasEditar" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="3" cellspacing="1" class="borda001" width="100%">
        <tr>
            <td colspan="10" class="titulo001">Editar Categoria</td>
        </tr>
        <tr>
            <td class="titulo002" width="35%">Seção
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="txtSecaoID" Display="Dynamic" 
                    ErrorMessage="Obrigatório" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
            <td class="titulo002">Categoria
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtCategoriaNome" Display="Dynamic" 
                    ErrorMessage="Obrigatório" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
            <td class="titulo002" width="1%">ORDEM</td>
            <td class="titulo002" width="1%"><center>AT</center></td>
            <td class="titulo002" width="1%"><center>AB</center></td>
            <td class="titulo002" width="1%"><center>DE</center></td>
            <td class="titulo002" width="1%"><center>MA</center></td>
            <td class="titulo002" width="1%"><center>ME</center></td>
            <td class="titulo002" width="1%"><center>BO</center></td>
            <td class="titulo002" width="20%">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:DropDownList ID="txtSecaoID" runat="server" ValidationGroup="SALVAR">
                </asp:DropDownList>
            </td>
            <td>
                <asp:TextBox ID="txtCategoriaNome" runat="server" ValidationGroup="SALVAR"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtOrdem" runat="server" ValidationGroup="SALVAR"></asp:TextBox>
            </td>
            <td>
                <asp:CheckBox ID="txtAtivo" runat="server" />
            </td>
            <td>
                <asp:CheckBox ID="txtAlbum" runat="server" />
            </td>
            <td>
                <asp:CheckBox ID="txtApaga" runat="server" />
            </td>
            <td>
                <asp:CheckBox ID="txtMais" runat="server" />
            </td>
            <td>
                <asp:CheckBox ID="txtMenu" runat="server" />
            </td>
            <td>
                <asp:CheckBox ID="txtBoletim" runat="server" />
            </td>
            <td>
                <asp:Button ID="btSalvar" runat="server" Height="23px" Text="Salvar" 
                    Width="100%" ValidationGroup="SALVAR" onclick="btSalvar_Click" />
            </td>
        </tr>
    </table>
    <div>AT - Ativo | AB - ÁLBUM | DE - Deleta | MA - Mais | ME - Menu | BO - Boletim</div>

</asp:Content>
