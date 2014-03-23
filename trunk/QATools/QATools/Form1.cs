using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using Microsoft.Office.Interop.Excel;


namespace QATools
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }




        public void FixColumnHeight(float s)
        { 
        
        
        
        
        }

        private void Form1_Load(object sender, EventArgs e)
        {
        

            #region newExcel
            /*
            

            xlWorkSheet.Cells[6, 3] = "My Name";
            xlWorkSheet.Cells[6, 4] = "Ketan";
            xlWorkSheet.get_Range("d6", "g6").Merge(true);
            xlWorkSheet.get_Range("d6", "g6").BorderAround(Microsoft.Office.Interop.Excel.XlLineStyle.xlContinuous, Microsoft.Office.Interop.Excel.XlBorderWeight.xlMedium, Microsoft.Office.Interop.Excel.XlColorIndex.xlColorIndexAutomatic, Microsoft.Office.Interop.Excel.XlColorIndex.xlColorIndexAutomatic);

            

            xlWorkSheet.get_Range("a14", "l14").Merge(false);
            chartRange = xlWorkSheet.get_Range("a14", "l14");
            chartRange.FormulaR1C1 = "I am Heading";
            chartRange.HorizontalAlignment = 3;
            chartRange.BorderAround(true);


            xlWorkSheet.Cells.Font.Size = 8;
            xlWorkSheet.Cells.Font.Name = "Arial";


            xlWorkSheet.Cells[6, 4].HorizontalAlignment = Microsoft.Office.Interop.Excel.XlHAlign.xlHAlignLeft;
            
            
            xlWorkSheet.Rows[9].HorizontalAlignment = Microsoft.Office.Interop.Excel.XlHAlign.xlHAlignLeft;
            xlWorkSheet.Cells.VerticalAlignment = Microsoft.Office.Interop.Excel.XlVAlign.xlVAlignCenter;

            
            xlWorkSheet.Columns[1].ColumnWidth = 4.0;
            

            xlWorkSheet.Cells[1, 1].Interior.Color = Color.Red;

                       
            
            xlWorkBook.SaveAs("F:\\Teste\\excelfile.xls", Microsoft.Office.Interop.Excel.XlFileFormat.xlCSV,
 misValue, misValue, false, false, Microsoft.Office.Interop.Excel.XlSaveAsAccessMode.xlNoChange,
 misValue, misValue, misValue, misValue, misValue);

            xlWorkBook.Close(true, misValue, misValue);
            */
            #endregion
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Microsoft.Office.Interop.Excel.Application xlApp;
            Microsoft.Office.Interop.Excel.Workbook xlWorkBook;
            Microsoft.Office.Interop.Excel.Worksheet xlWorkSheet;
            Microsoft.Office.Interop.Excel.Range chartRange;
            object misValue = System.Reflection.Missing.Value;

            xlApp = new Microsoft.Office.Interop.Excel.Application();
            xlWorkBook = xlApp.Workbooks.Add(misValue);
            xlWorkSheet = (Microsoft.Office.Interop.Excel.Worksheet)xlWorkBook.Worksheets.get_Item(1);


            //open xls file            
            Workbook wb = xlApp.Workbooks.Open(textFileName.Text);
            Worksheet ws = (Microsoft.Office.Interop.Excel.Worksheet)wb.Worksheets.get_Item(1);
            Microsoft.Office.Interop.Excel.Range excelCell = (Microsoft.Office.Interop.Excel.Range)ws.UsedRange;//.get_Range("A1", "B4");

            //ws.Columns[1].ColumnWidth = textWidth.Text;

            for (int i = 1; i <=excelCell.Rows.Count; i++)
            {

                ws.Rows[i].EntireRow.AutoFit();
                float rh = (float)ws.Rows[i].RowHeight;
                float Fix = float.Parse(textHeight.Text);
                float rhFix = rh / Fix;
                int roundvalue = (int)Math.Ceiling(rhFix);

                float fixvalue = roundvalue * Fix;
                               
                
                
                ws.Rows[i].RowHeight = fixvalue;     
            }
            
            

            string savename = textFileName.Text.Replace(".xls","") + "fixed" + ".xls";
            wb.SaveAs(savename, Microsoft.Office.Interop.Excel.XlFileFormat.xlExcel7,
 misValue, misValue, false, false, Microsoft.Office.Interop.Excel.XlSaveAsAccessMode.xlNoChange,
 misValue, misValue, misValue, misValue, misValue);
            wb.Close();
        }
    }
}
