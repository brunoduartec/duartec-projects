<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="Usuarios.aspx.cs" Inherits="ASPApoio.Apoio.Usuarios" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:Button ID="btNovo" runat="server" Text="NOVO USUÁRIO" Height="30px" 
        Width="120px" onclick="btNovo_Click" />
    <br />
    <br />
    <asp:ObjectDataSource ID="odsUsuarios" runat="server" 
        SelectMethod="GetDataTable" TypeName="ASPApoio.Apoio.BLL.UsuarioBLL">
        <SelectParameters>
            <asp:Parameter DbType="Guid" Name="UsuarioID" />
        </SelectParameters>
    </asp:ObjectDataSource>
    <table cellpadding="1" cellspacing="1" class="borda001" width="100%">
    <tr>
    <td class="titulo002" width="327px">Pesquisar usuário:&nbsp; </td>
    <td width="25%">
        <asp:TextBox ID="txtFiltro" runat="server"></asp:TextBox>
        </td>
    <td>
        <asp:Button ID="btFiltrar" runat="server" Text="PESQUISAR" Height="23px" />
        </td>
    </tr>
    </table>
    <asp:GridView ID="GridViewUsuarios" runat="server" SkinID="Professional" 
        AllowPaging="True" AllowSorting="True" AutoGenerateColumns="False" 
        DataKeyNames="usuarioid" PageSize="25" DataSourceID="odsUsuarios" OnRowCommand="AtualizandoGrid">
        <Columns>
            <asp:CheckBoxField DataField="ativo" HeaderText="<center>A</center>" 
                SortExpression="ativo" HeaderStyle-HorizontalAlign="Center">
                <HeaderStyle HorizontalAlign="Center"></HeaderStyle>
                <ItemStyle Width="1%" HorizontalAlign="Center" />
                </asp:CheckBoxField>
                <asp:BoundField DataField="nome" HeaderText="Nome" SortExpression="nome">
                <ItemStyle Width="300px" />
                </asp:BoundField>
                <asp:BoundField DataField="user" HeaderText="Usuário" SortExpression="user"></asp:BoundField>
                <asp:BoundField DataField="ultimoacesso" HeaderText="ÚLTIMO ACESSO" SortExpression="ultimoacesso">
                <ItemStyle Width="140px" />
            </asp:BoundField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="CATEGORIAS" Text="CATEGORIAS PERMITIDAS" CommandArgument='<%# Eval("usuarioid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="EDITAR" Text="EDITAR" CommandArgument='<%# Eval("usuarioid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
        </Columns>
        <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
        </EmptyDataTemplate>
    </asp:GridView>
</asp:Content>
