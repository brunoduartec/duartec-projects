<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="Boletins.aspx.cs" Inherits="ASPApoio.Apoio.Boletins" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
    <meta http-equiv="refresh" content="60" />
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <asp:ObjectDataSource ID="obsBoletins" runat="server" SelectMethod="GetDataTable" TypeName="ASPApoio.Apoio.BLL.BoletimBLL">
        <SelectParameters>
            <asp:Parameter DbType="Guid" Name="UsuarioID" />
        </SelectParameters>
    </asp:ObjectDataSource>
    <div class="titulo001">Boletins enviados</div>
    <asp:GridView ID="GridViewEnviados" runat="server" SkinID="Professional" 
    DataSourceID="obsBoletins" AllowPaging="True" AutoGenerateColumns="False" 
        AllowSorting="True"  OnRowCommand="AtualizandoGrid">
        <Columns>
            <asp:BoundField DataField="artigotitulo" HeaderText="Título" 
                SortExpression="artigotitulo" />
            <asp:BoundField DataField="Iniciado" HeaderText="Iniciado" 
                SortExpression="Iniciado" >
            <ItemStyle Width="120px" />
            </asp:BoundField>
            <asp:BoundField DataField="Atualizado" HeaderText="Atualizado" 
                SortExpression="Atualizado" >
            <ItemStyle Width="120px" />
            </asp:BoundField>
            <asp:BoundField DataField="Finalizado" HeaderText="Finalizado" 
                SortExpression="Finalizado" >
            <ItemStyle Width="120px" />
            </asp:BoundField>
            <asp:CheckBoxField DataField="concluido" HeaderText="Concluído" 
                SortExpression="concluido">
            <ItemStyle HorizontalAlign="Center" Width="1%" />
            </asp:CheckBoxField>
            <asp:TemplateField>
                    <ItemTemplate>
                        <asp:LinkButton ID="LinkButtonDetalhes" runat="server" CausesValidation="false" CommandName="DETALHES" CommandArgument='<%# Eval("boletimid") %>' Text="DETALHES"></asp:LinkButton>
                    </ItemTemplate>
                <ItemStyle Width="10%" HorizontalAlign="Center" />
            </asp:TemplateField>
            <asp:TemplateField>
                    <ItemTemplate>
                        <asp:LinkButton ID="LinkButtonApagar" runat="server" CausesValidation="false" CommandName="APAGAR" CommandArgument='<%# Eval("boletimid") %>' Text="APAGAR"></asp:LinkButton>
                    </ItemTemplate>
                <ItemStyle Width="10%" HorizontalAlign="Center" />
            </asp:TemplateField>
        </Columns>
    <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
    </EmptyDataTemplate>
    </asp:GridView>
</asp:Content>
