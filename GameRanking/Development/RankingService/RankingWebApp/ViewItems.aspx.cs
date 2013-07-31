using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using RankingWebApp.ServiceReference1;
using System.IO;
using System.Drawing;
using System.Net;
using System.Globalization;
using RankingWebApp.Commons;

namespace RankingWebApp
{
    public partial class ViewItems : System.Web.UI.Page
    {

    

        protected void Page_Load(object sender, EventArgs e)
        {


            Service1SoapClient a = new Service1SoapClient();


            

            Seed[] sdList =  a.GetSeedList();


            Panel ptemp = new Panel();
            ptemp.ID = "panelUsers";

            //tabUsers.Controls.Clear(); //Cleaning the placeholder wich will handle  all the components





            //  ltemp.Text = sd.Name;
            ptemp.Controls.Clear();


            foreach (var item in sdList)
            {
                Label ltemp = new Label();
                ltemp.Text =Utils.ToStringAsTable(item);

                ptemp.Controls.Add(ltemp);

                tabUsers.Controls.Add(ptemp);
            }






        }
    }
}
