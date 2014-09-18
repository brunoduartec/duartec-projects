<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="PermissoesAdd.aspx.cs" Inherits="ASPApoio.Apoio.PermissoesAdd" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td colspan="3" class="titulo001">Adicionar Permissão</td>
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
                <asp:Button ID="btAdd" runat="server" Text="ADICIONAR" Height="23px" 
                    Width="100%" onclick="btAdd_Click"/>
            </td>
        </tr>
    </table>
    <br />

    <asp:ObjectDataSource ID="odsPermissoes" runat="server" 
        SelectMethod="GetDataTable" 
        TypeName="ASPApoio.Apoio.BLL.PermissaoBLL" 
        OldValuesParameterFormatString="original_{0}">
        <SelectParameters>
            <asp:Parameter DbType="Guid" Name="PermissaoID" />
        </SelectParameters>
    </asp:ObjectDataSource>

    <div class="titulo001">Permissões Adicionadas</div>
    <asp:GridView ID="PermissoesGridView" runat="server" SkinID="Professional" 
        AllowPaging="True" DataSourceID="odsPermissoes" 
        AllowSorting="True" AutoGenerateColumns="False" DataKeyNames="permissaoid"
        OnRowCommand="AtualizandoGrid">
        <Columns>
            <asp:BoundField DataField="permissaonome" HeaderText="Permissão" 
                SortExpression="permissaonome" >
            <ItemStyle Width="20%" />
            </asp:BoundField>
            <asp:BoundField DataField="descricao" HeaderText="Descrição" SortExpression="descricao" />
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="EDITAR" Text="EDITAR" CommandArgument='<%# Eval("permissaoid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="APAGAR" Text="APAGAR" CommandArgument='<%# Eval("permissaoid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
        </Columns>
        <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
        </EmptyDataTemplate>
    </asp:GridView>
</asp:Content>
