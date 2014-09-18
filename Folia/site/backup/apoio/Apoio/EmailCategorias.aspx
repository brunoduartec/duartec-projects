<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="EmailCategorias.aspx.cs" Inherits="ASPApoio.Apoio.EmailCategorias" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td colspan="2" class="titulo001">Adicionar Categoria de usuários de e-mails.</td>
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
                <asp:Button ID="btAdd" runat="server" Text="ADICIONAR" Height="23px" 
                    Width="100%" onclick="btAdd_Click" />
            </td>
        </tr>
    </table>
    <br />
    <asp:ObjectDataSource ID="odsEmailCategorias" runat="server" 
        SelectMethod="GetDataTable" 
        TypeName="ASPApoio.Apoio.BLL.EmailCategoriasBLL">
        <SelectParameters>
            <asp:Parameter Name="categoriaid" Type="String" DefaultValue="" />
        </SelectParameters>
    </asp:ObjectDataSource>
    <div class="titulo001">Categorias Adicionadas</div>
    <asp:GridView ID="CategoriasGridView" runat="server" SkinID="Professional" 
        AllowPaging="True" DataSourceID="odsEmailCategorias" 
        AllowSorting="True" AutoGenerateColumns="False" DataKeyNames="categoriaid"
        OnRowCommand="AtualizandoGrid" PageSize="50">
        <Columns>
            <asp:BoundField DataField="nome" HeaderText="nome" SortExpression="nome" />
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="EDITAR" Text="EDITAR" CommandArgument='<%# Eval("categoriaid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="APAGAR" Text="APAGAR" CommandArgument='<%# Eval("categoriaid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
        </Columns>
        <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
        </EmptyDataTemplate>
    </asp:GridView>
</asp:Content>
