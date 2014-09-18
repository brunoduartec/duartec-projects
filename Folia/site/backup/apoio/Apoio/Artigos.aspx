<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="Artigos.aspx.cs" Inherits="ASPApoio.Apoio.Artigos" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:UpdatePanel ID="UpdatePanel" runat="server">
        <ContentTemplate>
            <table cellpadding="1" cellspacing="1" class="borda001" width="100%">
                <tr>
                    <td colspan="4" class="titulo001">Filtrar artigos</td>
                </tr>
                <tr>
                    <td class="titulo002">
                        seção</td>
                    <td class="titulo002" width="15%">
                        categoria</td>
                    <td class="titulo002" width="48%">
                        palavra chave</td>
                    <td class="titulo002" width="12%">
                        <asp:Label ID="lbUsuarioID" runat="server"></asp:Label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <asp:DropDownList ID="txtSecao" runat="server" AutoPostBack="True" 
                            onselectedindexchanged="txtSecao_SelectedIndexChanged">
                        </asp:DropDownList>
                    </td>
                    <td>
                        <asp:DropDownList ID="txtCategoria" runat="server" AutoPostBack="True">
                        </asp:DropDownList>
                    </td>
                    <td>
                        <asp:TextBox ID="txtSearch" runat="server"></asp:TextBox>
                    </td>
                    <td>
                        <asp:Button ID="btFiltro" runat="server" Text="FILTRAR" Width="100%" Height="20px" />
                    </td>
                </tr>
            </table>
            <br />
    <asp:ObjectDataSource ID="odsArtigos" runat="server" 
    SelectMethod="GetDataTable" 
    TypeName="ASPApoio.Apoio.BLL.ArtigoBLL" OldValuesParameterFormatString="original_{0}">
        <SelectParameters>
            <asp:Parameter Name="artigoid" DbType="Guid" />
            <asp:ControlParameter ControlID="txtSecao" Name="secaoid" 
                PropertyName="SelectedValue" DbType="Guid" />
            <asp:ControlParameter ControlID="txtCategoria" Name="categoriaid" 
                PropertyName="SelectedValue" DbType="Guid" />
            <asp:Parameter Name="usuarioid" DbType="Guid" />
            <asp:Parameter Name="publicado" Type="Boolean" />
            <asp:Parameter Name="frontpage" Type="Boolean" />
            <asp:Parameter Name="apagado" Type="Boolean" />
            <asp:Parameter Name="toprows" Type="Int32" />
            <asp:ControlParameter ControlID="txtSearch" Name="search" PropertyName="Text" 
                Type="String" />
        </SelectParameters>
        </asp:ObjectDataSource>
        <div class="titulo001">ARTIGOS CADASTRADOS</div>
        <asp:GridView ID="GridViewArtigos" runat="server" SkinID="Professional" 
            AllowPaging="True" AllowSorting="True" DataSourceID="odsArtigos" 
                AutoGenerateColumns="False" PageSize="25" OnRowCommand="AtualizandoGrid">
            <Columns>
                <asp:CheckBoxField DataField="publicado" HeaderText="A" ReadOnly="True" 
                    SortExpression="publicado">
                <ItemStyle Width="1%" />
                </asp:CheckBoxField>
                <asp:CheckBoxField DataField="frontpage" HeaderText="D" 
                    SortExpression="frontpage" >
                <ItemStyle Width="1%" />
                </asp:CheckBoxField>
                <asp:BoundField DataField="data" DataFormatString="{0:d}" HeaderText="DATA" 
                    SortExpression="data">
                <ItemStyle Width="60px" />
                </asp:BoundField>
                <asp:BoundField DataField="secaonome" HeaderText="SEÇÃO" 
                    SortExpression="secaonome" />
                <asp:BoundField DataField="categorianome" HeaderText="CATEGORIA" 
                    SortExpression="categorianome" >
                <ItemStyle Width="15%" />
                </asp:BoundField>
                <asp:BoundField DataField="titulo" HeaderText="TITULO" 
                    SortExpression="titulo" >
                <ItemStyle Width="30%" />
                </asp:BoundField>
                <asp:BoundField DataField="usuarionome" HeaderText="USUÁRIO" SortExpression="usuarionome" >
                <ItemStyle Width="10%" />
                </asp:BoundField>
                <asp:TemplateField>
                    <ItemTemplate>
                        <%# LinksExtras((string)Eval("artigoid").ToString())%>
                    </ItemTemplate>
                    <ItemStyle Width="8%" HorizontalAlign="Center" />
                </asp:TemplateField>
                <asp:TemplateField ShowHeader="False">
                    <ItemTemplate>
                        <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="EDITAR" CommandArgument='<%# Eval("artigoid") %>' Text="EDITAR"></asp:LinkButton>
                    </ItemTemplate>
                    <ItemStyle HorizontalAlign="Center" Width="6%" />
                </asp:TemplateField>
                <asp:TemplateField ShowHeader="False">
                    <ItemTemplate>
                        <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="APAGAR" CommandArgument='<%# Eval("artigoid") %>' Text="APAGAR"></asp:LinkButton>
                    </ItemTemplate>
                    <ItemStyle HorizontalAlign="Center" Width="6%" />
                </asp:TemplateField>
            </Columns>
            <EmptyDataTemplate>
            <div>Nenhum registro encontrado.</div>
            </EmptyDataTemplate>
        </asp:GridView>
            <br />
        </ContentTemplate>
    </asp:UpdatePanel>
</asp:Content>
