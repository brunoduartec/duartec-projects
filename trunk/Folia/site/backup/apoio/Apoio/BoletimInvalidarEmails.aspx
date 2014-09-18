<%@ Page Title="" Language="C#" MasterPageFile="~/Apoio/Site.Master" AutoEventWireup="true" CodeBehind="BoletimInvalidarEmails.aspx.cs" Inherits="ASPApoio.Apoio.BoletimInvalidarEmails" %>
<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    <p>
        Página para invalidar os e-mails que retornaram do boletim.</p>
    <p>
        <asp:Button ID="btExecutar" runat="server" Text="EXECUTAR" Height="30px" 
            onclick="btExecutar_Click" Width="120px" />
    </p>
</asp:Content>
