<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="ArtigosSecoes.aspx.cs" Inherits="ASPApoio.Apoio.ArtigosSecoes" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="1" cellspacing="1" width="100%" class="borda001">
        <tr>
            <td class="titulo001">&nbsp;</td>
            <td colspan="3" class="titulo001">Adicionar Seção</td>
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
                <asp:Button ID="btAdd" runat="server" Text="ADICIONAR" Height="23px" 
                    Width="100%" onclick="btAdd_Click" />
            </td>
        </tr>
    </table>
    <div>ME - Menu</div>
    <br />
    <asp:ObjectDataSource ID="odsSecoes" runat="server" 
        SelectMethod="GetDataTable" 
        TypeName="ASPApoio.Apoio.BLL.ArtigoSecoeBLL">
        <SelectParameters>
            <asp:Parameter Name="secaoid" Type="String" DefaultValue="" />
        </SelectParameters>
    </asp:ObjectDataSource>

    <div class="titulo001">Seções Adicionadas</div>
    <asp:GridView ID="SecoesGridView" runat="server" SkinID="Professional" 
        AllowPaging="True" DataSourceID="odsSecoes" 
        AllowSorting="True" AutoGenerateColumns="False" DataKeyNames="secaoid"
        OnRowCommand="AtualizandoGrid">
        <Columns>
            <asp:CheckBoxField DataField="menu" HeaderText="ME" SortExpression="menu">
            <ItemStyle Width="1%" />
            </asp:CheckBoxField>
            <asp:BoundField DataField="secaonome" HeaderText="Nome" 
                SortExpression="secaonome" />
            <asp:BoundField DataField="ordem" HeaderText="Ordem" SortExpression="ordem">
            <ItemStyle Width="10%" Wrap="True" />
            </asp:BoundField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="EDITAR" Text="EDITAR" CommandArgument='<%# Eval("secaoid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="APAGAR" Text="APAGAR" CommandArgument='<%# Eval("secaoid") %>'></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
        </Columns>
        <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
        </EmptyDataTemplate>
    </asp:GridView>

</asp:Content>
