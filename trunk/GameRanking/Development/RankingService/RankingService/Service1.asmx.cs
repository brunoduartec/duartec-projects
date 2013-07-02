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
            
            FileStream fs;
            BinaryReader br;
            byte[] ImageData;
            fs = new FileStream(FileName, FileMode.Open, FileAccess.Read);
            br = new BinaryReader(fs);
            ImageData = br.ReadBytes((int)fs.Length);
            br.Close();
            fs.Close();

            MySQLConnection.Instance().SQLInsertImage(Name, ImageData);

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

        public List<Object> GetList(String item)
        {

            String query = "Select * from " + item;
            return MySQLConnection.Instance().SQLQueryReturn(query);

        }



    }
}
