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

                string MyConString = "server=dbmy0052.whservidor.com;UID=ploobs_8; PASSWORD=gameranking1;database=ploobs_8;Allow Zero Datetime=True";
                connection = new MySqlConnection(MyConString);
                Connstatus = true;
            }
            catch (Exception)
            {

                throw;
            }


        }

        public void SQLQuery(string query)
        {
            MySqlCommand cmd = new MySqlCommand();
            cmd.CommandText = query;
            cmd.Connection = connection;
            connection.Open();
            int aff = cmd.ExecuteNonQuery();


            connection.Close();
        }

        public  List<string>  SQLQueryReturn(string query)
        {


            List<string> fragments = new List<string>();


            MySqlCommand command = connection.CreateCommand();
            MySqlDataReader Reader;
            command.CommandText = query;
            connection.Open();
            Reader = command.ExecuteReader();

           
            int items = Reader.FieldCount;// retrieving the size of the object
           // int i = 1;
            while (Reader.Read())
            {

                string stringreturn = "";
                for (int i = 1; i < items; i++)
                {

                    stringreturn += (Reader.GetValue(i)+ ",");
                }
                stringreturn = stringreturn.Remove(stringreturn.Length - 1);
                fragments.Add(stringreturn);
            }


            connection.Close();

            return fragments;
            

        }

        protected MySQLConnection()
        {
            CreateConnection();



        }
    }
}