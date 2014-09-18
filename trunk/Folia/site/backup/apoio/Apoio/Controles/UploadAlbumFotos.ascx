<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="UploadAlbumFotos.ascx.cs" Inherits="ASPApoio.Apoio.Controles.UploadAlbumFotos" %>
<%@ Register assembly="CuteWebUI.AjaxUploader" namespace="CuteWebUI" tagprefix="cc1" %>
<asp:UpdatePanel ID="UpdatePanelUpload" runat="server">
    <ContentTemplate>
        <asp:Panel ID="pnUploader" runat="server">
            <cc1:Uploader ID="Uploader" runat="server" 
                TempDirectory="~/userfiles/upload/_temp" OnUploadCompleted="SalvarArquivos" 
                CancelText="Cancelar" MultipleFilesUpload="True">
            <InsertButtonStyle Height="28px" Width="100%" />
            </cc1:Uploader>
        </asp:Panel>
    </ContentTemplate>
</asp:UpdatePanel>
