<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="EmailImportar.aspx.cs" Inherits="ASPApoio.Apoio.EmailImportar" %>
<%@ Register assembly="CuteWebUI.AjaxUploader" namespace="CuteWebUI" tagprefix="cc1" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <table class="borda001" width="100%" cellpadding="1" cellspacing="1">
        <tr>
            <td class="titulo001" colspan="2">Importar Endereços de E-mail</td>
        </tr>
        <tr>
            <td class="titulo002">
                categoria</td>
            <td class="titulo002">
                Selecionar arquivos *.vcf</td>
        </tr>
        <tr>
            <td width="50%">
                <asp:DropDownList ID="txtEmailCategorias" runat="server">
                </asp:DropDownList>
            </td>
            <td valign="top">
            <cc1:Uploader ID="Uploader" runat="server" 
                TempDirectory="~/userfiles/upload/_temp" OnUploadCompleted="SalvarArquivos" 
                CancelText="Cancelar" MultipleFilesUpload="True">
            <InsertButtonStyle Height="28px" Width="100%" />
            </cc1:Uploader>
            </td>
        </tr>
        <tr>
            <td width="50%" colspan="2">
            <font color="red">
                OBS: Primeiro selecione a categoria antes de selecionar os arquivos. Após o 
                término do upload, aguarde o processamento até receber a mensagem &quot;E-mails 
                importados com sucesso&quot;.</font></td>
        </tr>
    </table>
</asp:Content>
