<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="BoletimContatos.aspx.cs" Inherits="ASPApoio.Apoio.BoletimContatos" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
    </asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table cellpadding="2" cellspacing="1" class="borda001" width="100%">
        <tr>
            <td class="titulo001" colspan="4">Adicionar contato na lista</td>
        </tr>
        <tr>
            <td width="25%" class="titulo002">Categoria
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="txtEmailCategoria" Display="Dynamic" 
                    ErrorMessage="Campo obrigatório" ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            </td>
            <td width="25%" class="titulo002">Nome</td>
            <td width="30%" class="titulo002">Email
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtEmail" Display="Dynamic" ErrorMessage="Campo obrigatório" 
                    ForeColor="Red" ValidationGroup="ADD"></asp:RequiredFieldValidator>
            </td>
            <td width="20%" class="titulo002">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <asp:DropDownList ID="txtEmailCategoria" runat="server">
                </asp:DropDownList>
            </td>
            <td>
                <asp:TextBox ID="txtNome" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:TextBox ID="txtEmail" runat="server"></asp:TextBox>
            </td>
            <td>
                <asp:Button ID="btAdd" runat="server" Text="ADICIOMAR" Width="100%" 
                    onclick="btAdd_Click" Height="23px" ValidationGroup="ADD" />
            </td>
        </tr>
    </table>
    <br />
        <asp:ObjectDataSource ID="ods" runat="server" EnablePaging="True" SelectCountMethod="GetTotalRegistros" 
            SelectMethod="GetDataList" 
        TypeName="ASPApoio.Apoio.BLL.BoletimEmailsBLL">
            <SelectParameters>
                <asp:Parameter Name="startRowIndex" Type="Int32" />
                <asp:Parameter Name="maximumRows" Type="Int32" />
                <asp:ControlParameter ControlID="txtValido" Name="Valido" 
                    PropertyName="Checked" Type="Boolean" />
                <asp:ControlParameter ControlID="txtCategoriaID" DbType="Guid" Name="CategoriaID" PropertyName="SelectedValue" />
                <asp:ControlParameter ControlID="txtFiltroEmail" Name="email" 
                    PropertyName="Text" Type="String" />
                <asp:ControlParameter ControlID="txtFiltroNome" Name="nome" PropertyName="Text" 
                    Type="String" />
            </SelectParameters>
        </asp:ObjectDataSource>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="titulo001">Contatos Adicionados</td>
        </tr>
    </table>
        <table cellpadding="1" cellspacing="1" width="100%"bgcolor="#cccccc" >
            <tr>
                <td width="3%" bgcolor="#ffffff"><center><asp:CheckBox ID="txtValido" runat="server" Checked="True" /></center></td>
                <td width="22%" bgcolor="#ffffff">
                    <asp:DropDownList ID="txtCategoriaID" runat="server" AutoPostBack="True"></asp:DropDownList>
                </td>
                <td width="25%" bgcolor="#ffffff">
                    <asp:TextBox ID="txtFiltroEmail" runat="server" MaxLength="20" Width="98%"></asp:TextBox>
                </td>
                <td width="30%" bgcolor="#ffffff">
                    <asp:TextBox ID="txtFiltroNome" runat="server" MaxLength="20" Width="98%"></asp:TextBox>
                </td>
                <td width="20%" bgcolor="#ffffff">
                    <asp:Button ID="btFiltrar" runat="server" Text="FILTRAR" Width="100%" 
                        Height="23px" onclick="btFiltrar_Click" />
                </td>
            </tr>
    </table>
        <asp:GridView ID="GridView" runat="server" SkinID="Professional" AllowPaging="True" DataSourceID="ods" AutoGenerateColumns="False" PageSize="25" OnRowCommand="AtualizandoGrid">
            <Columns>
                <asp:CheckBoxField DataField="Valido" HeaderText="A" SortExpression="Valido" >
                <HeaderStyle HorizontalAlign="Center" />
                <ItemStyle Width="3%" HorizontalAlign="Center" />
                </asp:CheckBoxField>
                <asp:BoundField DataField="CategoriaNome" HeaderText="Categoria" 
                    ReadOnly="True" SortExpression="CategoriaNome" >
                <ItemStyle Width="22%" />
                </asp:BoundField>
                <asp:BoundField DataField="Email" HeaderText="Email" SortExpression="Email" >
                <ItemStyle Width="25%" />
                </asp:BoundField>
                <asp:BoundField DataField="Nome" HeaderText="Nome" SortExpression="Nome" >
                <ItemStyle Width="30%" />
                </asp:BoundField>
                <asp:TemplateField HeaderText="">
                    <ItemTemplate>
                        <center>
                            <asp:LinkButton ID="LinkButtonEDIT" runat="server" CausesValidation="false" CommandName="EDITAR" CommandArgument='<%# Eval("emailid") %>' Text="EDITAR"></asp:LinkButton>
                        </center>
                    </ItemTemplate>
                    <ItemStyle Width="10%" />
                </asp:TemplateField>
                <asp:TemplateField HeaderText="">
                    <ItemTemplate>
                        <center>
                            <asp:LinkButton ID="LinkButtonDEL" runat="server" CausesValidation="false" CommandName="APAGAR" CommandArgument='<%# Eval("emailid") %>' Text="APAGAR"></asp:LinkButton>
                        </center>
                    </ItemTemplate>
                    <ItemStyle Width="10%" />
                </asp:TemplateField>
            </Columns>
            <EmptyDataTemplate>
            <div>Nenhum registro encontrado.</div>
            </EmptyDataTemplate>
        </asp:GridView>
    </asp:Content>
