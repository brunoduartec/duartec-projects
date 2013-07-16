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

namespace RankingWebApp
{
    public partial class ViewItems : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

            Service1SoapClient a = new Service1SoapClient();

            //string bb = a.GetItem("User", "Name", "Bruno");

            var ll = a.GetList("User");
            //string username = "bruno.duartec";





            Panel ptemp = new Panel();
            ptemp.ID = "panelUsers";

            tabUsers.Controls.Clear(); //Cleaning the placeholder wich will handle  all the components


            Label ltemp = new Label();
            ptemp.Controls.Add(ltemp);
            ltemp.Text += "<table>";

            int size = 2;
            int cont = 0;
            foreach (var item in ll)
            {



                string[] localitems = item.Split(',');

                string username = localitems[2];

                string userurl = "https://graph.facebook.com/" + username;


                //https://graph.facebook.com/

                string imageurl = localitems[1];
                if (imageurl == String.Empty)
                {
                    imageurl = userurl + "/picture?type=normal";
                }



                #region removing info
                WebClient webClient = new WebClient();
                webClient.QueryString.Add("fields", "name");


                string result = webClient.DownloadString(userurl);



                string[] fieldsRaw = result.Split(',');

                List<string> fields = new List<string>();

                foreach (var itfield in fieldsRaw)
                {
                    fields.Add(itfield.Split(':')[1].ToString().Replace('"', ' '));
                }
                #endregion



                if (cont%size ==0)
                {
                    ltemp.Text += "<tr>";
                }
                //ltemp.Text += "<td>";

               // ltemp.Text += "<tr><td>Usuario: " + fields[0] + "<td></tr>";
                ltemp.Text += "<td class = \"user\">  <img src=" + imageurl + " /></td>";

                //ltemp.Text += "</td>";
                if (cont%size == 0)
                {
                    ltemp.Text += "</tr>";
                    cont = 0;
                }



                tabUsers.Controls.Add(ptemp);
                
                
                cont++;
            }

            ltemp.Text += "</table>";


        }
    }
}
