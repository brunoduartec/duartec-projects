using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using RankingWebApp.ServiceReference;
using System.IO;
using System.Drawing;

namespace RankingWebApp
{
    public partial class ViewItems : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

            Service1SoapClient a = new Service1SoapClient();

            var ll = a.GetList("User");

            Name1.Text = "Name: " + ll[1].ToString();

            Stream ms = new MemoryStream((byte[])ll[2]);


            

            int d = ll.Count;
            
        }
    }
}