<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="InsertUser.aspx.cs" Inherits="RankingWebApp.InsertUser" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <table>
    <tr>
    <td>
    <label>Name</label>
    </td>
    <td><asp:TextBox runat=server ID="textName"></asp:TextBox></td>
    </tr>
    
     <tr>
    <td>
    <label>Facebook</label>
    </td>
    <td><asp:TextBox runat=server ID="textFacebook"></asp:TextBox></td>
    </tr>

    </table>
    </div>
    <asp:Button runat=server Text="Insert" ID="InsertButton" 
        onclick="InsertButton_Click" />
    </form>
</body>
</html>
