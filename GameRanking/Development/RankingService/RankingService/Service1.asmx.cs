﻿using System;
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
        public string GetAppName()
        {
            return "RankingService";
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
        public Seed GetSeed(string field, string item)
        {

            return new Seed(GetItem("Seed", field, item));
        
        }

      
        [WebMethod]
        public string GetItem(string list,string field, string item)
        {

            String query = "Select * from " + list + " where "+field+" like '%"+item+"%'";
            
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
        public List<Seed> GetSeedSearch(string field, string item)
        {

            List<Seed> ret = new List<Seed>();

            String query = "Select * from Seed where " + field + " like '%" + item + "%'";
            List<string> lSeed = new List<string>();
            
            lSeed.AddRange( MySQLConnection.Instance().SQLQueryReturn(query));

            foreach (var it in lSeed)
            {
                ret.Add(new Seed(it));
            }

            return ret;
        
        }


        [WebMethod]

        public List<string> GetList(string item)
        {

            String query = "Select * from " + item;
            return MySQLConnection.Instance().SQLQueryReturn(query);

        }


        [WebMethod]
        public List<Seed> GetSeedList()
        {

            List<Seed> ret = new List<Seed>();

            String query = "Select * from Seed order by Name";
            List<string> lSeed = new List<string>();

            lSeed.AddRange(MySQLConnection.Instance().SQLQueryReturn(query));

            foreach (var it in lSeed)
            {
                ret.Add(new Seed(it));
            }

            return ret;
        
        }

    }
}