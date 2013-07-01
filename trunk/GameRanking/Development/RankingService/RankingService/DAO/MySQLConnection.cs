using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;
using System.Configuration;

namespace RankingService.DAO
{
    public class MySQLConnection
    {

        private static MySQLConnection instance;
        private bool Connstatus = false;
        public static MySQLConnection Instance()
        {
            if (instance == null)
            {
                instance = new MySQLConnection();
            }

            return instance;
        
        
        }

        private MySqlConnection connection;

        public bool GetConnectionStatus()
        {

            return Connstatus;
        
        }

        private void CreateConnection()
        {
            
            try
            {
                string host = ConfigurationManager.ConnectionStrings["MySQLConnString"].ConnectionString;


                string MyConString = "server=dbmy0052.whservidor.com;User Id=ploobs_8;Persist Security Info=True;database=ploobs_8;pooling=false;";
                connection = new MySqlConnection(MyConString);
                Connstatus = true;
            }
            catch (Exception)
            {
                
                throw;
            }

            
        }
        
        protected MySQLConnection()
        {
            CreateConnection();
        
        
        
        }
    }
}