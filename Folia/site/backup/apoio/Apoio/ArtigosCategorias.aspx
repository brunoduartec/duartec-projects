<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="ArtigosCategorias.aspx.cs" Inherits="ASPApoio.Apoio.ArtigosCategorias" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="3" cellspacing="1" class="borda001" width="100%">
        <tr>
            <td colspan="10" class="titulo001">Adicionar Categoria</td>
        </tr>
        <tr>
            <td class="titulo002">Seção
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="txtSecaoID" Display="Dynamic" 
                    ErrorMessage="Obrigatório" ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            &nbsp;</td>
            <td class="titulo002" width="40%">Categoria
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtCategoriaNome" Display="Dynamic" 
                    ErrorMessage="Obrigatório" ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            </td>
            <td class="titulo002" width="5%">ORDEM</td>
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
                <asp:DropDownList ID="txtSecaoID" runat="server" ValidationGroup="ADD">
                </asp:DropDownList>
            </td>
            <td>
                <asp:TextBox ID="txtCategoriaNome" runat="server" ValidationGroup="ADD"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtOrdem" runat="server" ValidationGroup="ADD" MaxLength="2"></asp:TextBox>
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
                <asp:Button ID="btAdd" runat="server" Height="23px" Text="ADICIONAR" 
                    Width="100%" ValidationGroup="ADD" onclick="btAdd_Click" />
            </td>
        </tr>
    </table>
    <div>AT - Ativo | AB - ÁLBUM | DE - Deleta | MA - Mais | ME - Menu | BO - Boletim</div>
    <br />
    <asp:ObjectDataSource ID="ods" runat="server" 
        SelectMethod="GetDataTable" 
        TypeName="ASPApoio.Apoio.BLL.ArtigoCategoriaBLL">
        <SelectParameters>
            <asp:Parameter DbType="Guid" Name="SecaoID" DefaultValue="" />
            <asp:Parameter DbType="Guid" Name="CategoriaID" DefaultValue="" />
        </SelectParameters>
    </asp:ObjectDataSource>
    <div class="titulo001">Categorias</div>
    <asp:GridView ID="CategoriasGridView" runat="server" SkinID="Professional" 
        AutoGenerateColumns="False" PageSize="25" 
        AllowPaging="True" AllowSorting="True" DataSourceID="ods" OnRowCommand="AtualizandoGrid">
        <Columns>
            <asp:BoundField DataField="secaonome" HeaderText="SEÇÃO" 
                SortExpression="secaonome" ReadOnly="True">
            </asp:BoundField>
            <asp:BoundField DataField="categorianome" HeaderText="CATEGORIA" 
                SortExpression="categorianome" >
            <ItemStyle Width="40%" />
            </asp:BoundField>
            <asp:BoundField DataField="ordem" HeaderText="ORDEM" SortExpression="ordem" >
            <ItemStyle HorizontalAlign="Center" Width="5%" />
            </asp:BoundField>
            <asp:CheckBoxField DataField="ativo" HeaderText="AT" SortExpression="ativo">
            <ItemStyle Width="1%" />
            </asp:CheckBoxField>
            <asp:CheckBoxField DataField="album" HeaderText="AB" SortExpression="album">
            <HeaderStyle HorizontalAlign="Center" Width="1%" />
            </asp:CheckBoxField>
            <asp:CheckBoxField DataField="apaga" HeaderText="DE" SortExpression="apaga">
            <HeaderStyle HorizontalAlign="Center" Width="1%" />
            </asp:CheckBoxField>
            <asp:CheckBoxField DataField="mais" HeaderText="MA" SortExpression="mais">
            <HeaderStyle HorizontalAlign="Center" Width="1%" />
            </asp:CheckBoxField>
            <asp:CheckBoxField DataField="menu" HeaderText="ME" SortExpression="menu">
            <ItemStyle Width="1%" />
            </asp:CheckBoxField>
            <asp:CheckBoxField DataField="boletim" HeaderText="BO" SortExpression="boletim">
            <HeaderStyle HorizontalAlign="Center" Width="1%" />
            </asp:CheckBoxField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton1" runat="server" CausesValidation="false" CommandName="EDITAR" CommandArgument='<%# Eval("categoriaid") %>' Text="EDITAR"></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
            <asp:TemplateField ShowHeader="False">
                <ItemTemplate>
                    <asp:LinkButton ID="LinkButton2" runat="server" CausesValidation="false" CommandName="APAGAR" CommandArgument='<%# Eval("categoriaid") %>' Text="APAGAR"></asp:LinkButton>
                </ItemTemplate>
                <ItemStyle HorizontalAlign="Center" Width="10%" />
            </asp:TemplateField>
        </Columns>
        <EmptyDataTemplate>
        <div>Nenhum registro encontrado.</div>
        </EmptyDataTemplate>
    </asp:GridView>
</asp:Content>
