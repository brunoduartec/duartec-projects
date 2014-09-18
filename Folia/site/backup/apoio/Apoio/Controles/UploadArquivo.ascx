<%@ Control Language="C#" AutoEventWireup="true" CodeBehind="UploadArquivo.ascx.cs" Inherits="ASPApoio.Apoio.Controles.UploadArquivo" %>
<%@ Register assembly="CuteWebUI.AjaxUploader" namespace="CuteWebUI" tagprefix="cc1" %>
<asp:UpdatePanel ID="UpdatePanelUpload" runat="server">
    <ContentTemplate>
        <asp:Label ID="lbArquivo" runat="server" Visible="false"></asp:Label>
        <asp:Panel ID="pnUploader" runat="server">
            <cc1:Uploader ID="Uploader" runat="server" TempDirectory="~/userfiles/upload/_temp" OnFileUploaded="SalvarArquivo" CancelText="Cancelar">
            <InsertButtonStyle Height="28px" Width="100%" />
            </cc1:Uploader>
        </asp:Panel>
        <asp:Panel ID="pnArquivo" runat="server">
            <asp:HyperLink ID="linkArquivo" runat="server" Target="_blank">[linkArquivo]</asp:HyperLink>
            &nbsp; - &nbsp;
            <asp:LinkButton ID="btApagar" runat="server" onclick="btApagar_Click1" 
                ValidationGroup="delUpload">APAGAR</asp:LinkButton>
        </asp:Panel>
    </ContentTemplate>
</asp:UpdatePanel>
