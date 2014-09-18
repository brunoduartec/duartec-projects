<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Login.aspx.cs" Inherits="ASPApoio.Apoio.Login" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>ASP Solutions - Login</title>
    <link href="Comum/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server">
    <br />
    <br />
    <br />
    <table align="center" width="270px" style="background-image: url(comum/images/login.jpg); background-repeat: no-repeat" class="borda001">
        <tr>
            <td colspan="2" height="150px">
                &nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                &nbsp;</td>
        </tr>
        <tr>
            <td><div align="right">
                Usuário:</div></td>
            <td>
                <asp:TextBox ID="txtUsername" runat="server" width="180px" MaxLength="12"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td><div align="right">
                Senha:</div></td>
            <td>
                <asp:TextBox ID="txtPassword" runat="server" TextMode="Password" Width="180px" 
                    MaxLength="12"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:CheckBox ID="txtConetado" runat="server" Text="Manter-me conectado." />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Button ID="btnLogin" runat="server" Text="ENVIAR" Width="180px" 
                    Height="30px" onclick="btnLogin_Click" />
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                <asp:Label ID="lbMsg" runat="server" ForeColor="Red" Visible="false"></asp:Label>
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td>
                &nbsp;</td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
    </form>
</body>
</html>
