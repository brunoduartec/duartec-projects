﻿<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="ViewItems.aspx.cs" Inherits="RankingWebApp.ViewItems" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link type="text/css" rel="stylesheet" href="StyleSheet1.css" />
   
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
    
    </form>
</body>
</html>
