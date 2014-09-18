<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="AlbumFotosDescricao.aspx.cs" Inherits="ASPApoio.Apoio.AlbumFotosDescricao" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>DESCRIÇÃO DA FOTO</title>
    <base target="_self" />
    <meta http-equiv="Expires" content="-1" /> 
    <meta http-equiv="Cache-control" content="no-cache" /> 
    <link href="Comum/css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server">
    <div style="margin:10px;">
        <div class="titulo001">DETALHES DA FOTO</div>
        <table cellpadding="1" cellspacing="1" class="borda001" width="100%">
            <tr>
                <td class="titulo002">DESCRIÇÃO</td>
                <td class="titulo002" width="7%">&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <asp:TextBox ID="txtDescricao" runat="server" MaxLength="255"></asp:TextBox>
                </td>
                <td>
                    <asp:Button ID="btSalvar" runat="server" Text="SALVAR" Width="100%" 
                        onclick="btSalvar_Click" />
                </td>
            </tr>
            <tr>
                <td colspan="2"><asp:Label ID="lbFoto" runat="server"></asp:Label></td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>
