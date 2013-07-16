using System;
using System.Collections.Generic;
using System.Web;
using System.Web.Services;
using RankingService.DAO;
using System.IO;

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
        public bool CreateGame(String Name, String Description, int Id)
        {

            bool ret = false;
            String query = "INSERT INTO Game (Name, Description,CreatorId) VALUES('" + Name + "','" + Description + "','" + Id + "')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;

        }


        [WebMethod]
        public bool CreateUser(String Name, String FileName)
        {


            bool ret = false;
            String query = "INSERT INTO User (Name, Image) VALUES('" + Name + "','" + FileName + "')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;
            
           
        }


        [WebMethod]
        public bool CreateFaceBookUser(String Name, String FileName,string FaceBook)
        {


            bool ret = false;
            String query = "INSERT INTO User (Name, Image,FaceBook) VALUES('" + Name + "','" + FileName + "','"+FaceBook+"')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;


        }




        [WebMethod]
        public bool CreateRankingEntry(String GameId, String Time, String UserId, int Points)
        {

            bool ret = false;
            String query = "INSERT INTO ranking (GameId,Time,UserId,Points) VALUES('" + GameId + "','" + Time + "','" + UserId + "','" + Points + "')";
            MySQLConnection.Instance().SQLQuery(query);

            return ret;

        }

        [WebMethod]
        public string GetItem(string list,string field, string item)
        {

            String query = "Select * from " + list + " where "+field+"='"+item+"'";
            return MySQLConnection.Instance().SQLQueryReturn(query).ToArray()[0];
        
        }


        [WebMethod]

        public List<string> GetList(string item)
        {

            String query = "Select * from " + item;
            return MySQLConnection.Instance().SQLQueryReturn(query);

        }



    }
}