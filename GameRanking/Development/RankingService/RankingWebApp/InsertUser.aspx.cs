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

        string[] parameters = new string[20] { "Id", "Name", "Image", "Facebook", "CPF", "Fone", "Fone2", "Fone3", "Adress", "Email", "Birth", "University", "Course", "StartDate", "City", "State", "School", "Preparatory", "Reason", "Subscription" };
        string[] names = new string[20] { "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", DateTime.Now.ToShortDateString(), "a", "a", DateTime.Now.ToShortDateString(), "a", "a", "a", "a", "a", "a" };

        ArrayOfString npar = new ArrayOfString();
        ArrayOfString nval = new ArrayOfString();


        protected void Page_Load(object sender, EventArgs e)
        {


            Panel ptemp = new Panel();
            ptemp.ID = "panelUsers";

            tabUsers.Controls.Clear(); //Cleaning the placeholder wich will handle  all the components


            Label ltemp = new Label();
            ptemp.Controls.Add(ltemp);


            foreach (var item in parameters)
            {

                Label ll = new Label();
                ll.ID = "label" + item;
                ll.Text = item;


                TextBox t = new TextBox();
                t.ID = "textbox"+item;

                tabUsers.Controls.Add(ll);
                
                tabUsers.Controls.Add(t);
                tabUsers.Controls.Add(new LiteralControl("<BR>"));
                
            }

            tabUsers.Controls.Add(ptemp);
        }

        protected void InsertButton_Click(object sender, EventArgs e)
        {
            Service1SoapClient a = new Service1SoapClient();
         
            
            npar.AddRange(parameters);
            
            
            
            
            //nval.AddRange(names);


            int i = 0;
            foreach (var item in parameters)
            {

                Control c = tabUsers.FindControl("textbox" + item);
                string val = (c as TextBox).Text;
                if (val != string.Empty)
                {
                    names[i] = val; 
                }

                i++;
            }
            

            nval.AddRange(names);
            a.CreateMultiParamUser(npar, nval);
            



            //a.CreateFaceBookUser(this.textName.Text,"", this.textFacebook.Text);

            //Response.Redirect("ViewItems.aspx");

            

        }

    }
}