<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="BoletimDetalhes.aspx.cs" Inherits="ASPApoio.Apoio.BoletimDetalhes" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
    <meta http-equiv="refresh" content="60" />
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <div class="titulo001">Detalhes do boletim</div>
    <table class="borda001" cellpadding="1" cellspacing="2" width="100%">
        <tr>
            <td class="titulo002">
                Título</td>
            <td class="titulo002" width="120px">
                Iniciado</td>
            <td class="titulo002" width="120px">
                Atualizado</td>
            <td class="titulo002" width="120px">
                Finalizado</td>
            <td class="titulo002" width="90px">
                Concluído</td>
        </tr>
        <tr>
            <td bgcolor="#efefef">
                <asp:Label ID="lbTitulo" runat="server"></asp:Label>
            </td>
            <td bgcolor="#efefef">
                <asp:Label ID="lbIniciado" runat="server"></asp:Label>
            </td>
            <td bgcolor="#efefef">
                <asp:Label ID="lbAtualizado" runat="server"></asp:Label>
            </td>
            <td bgcolor="#efefef">
                <asp:Label ID="lbFinalizado" runat="server"></asp:Label>
            </td>
            <td bgcolor="#efefef">
                <asp:Label ID="lbConcluido" runat="server"></asp:Label>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="titulo002">
                Categorias enviadas</td>
        </tr>
        <tr>
            <td colspan="5" bgcolor="#efefef">
                <asp:Label ID="lbCategoria" runat="server"></asp:Label>
            </td>
        </tr>
    </table>
    <br />
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="50%" valign="top">
                <asp:ObjectDataSource ID="obsEnviados" runat="server" 
                    OldValuesParameterFormatString="original_{0}" SelectMethod="GetDataList" 
                    TypeName="ASPApoio.Apoio.BLL.BoletimEnviados" EnablePaging="True" 
                    SelectCountMethod="GetTotalRegistros">
                    <SelectParameters>
                        <asp:Parameter Name="startRowIndex" Type="Int32" />
                        <asp:Parameter Name="maximumRows" Type="Int32" />
                        <asp:QueryStringParameter DbType="Guid" Name="BoletimID" 
                            QueryStringField="id" />
                    </SelectParameters>
                </asp:ObjectDataSource>
                <div class="titulo001">E-mails enviados</div>
                <asp:GridView ID="GridViewEnviados" runat="server" SkinID="Professional" 
                    AllowPaging="True" DataSourceID="obsEnviados" AutoGenerateColumns="False">
                    <Columns>
                        <asp:BoundField DataField="dataenvio" HeaderText="Data" 
                            SortExpression="dataenvio">
                        <ItemStyle Width="120px" />
                        </asp:BoundField>
                        <asp:BoundField DataField="email" HeaderText="E-mail" SortExpression="email" />
                        <asp:CheckBoxField DataField="erroenvio" HeaderText="Erro" 
                            SortExpression="erroenvio">
                        <ItemStyle HorizontalAlign="Center" Width="1%" />
                        </asp:CheckBoxField>
                        <asp:BoundField DataField="erromsg" HeaderText="Erro msg" 
                            SortExpression="erromsg" />
                    </Columns>
                    <EmptyDataTemplate>
                        <div>Nenhum registro encontrado.</div>
                    </EmptyDataTemplate>
                </asp:GridView>
            </td>
            <td width="50%" valign="top">&nbsp;</td>
        </tr>
    </table>

</asp:Content>
