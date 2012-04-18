using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using CarlosAg.ExcelXmlWriter;
using System.Globalization;

namespace SimuladorPropulsivo
{
    public partial class Form1 : Form
    {



        struct PaTaPair
        {

            public double Pa;
            public double Ta;

            public PaTaPair(double pa, double ta)
            {
                this.Pa = pa;
                this.Ta = ta;
            }

        }

        private Dictionary<double, PaTaPair> AltitudeSituation = new Dictionary<double, PaTaPair>();


        public Form1()
        {
            InitializeComponent();
            Init();


            // Setting some Mach situations
            AltitudeSituation.Add(0, new PaTaPair(101.3, 288.2));
            AltitudeSituation.Add(12200, new PaTaPair(18.75, 216.7));
            AltitudeSituation.Add(18300, new PaTaPair(7.170, 216.7));
            AltitudeSituation.Add(24400, new PaTaPair(2.097, 216.7));

            comboBox3.SelectedIndex = 0;
            cbMotor.SelectedIndex = 0;
            comboBox1.SelectedIndex = 0;
            comboBox2.SelectedIndex = 0;
        }

        private void SaveExcel(string filename, string collum1, string collum2, string collum3, string collum4, List<double> XAxis, List<double> YAxis1, List<double> YAxis2, List<double> YAxis3)
        {
            Workbook book = new Workbook();

            // Specify which Sheet should be opened and the size of window by default
            book.ExcelWorkbook.ActiveSheetIndex = 1;
            book.ExcelWorkbook.WindowTopX = 100;
            book.ExcelWorkbook.WindowTopY = 200;
            book.ExcelWorkbook.WindowHeight = 7000;
            book.ExcelWorkbook.WindowWidth = 8000;

            // Some optional properties of the Document
            book.Properties.Author = "CarlosAg";
            book.Properties.Title = "My Document";
            book.Properties.Created = DateTime.Now;

            // Add some styles to the Workbook
            WorksheetStyle style = book.Styles.Add("HeaderStyle");
            style.Font.FontName = "Tahoma";
            style.Font.Size = 14;
            style.Font.Bold = true;
            style.Alignment.Horizontal = StyleHorizontalAlignment.Center;
            style.Font.Color = "White";
            style.Interior.Color = "Blue";
            style.Interior.Pattern = StyleInteriorPattern.DiagCross;

            // Create the Default Style to use for everyone
            style = book.Styles.Add("Default");
            style.Font.FontName = "Tahoma";
            style.Font.Size = 10;

            // Add a Worksheet with some data
            Worksheet sheet = book.Worksheets.Add("Some Data");

            // we can optionally set some column settings
            sheet.Table.Columns.Add(new WorksheetColumn(150));
            sheet.Table.Columns.Add(new WorksheetColumn(100));

            WorksheetRow row = sheet.Table.Rows.Add();
            row.Cells.Add(new WorksheetCell(collum1, "HeaderStyle"));
            row.Cells.Add(new WorksheetCell(collum2, "HeaderStyle"));
            row.Cells.Add(new WorksheetCell(collum3, "HeaderStyle"));
            row.Cells.Add(new WorksheetCell(collum4, "HeaderStyle"));


            //row = sheet.Table.Rows.Add();
            //// Skip one row, and add some text
            //row.Index = 3;
            //row.Cells.Add("Data");
            //row.Cells.Add("Data 1");
            //row.Cells.Add("Data 2");
            //row.Cells.Add("Data 3");

            // Generate 30 rows
            for (int i = 0; i < XAxis.Count; i++)
            {
                row = sheet.Table.Rows.Add();

                //row.Cells.Add(XAxis[i].ToString());
                row.Cells.Add(XAxis[i].ToString(), DataType.Number, "Default");

                if (YAxis1.Count > i)
                {
                    // row.Cells.Add(YAxis1[i].ToString()); 
                    row.Cells.Add(YAxis1[i].ToString(), DataType.Number, "Default");
                }
                else
                {
                    row.Cells.Add();
                }

                if (YAxis2.Count > i)
                {

                    row.Cells.Add(YAxis2[i].ToString(), DataType.Number, "Default");
                    //row.Cells.Add(YAxis2[i].ToString()); 
                }
                else
                {
                    row.Cells.Add();
                }

                if (YAxis3.Count > i)
                {
                    //row.Cells.Add(YAxis3[i].ToString()); 
                    row.Cells.Add(YAxis3[i].ToString(), DataType.Number, "Default");
                }
                else
                {
                    row.Cells.Add();

                }


            }



            // Save the file and open it
            book.Save(filename);


        }


