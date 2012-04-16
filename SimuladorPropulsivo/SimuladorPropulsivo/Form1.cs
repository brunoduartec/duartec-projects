using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace SimuladorPropulsivo
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            Init();
        }


        public PropulsiveSolver solver = new PropulsiveSolver();

        public void Init()
        {
            solver.InitGains(0.97, 0.85, 1.00, 0.90, 0.98, 1.00, 0.85, 0.97);
            solver.InitGamas(1.36, 1.40, 1.37, 1.33, 1.36);



        }



        public void DrawGraph()
        {


            

            Graphics g = pictureBox1.CreateGraphics();
  g.Clear(Color.White);


            Pen PressurePen = new Pen(Color.Red);
            PressurePen.Width = 2;

          

            float total = pictureBox1.Width;
            float cima = pictureBox1.Height;

            float yfact = (float)( pictureBox1.Height / (solver.MaxP));

            float fixval = 10000;
            g.DrawLines(PressurePen, new PointF[] 
            {

                  
                new PointF(0,cima - float.Parse(solver.Variables["PA"].ToString())/fixval), 
                new PointF (4*total/15.0f,cima - float.Parse(solver.Variables["P02"].ToString())*yfact), 
                new PointF (7*total/15.0f,cima - float.Parse(solver.Variables["P03"].ToString())*yfact), 
                new PointF (9*total/15.0f,cima - float.Parse(solver.Variables["P04"].ToString())*yfact), 
                new PointF (10*total/15.0f,cima - float.Parse(solver.Variables["P05"].ToString())*yfact), 
                new PointF (15*total/15.0f,cima - float.Parse(solver.Variables["P06"].ToString())*yfact)
              
               
            });


            yfact = (float)(pictureBox1.Height / (solver.MaxT));

            Pen TemperaturePen = new Pen(Color.Blue);
            TemperaturePen.Width = 2;


            fixval = 10;
          
            g.DrawLines(TemperaturePen, new PointF[] 
            {
                new PointF(0,cima - float.Parse(solver.Variables["TA"].ToString())/fixval), 
                new PointF (4*total/15.0f,cima - float.Parse(solver.Variables["T02"].ToString())*yfact), 
                new PointF (7*total/15.0f,cima - float.Parse(solver.Variables["T03"].ToString())*yfact), 
                new PointF (9*total/15.0f,cima - float.Parse(solver.Variables["T04"].ToString())*yfact), 
                new PointF (10*total/15.0f,cima - float.Parse(solver.Variables["T05"].ToString())*yfact), 
                new PointF (15*total/15.0f,cima - float.Parse(solver.Variables["T06"].ToString())*yfact)
              
               
            });


        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }



        private void trackBar2_Scroll(object sender, EventArgs e)
        {

        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            solver.SolveSystem(radioButton2.Checked,false,double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), double.Parse(textTqueima.Text), double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), double.Parse(textB.Text));

            //solver.SolveSystem(0.85,18750,216.70,45000,288.3,1.08,1600,0,1.5,20,0,0);

            LabelEmpuxo.Text = "Empuxo = " + solver.Empuxo.ToString();
            LabelUs.Text = "TSFC = " + solver.TSFC.ToString();

            DrawGraph();


        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {
            textM.Enabled = true;
            textPa.Enabled = true;
            textTa.Enabled = true;
            textPC.Enabled = true;
            textR.Enabled = true;
            textCP.Enabled = true;
            textTqueima.Enabled = true;
            textTposqueima.Enabled = true;
            textPrf.Enabled = true;
            textPrc.Enabled = true;
            textB.Enabled = true;
            solver.actualtype = PropulsiveSolver.TYPE.TURBOFAN;
            
        }

        private void radioButton2_CheckedChanged(object sender, EventArgs e)
        {


            textM.Enabled = true;
            textPa.Enabled = true;
            textTa.Enabled = true;
            textPC.Enabled = true;
            textR.Enabled = true;
            textCP.Enabled = true;
            textTqueima.Enabled = true;
            textTposqueima.Enabled = true;

            textPrf.Enabled = false;
            textPrf.Text = "1";

            textPrc.Enabled = true;

            textB.Enabled = false;
            textB.Text = "0";
            solver.actualtype = PropulsiveSolver.TYPE.TURBOJATO;
        }

        private void radioButton3_CheckedChanged(object sender, EventArgs e)
        {
            textM.Enabled = true;
            textPa.Enabled = true;
            textTa.Enabled = true;
            textPC.Enabled = true;
            textR.Enabled = true;
            textCP.Enabled = true;
            textTqueima.Enabled = true;
            textTposqueima.Enabled = true;


            textPrf.Enabled = false;
            textPrf.Text = "1";

            textPrc.Enabled = false;
            textPrc.Text = "1";

            textB.Enabled = false;
            textB.Text = "0";

            solver.actualtype = PropulsiveSolver.TYPE.RAMJET;


        }

        private void button2_Click(object sender, EventArgs e)
        {
            double Btemp = double.Parse(textB.Text);


            List<PointF> listb = new List<PointF>();


            List<double> tempvals = new List<double>();



            int pontos = int.Parse(textPontos.Text);
            int xmax = int.Parse( textxmax.Text);
            float delta = (float)xmax / pontos;
            float xval = 0;

            int i = 0;

            float xGraphMax = pontos;
            //for (int i = 0; i < 9*passo; i++)

            double ytemp;

            CsvExport myExport = new CsvExport();
            bool flag = false;
            while (i < pontos && !flag)
            {
                i++;
                xval += delta;


                myExport.AddRow();
                myExport["B"] = xval;


                #region T1300
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), 1300, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.Empuxo;



                //if (ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{
                //    xGraphMax = i - 1;

                //    break;
                //}

                //else
                //{
                //    tempvals.Add(ytemp);
                //}


                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                {
                 
                    myExport["Empuxo1.3k"] = ytemp;
                }
                else
                {
                    myExport["Empuxo1.3k"] = "";
                }

                
                
                #endregion

                #region T1500
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), 1500, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.Empuxo;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                myExport["Empuxo1.5k"] = ytemp;
                else
                {
                    myExport["Empuxo1.5k"] = "";
                }

                #endregion


                #region T1700
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text),1700, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.Empuxo;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                myExport["Empuxo1.7k"] = ytemp;
                else
                {
                    myExport["Empuxo1.7k"] = "";
                }

                #endregion


                

                //if (ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{
                //    xGraphMax = i - 1;

                //    break;
                //}

                //else
                //{
                //    tempvals.Add(ytemp);
                //}


              


            }


            //List<double> ttval = tempvals;


            //ttval.Sort();

            //double ymin = ttval[0];
            //double ymax = ttval[ttval.Count - 1];


            //xval = 0;


         
            //for (int ii = 0; ii < xGraphMax; ii++)
            //{

            //    //float xp = (float)((ImageBox1.Width / xmax) * xval);
            //    xval += delta;

            //    //float yp = (float)((tempvals[ii] - ymin) * ImageBox1.Height / (ymax - ymin));

            //    //PointF pp = new PointF(xp, ImageBox1.Height - yp);
            //    //listb.Add(pp);

            //    myExport.AddRow();
            //    myExport["B"] = xval;
            //    myExport["Empuxo"] = tempvals[ii];

            //}

            myExport.ExportToFile(AppDomain.CurrentDomain.BaseDirectory + "EMPUXO-"+solver.actualtype.ToString()+".csv");

            //Graphics g = ImageBox1.CreateGraphics();

            //Pen myPen = new Pen(Color.Red);
            //myPen.Width = 2;

            //g.Clear(Color.White);

            //g.DrawLines(myPen, listb.ToArray());



        }

        private void button3_Click(object sender, EventArgs e)
        {
            double Btemp = double.Parse(textB.Text);


            List<PointF> listb = new List<PointF>();


            List<double> tempvals = new List<double>();



            int pontos = int.Parse(textPontos.Text);
            int xmax = int.Parse(textxmax.Text);
            float delta = (float)xmax / pontos;
            float xval = 0;

            int i = 0;

            float xGraphMax = pontos;
            //for (int i = 0; i < 9*passo; i++)

            double ytemp;

            CsvExport myExport = new CsvExport();
            bool flag = false;
            while (i < pontos && !flag)
            {
                i++;
                xval += delta;


                myExport.AddRow();
                myExport["B"] = xval;


                #region T1300
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), 1300, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.TSFC;



                //if (ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{
                //    xGraphMax = i - 1;

                //    break;
                //}

                //else
                //{
                //    tempvals.Add(ytemp);
                //}


                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                {

                    myExport["TSFC-1.3k"] = ytemp;
                }
                else
                {
                    myExport["TSFC-1.3k"] = "";
                }



                #endregion

                #region T1500
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), 1500, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.TSFC;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["TSFC-1.5k"] = ytemp;
                else
                {
                    myExport["TSFC-1.5k"] = "";
                }

                #endregion


                #region T1700
                solver.SolveSystem(radioButton2.Checked, false, double.Parse(textM.Text), double.Parse(textPa.Text), double.Parse(textTa.Text), double.Parse(textPC.Text), double.Parse(textR.Text), double.Parse(textCP.Text), 1700, double.Parse(textTposqueima.Text), double.Parse(textPrf.Text), double.Parse(textPrc.Text), xval);

                ytemp = solver.TSFC;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["TSFC-1.7k"] = ytemp;
                else
                {
                    myExport["TSFC-1.7k"] = "";
                }

                #endregion




                //if (ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{
                //    xGraphMax = i - 1;

                //    break;
                //}

                //else
                //{
                //    tempvals.Add(ytemp);
                //}





            }


            //List<double> ttval = tempvals;


            //ttval.Sort();

            //double ymin = ttval[0];
            //double ymax = ttval[ttval.Count - 1];


            //xval = 0;



            //for (int ii = 0; ii < xGraphMax; ii++)
            //{

            //    //float xp = (float)((ImageBox1.Width / xmax) * xval);
            //    xval += delta;

            //    //float yp = (float)((tempvals[ii] - ymin) * ImageBox1.Height / (ymax - ymin));

            //    //PointF pp = new PointF(xp, ImageBox1.Height - yp);
            //    //listb.Add(pp);

            //    myExport.AddRow();
            //    myExport["B"] = xval;
            //    myExport["Empuxo"] = tempvals[ii];

            //}

            myExport.ExportToFile(AppDomain.CurrentDomain.BaseDirectory + "TSFC-" + solver.actualtype.ToString() + ".csv");

            //Graphics g = ImageBox1.CreateGraphics();

            //Pen myPen = new Pen(Color.Red);
            //myPen.Width = 2;

            //g.Clear(Color.White);

            //g.DrawLines(myPen, listb.ToArray());

        }





    }
}
