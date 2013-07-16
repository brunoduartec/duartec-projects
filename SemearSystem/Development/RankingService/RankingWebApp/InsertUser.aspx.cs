using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using RankingWebApp.ServiceReference1;

namespace RankingWebApp
{
    public partial class InsertUser : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void InsertButton_Click(object sender, EventArgs e)
        {
            Service1SoapClient a = new Service1SoapClient();

            a.CreateFaceBookUser(this.textName.Text,"", this.textFacebook.Text);

            Response.Redirect("ViewItems.aspx");

            

        }

    }
}