        public PropulsiveSolver solver = new PropulsiveSolver();

        public void Init()
        {
            solver.InitGains(0.97, 0.85, 1.00, 0.90, 0.98, 1.00, 0.85, 0.97);
            solver.InitGamas(1.36, 1.40, 1.37, 1.33, 1.36);



        }



        float LocalFloatParse(string val)
        {



            // Creates and initializes the CultureInfo which uses the international sort.
            CultureInfo myCIintl = new CultureInfo("en-US", false);

            return float.Parse(val, myCIintl.NumberFormat);
        }

        double LocalDoubleParse(string val)
        {

            // Creates and initializes the CultureInfo which uses the international sort.
            CultureInfo myCIintl = new CultureInfo("en-US", false);

            return double.Parse(val, myCIintl.NumberFormat);

        }

        public void DrawGraph()
        {




            Graphics g = pictureBox1.CreateGraphics();
            g.Clear(Color.White);


            Pen PressurePen = new Pen(Color.Red);
            PressurePen.Width = 2;



            float total = pictureBox1.Width;
            float cima = pictureBox1.Height;

            float yfact = (float)(pictureBox1.Height / (solver.MaxP));

            float fixval = 10000;
            //g.DrawLines(PressurePen, new PointF[] 
            //{
                
                
                
                  
            //    new PointF(0,cima - LocalFloatParse(solver.Variables["PA"].ToString())/fixval), 
            //    new PointF (4*total/15.0f,cima - LocalFloatParse(solver.Variables["P02"].ToString())*yfact), 
            //    new PointF (7*total/15.0f,cima - LocalFloatParse(solver.Variables["P03"].ToString())*yfact), 
            //    new PointF (9*total/15.0f,cima - LocalFloatParse(solver.Variables["P04"].ToString())*yfact), 
            //    new PointF (10*total/15.0f,cima - LocalFloatParse(solver.Variables["P05"].ToString())*yfact), 
            //    new PointF (15*total/15.0f,cima - LocalFloatParse(solver.Variables["P06"].ToString())*yfact)
              
               
            //});


            yfact = (float)(pictureBox1.Height / (solver.MaxT));

            Pen TemperaturePen = new Pen(Color.Blue);
            TemperaturePen.Width = 2;


            fixval = 10;

            //g.DrawLines(TemperaturePen, new PointF[] 
            //{
            //    new PointF(0,cima - LocalFloatParse(solver.Variables["TA"].ToString())/fixval), 
            //    new PointF (4*total/15.0f,cima - LocalFloatParse(solver.Variables["T02"].ToString())*yfact), 
            //    new PointF (7*total/15.0f,cima - LocalFloatParse(solver.Variables["T03"].ToString())*yfact), 
            //    new PointF (9*total/15.0f,cima - LocalFloatParse(solver.Variables["T04"].ToString())*yfact), 
            //    new PointF (10*total/15.0f,cima - LocalFloatParse(solver.Variables["T05"].ToString())*yfact), 
            //    new PointF (15*total/15.0f,cima - LocalFloatParse(solver.Variables["T06"].ToString())*yfact)
              
               
            //});


        }



