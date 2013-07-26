using System;
using System.Collections.Generic;
using System.Web;
using System.Web.Services;
using RankingService.DAO;
using System.IO;
using SemearLibrary;

namespace RankingService
{
    /// <summary>
    /// Summary description for Service1
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    public class Service1 : System.Web.Services.WebService
    {

        [WebMethod]
        public bool CreateUser(String Name, String FileName)
        {


            bool ret = false;
            String query = "INSERT INTO User (Name, Image) VALUES('" + Name + "','" + FileName + "')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;
            
           
        }

        [WebMethod]
        public bool CreateMultiParamUser(string[] items, string[] values)
        {

            bool ret = false;


            String query = "INSERT INTO Seed (";

            string para="";
            string vals="";
            for (int i = 0; i < items.Length; i++)
            {
                para = para + items[i] + ",";
                vals = vals + "'" + values[i] + "',"; 
            }


            para = para.Remove(para.Length - 1);
            vals = vals.Remove(vals.Length - 1);
            query = query + para + ") VALUES(" + vals + ")";

            MySQLConnection.Instance().SQLQuery(query);

            return ret;
        
        }


        [WebMethod]
        public bool CreateFaceBookUser(String Name, String FileName,string FaceBook)
        {


            bool ret = false;
            String query = "INSERT INTO Seed (Name, Image,FaceBook) VALUES('" + Name + "','" + FileName + "','"+FaceBook+"')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;


        }

        [WebMethod]
        public Seed GetSeed(string field, string item)
        {


            string it = GetItem("Seed", field, item);


            Seed ret = new Seed();

            if (it != "NULL")
            {
                string[] localitems = it.Split(',');

                ret.Name = localitems[0];
                ret.Image = localitems[1];
                ret.Facebook = localitems[2];
                ret.CPF = localitems[3];
                ret.Fone = localitems[4];
                ret.Fone2 = localitems[5];
                ret.Fone3 = localitems[6];
                ret.Adress = localitems[7]; 
            }


            
           

            return ret;
        
        }

      
        [WebMethod]
        public string GetItem(string list,string field, string item)
        {

            String query = "Select * from " + list + " where "+field+"='"+item+"'";
            
            var ret = MySQLConnection.Instance().SQLQueryReturn(query);
            string strret = "";
            if (ret.Count == 0)
            {
                strret = "NULL";
            }
            else
            {
                strret = ret[0];
            }

            return strret;
        
        }


        [WebMethod]

        public List<string> GetList(string item)
        {

            String query = "Select * from " + item;
            return MySQLConnection.Instance().SQLQueryReturn(query);

        }



    }
}