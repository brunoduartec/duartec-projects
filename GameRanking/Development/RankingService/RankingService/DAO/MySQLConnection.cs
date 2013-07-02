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
                //string host = ConfigurationManager.ConnectionStrings["MySQLConnString"].ConnectionString;


                string MyConString = "server=dbmy0052.whservidor.com;UID=ploobs_8; PASSWORD=gameranking1;database=ploobs_8";
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

        public void SQLInsertImage(String Name, byte[] buffer)
        {
            String name_new = Name;
            byte[] buffer_new = buffer;

            connection.Open();
            MySqlCommand command = new MySqlCommand("", connection);
            command.CommandText = "insert into User(Name,Image) values(@name,@image);";

            command.Parameters.AddWithValue("@name", name_new);
            command.Parameters.AddWithValue("@image", buffer_new);

            command.ExecuteNonQuery();

            connection.Close();


        }


        public List<Object> SQLQueryReturn(string query)
        {


            List<Object> fragments = new List<Object>();


            MySqlCommand command = connection.CreateCommand();
            MySqlDataReader Reader;
            command.CommandText = query;
            connection.Open();
            Reader = command.ExecuteReader();


            int items = Reader.FieldCount;// retrieving the size of the object
            while (Reader.Read())
            {
                string stringreturn = "";
                List<Object> subitem = new List<object>();

                for (int i = 1; i < items; i++)
                {
                    subitem.Add(Reader.GetValue(i));
                    //stringreturn += (Reader.GetValue(i) + ",");
                }

               // stringreturn = stringreturn.Remove(stringreturn.Length - 1);
                fragments.Add(subitem);

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