        private void button1_Click_1(object sender, EventArgs e)
        {
            bool isramjet = cbMotor.SelectedItem.Equals("RamJet");
            bool hasfan = cbMotor.SelectedItem.Equals("TurboFan");

            solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), LocalDoubleParse(textTqueima.Text), LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));

            //solver.SolveSystem(0.85,18750,216.70,45000,288.3,1.08,1600,0,1.5,20,0,0);

            LabelEmpuxo.Text = "Empuxo = " + solver.Empuxo.ToString("#.0000");
            LabelUs.Text = "TSFC = " + solver.TSFC.ToString("#.0000");

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
            double PRCtemp = LocalDoubleParse(textPrc.Text);


            List<PointF> listb = new List<PointF>();


            List<double> tempvals = new List<double>();



            int pontos = int.Parse(textPontos.Text);
            int xmax = int.Parse(tbXinicio.Text);
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
                myExport["Pr"] = xval;



                int T = 1300;
                #region T1300

                bool isramjet = cbMotor.SelectedItem.Equals("RamJet");
                bool hasfan = cbMotor.SelectedItem.Equals("TurboFan");

                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);

                ytemp = solver.Empuxo;




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
                T = 1500;


                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);

                ytemp = solver.Empuxo;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["Empuxo1.5k"] = ytemp;
                else
                {
                    myExport["Empuxo1.5k"] = "";
                }

                #endregion


                #region T1700
                T = 1700;


                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);

                ytemp = solver.Empuxo;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["Empuxo1.7k"] = ytemp;
                else
                {
                    myExport["Empuxo1.7k"] = "";
                }

                #endregion







            }




            myExport.ExportToFile(AppDomain.CurrentDomain.BaseDirectory + "EMPUXOxPR-" + solver.actualtype.ToString() + "MACH-" + textM.Text.ToString() + ".csv");




        }

        private void button3_Click(object sender, EventArgs e)
        {
            double Btemp = LocalDoubleParse(textB.Text);


            List<PointF> listb = new List<PointF>();


            List<double> tempvals = new List<double>();


            int pontos = int.Parse(textPontos.Text);
            int xmax = int.Parse(tbXinicio.Text);
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



                int T = 1300;
                #region T1300

                bool isramjet = cbMotor.SelectedItem.Equals("RamJet");
                bool hasfan = cbMotor.SelectedItem.Equals("TurboFan");

                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);


                ytemp = solver.TSFC;




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
                T = 1500;


                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);

                ytemp = solver.TSFC;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["TSFC-1.5k"] = ytemp;
                else
                {
                    myExport["TSFC-1.5k"] = "";
                }

                #endregion


                #region T1700
                T = 1700;

                solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), 1, xval, 0);

                ytemp = solver.TSFC;

                if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                    myExport["TSFC-1.7k"] = ytemp;
                else
                {
                    myExport["TSFC-1.7k"] = "";
                }

                #endregion





            }


            myExport.ExportToFile(AppDomain.CurrentDomain.BaseDirectory + "TSFC-" + solver.actualtype.ToString() + "MACH-" + textM.Text.ToString() + ".csv");



        }


        private void CalcSolutionByDropDowns(int T, double xval)
        {

            bool isramjet = cbMotor.SelectedItem.Equals("RamJet");
            bool hasfan = cbMotor.SelectedItem.Equals("TurboFan");



            switch (comboBox1.SelectedItem.ToString())
            {


                case "MACH":


                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, xval, LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "Pa":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), xval, LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "Ta":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), xval, LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "PC":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), xval, LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "R":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), xval, LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "Cp":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), xval, T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "T pós queima":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, xval, LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "Prf":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), xval, LocalDoubleParse(textPrc.Text), LocalDoubleParse(textB.Text));
                    break;
                case "Prc":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), xval, LocalDoubleParse(textB.Text));
                    break;
                case "B":
                    solver.SolveSystem(isramjet, hasfan, cxAfterburn.Checked, LocalDoubleParse(textM.Text), LocalDoubleParse(textPa.Text), LocalDoubleParse(textTa.Text), LocalDoubleParse(textPC.Text), LocalDoubleParse(textR.Text), LocalDoubleParse(textCP.Text), T, LocalDoubleParse(textTposqueima.Text), LocalDoubleParse(textPrf.Text), LocalDoubleParse(textPrc.Text), xval);
                    break;

                default:
                    break;
            }





        }

        private void button6_Click(object sender, EventArgs e)
        {


            List<double> Xaxis = new List<double>();
            List<double> Yaxix1 = new List<double>();
            List<double> Yaxix2 = new List<double>();
            List<double> Yaxix3 = new List<double>();


            if (comboBox1.SelectedIndex == -1 || comboBox2.SelectedIndex == -1)
            {
                MessageBox.Show("Please select the X and Y axis value", "Problem");
                return;

            }
            int pontos = int.Parse(textPontos.Text);



            int xmin = int.Parse(tbXinicio.Text);
            int xmax = int.Parse(tbXfim.Text);
         


            float delta = (float)xmax / pontos;



            // isso porque a razao de compressão nunca pode ser 0
            float xval = 0;


            xval = xmin;
            //if (comboBox1.SelectedItem.Equals("Prc") || comboBox1.SelectedItem.Equals("Prf"))
            //{
            //    xval = 1;
            //}


          //  int i = 0;






            float xGraphMax = pontos;
            //for (int i = 0; i < 9*passo; i++)

            double ytemp;

            CsvExport myExport = new CsvExport();

            while (xval < xmax)
            {

                //i++;



                //myExport.AddRow();
                //myExport[comboBox1.SelectedItem.ToString()] = xval;

                Xaxis.Add(xval);



                #region T1300

                int T = 1300;


                CalcSolutionByDropDowns(T, xval);

                ytemp = 0;

                switch (comboBox2.SelectedItem.ToString())
                {
                    case "TSFC":
                        ytemp = solver.TSFC;
                        break;
                    case "Empuxo":
                        ytemp = solver.Empuxo;
                        break;
                    case "Nth":
                        ytemp = solver.Variables["Nth"];
                        break;
                    case "Nt":
                        ytemp = solver.Variables["Nt"];
                        break;

                    case "u sobre us":
                        ytemp = LocalDoubleParse(solver.Variables["u/us"].ToString());
                        break;

                }

                if (!ytemp.Equals(double.NaN) && !double.IsInfinity(ytemp)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                {

                    Yaxix1.Add(ytemp);

                }
                //else
                //{
                //    Yaxix1.Add(0);

                //}
                #endregion


                #region T1500

                T = 1500;


                CalcSolutionByDropDowns(T, xval);

                ytemp = 0;

                switch (comboBox2.SelectedItem.ToString())
                {
                    case "TSFC":
                        ytemp = solver.TSFC;
                        break;
                    case "Empuxo":
                        ytemp = solver.Empuxo;
                        break;
                    case "Nth":
                        ytemp = solver.Variables["Nth"];
                        break;
                    case "Nt":
                        ytemp = solver.Variables["Nt"];
                        break;

                    case "u sobre us":
                        ytemp = LocalDoubleParse(solver.Variables["u/us"].ToString());
                        break;

                }

                //if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{

                //    myExport[comboBox2.SelectedItem.ToString() + "-1.5k"] = ytemp;
                //}
                //else
                //{
                //    myExport[comboBox2.SelectedItem.ToString() + "-1.5k"] = "";
                //}
                if (!ytemp.Equals(double.NaN) && !double.IsInfinity(ytemp)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                {

                    Yaxix2.Add(ytemp);
                    //myExport[comboBox2.SelectedItem.ToString() + "-1.3k"] = ytemp;
                }
                //else
                //{
                //    Yaxix2.Add("");
                //    //myExport[comboBox2.SelectedItem.ToString() + "-1.3k"] = "";
                //}
                #endregion



                #region T1700

                T = 1700;


                CalcSolutionByDropDowns(T, xval);

                ytemp = 0;

                switch (comboBox2.SelectedItem.ToString())
                {
                    case "TSFC":
                        ytemp = solver.TSFC;
                        break;
                    case "Empuxo":
                        ytemp = solver.Empuxo;
                        break;
                    case "Nth":
                        ytemp = solver.Variables["Nth"];
                        break;
                    case "Nt":
                        ytemp = solver.Variables["Nt"];
                        break;

                    case "u sobre us":
                        ytemp = LocalDoubleParse(solver.Variables["u/us"].ToString());
                        break;

                }

                //if (!ytemp.Equals(double.NaN)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                //{

                //    myExport[comboBox2.SelectedItem.ToString() + "-1.7k"] = ytemp;
                //}
                //else
                //{
                //    myExport[comboBox2.SelectedItem.ToString() + "-1.7k"] = "";
                //}
                if (!ytemp.Equals(double.NaN) && !double.IsInfinity(ytemp)) // nesse caso acabou o ponto em que o grafico tem pontos validos
                {

                    Yaxix3.Add(ytemp);
                    //myExport[comboBox2.SelectedItem.ToString() + "-1.3k"] = ytemp;
                }
                //else
                //{
                //    Yaxix3.Add("");
                //    //myExport[comboBox2.SelectedItem.ToString() + "-1.3k"] = "";
                //}
                #endregion

                xval += delta;
            }

            string actualtype = "TURBOFAN";

            if (cbMotor.SelectedText.Equals("TurboJato"))
            {
                actualtype = "TURBOJATO";
            }
            else if (cbMotor.SelectedText.Equals("RamJet"))
            {
                actualtype = "RAMJET";
            }

            SaveExcel(AppDomain.CurrentDomain.BaseDirectory + comboBox2.SelectedItem.ToString() + "-" + actualtype + "MACH-" + textM.Text.ToString() + ".xls", comboBox1.SelectedItem.ToString(), comboBox2.SelectedItem.ToString() + "1.3k", comboBox2.SelectedItem.ToString() + "1.5k", comboBox2.SelectedItem.ToString() + "1.7k", Xaxis, Yaxix1, Yaxix2, Yaxix3);

            //myExport.ExportToFile(AppDomain.CurrentDomain.BaseDirectory + comboBox2.SelectedItem.ToString() + "-" + solver.actualtype.ToString() + "MACH-" + textM.Text.ToString() + ".csv");

        }

        private void comboBox3_SelectedIndexChanged(object sender, EventArgs e)
        {
            // Creates and initializes the CultureInfo which uses the international sort.
            CultureInfo myCIintl = new CultureInfo("en-US", false);
            if (!comboBox3.SelectedItem.ToString().Equals("Personalizado"))
            {
                textPa.Text = AltitudeSituation[LocalDoubleParse(comboBox3.SelectedItem.ToString())].Pa.ToString(myCIintl.NumberFormat);
                textPa.Enabled = false;
                textTa.Text = AltitudeSituation[LocalDoubleParse(comboBox3.SelectedItem.ToString())].Ta.ToString(myCIintl.NumberFormat);
                textTa.Enabled = false;
            }
            else
            {
                textPa.Enabled = true;
                textTa.Enabled = true;
            }
        }

        private void cbMotor_SelectedIndexChanged(object sender, EventArgs e)
        {
            textPrf.Enabled = true;
            textPrc.Enabled = true;
            textB.Enabled = true;
            tbNf.Enabled = true;
            tbYf.Enabled = true;
            tbNc.Enabled = true;
            tbYc.Enabled = true;
            tbNt.Enabled = true;
            tbYt.Enabled = true;
            tbNnf.Enabled = true;
            switch (cbMotor.SelectedItem.ToString())
            {
                case "TurboFan":
                    textPrf.Text = "1.5";
                    textPrc.Text = "20";
                    textB.Text = "5";
                    solver.actualtype = PropulsiveSolver.TYPE.TURBOFAN;


                    ImageBox1.Image = new Bitmap(SimuladorPropulsivo.Properties.Resources.TurboFan);
                    
                    break;
                case "TurboJato":
                    textPrf.Enabled = false;
                    textPrf.Text = "1";
                    textPrc.Text = "30";
                    textB.Enabled = false;
                    textB.Text = "0";
                    tbNf.Enabled = false;
                    tbYf.Enabled = false;
                    tbNnf.Enabled = false;
                    solver.actualtype = PropulsiveSolver.TYPE.TURBOJATO;
                    ImageBox1.Image = new Bitmap(SimuladorPropulsivo.Properties.Resources.TurboJato);
                    break;
                case "RamJet":
                    textPrf.Enabled = false;
                    textPrf.Text = "1";
                    textPrc.Enabled = false;
                    textPrc.Text = "1";
                    textB.Enabled = false;
                    textB.Text = "0";
                    tbNf.Enabled = false;
                    tbYf.Enabled = false;
                    tbNc.Enabled = false;
                    tbYc.Enabled = false;
                    tbNt.Enabled = false;
                    tbYt.Enabled = false;
                    tbNnf.Enabled = false;
                    solver.actualtype = PropulsiveSolver.TYPE.RAMJET;
                    ImageBox1.Image = new Bitmap(SimuladorPropulsivo.Properties.Resources.RamJet);
                    break;
            }
        }

        private void groupBox3_Enter(object sender, EventArgs e)
        {

        }

        private void cxAfterburn_CheckedChanged(object sender, EventArgs e)
        {
            if (cxAfterburn.Checked)
            {
                tbNab.Enabled = true;
                textTposqueima.Enabled = true;
            }
            else
            {
                tbNab.Enabled = false;
                textTposqueima.Enabled = false;
            }
        }

        private void tbNd_TextChanged(object sender, EventArgs e)
        {

        }











    }
}
