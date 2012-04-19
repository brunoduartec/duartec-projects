//============================================================================
//ZedGraph demo code
//The code contained in this file (only) is released into the public domain, so you
//can copy it into your project without any license encumbrance.  Note that
//the actual ZedGraph library code is licensed under the LGPL, which is not
//public domain.
//
//This file is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
//=============================================================================

using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using ZedGraph;

namespace SimuladorPropulsivo
{
	public partial class Form1 : Form
	{
        private PointPairList listT1;
        private PointPairList listT2;
        private PointPairList listT3;
        private int xmin;
        private int xmax;
        private string xTitle;
        private string yTitle;
        private string Title;
        private LineItem myCurve;
        private LineItem myCurve2;
        private LineItem myCurve3;

		public Form1()
		{
			InitializeComponent();


            listT1 = new PointPairList();
            listT2 = new PointPairList();
            listT3 = new PointPairList();
		}

        public void Config(int xmin, int xmax,string Title,string Xtitle,string Ytitle)
        {

            this.xmin = xmin;
            this.xmax = xmax;
            this.xTitle = Xtitle;
            this.yTitle = Ytitle;
            this.Title = Title;
        
        }

        public void SetValuesT1(double[] x, double[] y)
        {

            for (int i = 0; i <y.Length ; i++)
            {
                listT1.Add(x[i], y[i]);
            }
            
          
        
        
        }
        public void SetValuesT2(double[] x, double[] y)
        {

            for (int i = 0; i < y.Length; i++)
            {
                listT2.Add(x[i], y[i]);
            }



        }

        /// <summary>
        /// Sets the values t3.
        /// </summary>
        /// <param name="x">The x.</param>
        /// <param name="y">The y.</param>
        public void SetValuesT3(double[] x, double[] y)
        {

            for (int i = 0; i < y.Length; i++)
            {
                listT3.Add(x[i], y[i]);
            }



        }




        /// <summary>
        /// Handles the Load event of the Form1 control.
        /// </summary>
        /// <param name="sender">The source of the event.</param>
        /// <param name="e">The <see cref="System.EventArgs"/> instance containing the event data.</param>
		private void Form1_Load( object sender, EventArgs e )
		{
			// Get a reference to the GraphPane instance in the ZedGraphControl
			GraphPane myPane = zg1.GraphPane;

			// Set the titles and axis labels
			myPane.Title.Text = Title;
			myPane.XAxis.Title.Text = xTitle;
			myPane.YAxis.Title.Text = yTitle;
			

			// Make up some data points based on the Sine function



            if (myCurve == null)
            {
                // Generate a red curve with diamond symbols, and "Alpha" in the legend
                 myCurve = myPane.AddCurve("1.3k", listT1, Color.Red, SymbolType.None);

                // Generate a red curve with diamond symbols, and "Alpha" in the legend
                 myCurve2 = myPane.AddCurve("1.5k", listT2, Color.Green, SymbolType.None);

                // Generate a red curve with diamond symbols, and "Alpha" in the legend
                 myCurve3 = myPane.AddCurve("1.7k", listT3, Color.Blue, SymbolType.None); 
            }
            else
            {
                myCurve.Clear();
                myCurve2.Clear();
                myCurve3.Clear();
                myCurve.Points = listT1;
                myCurve2.Points = listT2;
                myCurve3.Points = listT3;
            }
         


			// Show the x axis grid
			myPane.XAxis.MajorGrid.IsVisible = true;

			// turn off the opposite tics so the Y tics don't show up on the Y2 axis
			myPane.YAxis.MajorTic.IsOpposite = false;
			myPane.YAxis.MinorTic.IsOpposite = false;
			// Don't display the Y zero line
			myPane.YAxis.MajorGrid.IsZeroLine = false;
			// Align the Y axis labels so they are flush to the axis
			myPane.YAxis.Scale.Align = AlignP.Inside;
			// Manually set the axis range
      
            
            myPane.XAxis.Scale.Min = xmin;
            myPane.XAxis.Scale.Max = xmax;

			// Size the control to fit the window
			SetSize();

			// Tell ZedGraph to calculate the axis ranges
			// Note that you MUST call this after enabling IsAutoScrollRange, since AxisChange() sets
			// up the proper scrolling parameters
			zg1.AxisChange();
			// Make sure the Graph gets redrawn
			zg1.Invalidate();
		}

		/// <summary>
		/// On resize action, resize the ZedGraphControl to fill most of the Form, with a small
		/// margin around the outside
		/// </summary>
		private void Form1_Resize( object sender, EventArgs e )
		{
			SetSize();
		}

		private void SetSize()
		{
			zg1.Location = new Point( 10, 10 );
			// Leave a small margin around the outside of the control
			zg1.Size = new Size( this.ClientRectangle.Width - 20,
					this.ClientRectangle.Height - 20 );
		}

	

	}
}