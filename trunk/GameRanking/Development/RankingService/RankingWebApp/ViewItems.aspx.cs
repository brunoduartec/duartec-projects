using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

using System.IO;
using System.Drawing;
using System.Net;
using System.Globalization;
using RankingWebApp.Commons;

using RankingWebApp.ServiceReference1;

namespace RankingWebApp
{
    public partial class ViewItems : System.Web.UI.Page
    {

    

        protected void Page_Load(object sender, EventArgs e)
        {


            Service1SoapClient a = new Service1SoapClient();


            Seed ass;


            string itemtype = Request.QueryString["mentor"];
            string items = Request.QueryString["n"];

            if (items == null)
            {
                items = Constants.ITEMSPERLINE.ToString();
            }

            bool mentor = false;

            if (itemtype !=  null)
            {
                mentor = bool.Parse(itemtype);
            }


            Seed[] sdList = a.GetSeedList().Where(p=> p.Mentor == mentor).ToArray();


            Panel ptemp = new Panel();
            ptemp.ID = "panelUsers";                       



            //  ltemp.Text = sd.Name;
            ptemp.Controls.Clear();


            Label ltemp = new Label();


            ltemp.Text = "<table class=\"datagrid\" width = 100%>";


            int count = 0;
        
            int size = int.Parse(items);


            foreach (var item in sdList)
            {

                if (count%size==0)
                {
                    ltemp.Text += "<tr>";
                    
                }
                

                ltemp.Text +=("<td>"+  Utils.ToStringAsTable(item,true)+"</td>");

                count++;
                if (count%size==0)
                {
                    ltemp.Text += "</tr>";
                    count = 0;
                }



                
            }


            ltemp.Text += "</table>";
            ptemp.Controls.Add(ltemp);

            tabUsers.Controls.Add(ptemp);




        }
    }
}
