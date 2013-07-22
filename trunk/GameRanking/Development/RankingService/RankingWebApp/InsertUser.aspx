<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="InsertUser.aspx.cs" Inherits="RankingWebApp.InsertUser" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
     <asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
    <asp:UpdatePanel ID="UpdatePanel1" runat="server">
        <ContentTemplate>
        
        <asp:PlaceHolder ID = "tabUsers" runat=server />
        
        
        </ContentTemplate>
    </asp:UpdatePanel>
    <asp:Button runat=server Text="Insert" ID="InsertButton" 
        onclick="InsertButton_Click" />
    </form>
</body>
</html>
