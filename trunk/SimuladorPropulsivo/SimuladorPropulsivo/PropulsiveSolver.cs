using System;
using System.Collections.Generic;
using System.Text;

namespace SimuladorPropulsivo
{
    public class PropulsiveSolver
    {

        private Dictionary<string, double> variables = new Dictionary<string, double>();


        double empuxo;

        public double Empuxo
        {
            get { return empuxo; }
            set { empuxo = value; }
        }
        double tSFC;

        public double TSFC
        {
            get { return tSFC; }
            set { tSFC = value; }
        }

        public enum TYPE
        {
            TURBOJATO,
            TURBOFAN,
            RAMJET

        }

        public TYPE actualtype;

        #region Initial Entries
        double gamad;
        double gamaf;
        double gamac;
        double gamat;
        double gaman;


        double Nd;
        double Nc;
        double Nb;
        double Nt;
        double Nn;
        double Nab;
        double Nf;
        double Nfh;


        #endregion

        double maxP;

        public double MaxP
        {
            get { return maxP; }
            set { maxP = value; }
        }
        double maxT;

        public double MaxT
        {
            get { return maxT; }
            set { maxT = value; }
        }


        public Dictionary<string, double> Variables
        {
            get { return variables; }
            set { variables = value; }
        }
        public void InitGamas(double gamad, double gamaf, double gamac, double gamat, double gaman)
        {
            this.gamad = gamad;
            this.gamaf = gamaf;
            this.gamac = gamac;
            this.gamat = gamat;
            this.gaman = gaman;
        }

        public void InitGains(double Nd, double Nc, double Nb, double Nt, double Nn, double Nab, double Nf, double Nfh)
        {


            this.Nd = Nd;
            this.Nc = Nc;
            this.Nb = Nb;
            this.Nt = Nt;
            this.Nn = Nn;
            this.Nab = Nab;
            this.Nf = Nf;
            this.Nfh = Nfh;


        }
        bool hasfan;
        bool afterburn;


        public void SolveSystem(bool hasfan, bool afterburn, double M, double Pa, double Ta, double PC, double R, double Cp, double T04, double T06, double Prf, double Prc, double B)
        {
            
            this.hasfan = hasfan;
            this.afterburn = afterburn;
            variables.Clear();
            variables.Add("TA", Ta);
            variables.Add("PA", Pa);

            double T02 = Ta * (1 + (gamad - 1) / 2 * Math.Pow(M, 2));
            
            double P02 = Pa * Math.Pow((1 + Nd * (T02 / Ta - 1)), (gamad / (gamad - 1)));


            variables.Add("T02", T02);
            variables.Add("P02", P02);

            double T08 = T02 * (1 + (1 / Nf) * (Math.Pow(Prf, ((gamaf - 1) / gamaf)) - 1));
            double P08 = P02 * Prf;

            variables.Add("T08", T08);
            variables.Add("P08", P08);

            double Usf = Math.Sqrt(2 * Nfh * (gamaf / (gamaf - 1)) * R * T08 * (1 - Math.Pow((Pa / P08), ((gamaf - 1) / gamaf))));
            variables.Add("Usf", Usf);


            double P03;
            double T03;

            if (hasfan)
            {
                
                P03 = P08 * Prc;
                T03 = T08 * (1 + (1 / Nc) * (Math.Pow(Prc, ((gamac - 1) / gamac)) - 1));
            }
            else
            {
                B = 0;
                P03 = P02 * Prc;
                T03 = T02 * (1 + (1 / Nc) * (Math.Pow(Prc, ((gamac - 1) / gamac)) - 1));
            }

            variables.Add("T03", T03);
            variables.Add("P03", P03);


            maxP = P03;


            double f1 = (T04 / T03 - 1) / ((Nb * PC) / (Cp * T03) - T04 / T03);
            double P04 = P03;

            variables.Add("T04", T04);
            variables.Add("P04", P04);

            double T05 = T04 - (T03 - T02) - B * (T08 - T02);
            double P05 = P04 * Math.Pow((1 - (1 / Nt) * (1 - T05 / T04)), (gamat / (gamat - 1)));


            variables.Add("T05", T05);
            variables.Add("P05", P05);

            double f2 = (T06 / T05 - 1) / ((Nab * PC) / (Cp * T05) - T06 / T05);
            double P06 = P05;

            variables.Add("T06", T06);
            variables.Add("P06", P06);


            maxT = T06;
            double f;


            if (afterburn)
            {
                f = f1 + f2;
            }
            else
            {
                f = f1;
            }
            double us = Math.Sqrt(2 * Nn * (gaman / (gaman - 1)) * R * T05 * (1 - Math.Pow((Pa / P05), ((gaman - 1) / gaman))));

            double u = M * Math.Sqrt(gamad * R * Ta);

            Empuxo = ((1 + f) * us + B * Usf - (B + 1) * u); // considerando kilonewtons
            TSFC = f / Empuxo * 1000;


            double uUs = u / us;
            variables.Add("u/us", uUs);


            double Nth = ((1+f)*(Math.Pow(us,2)/2)  - Math.Pow(u,2)/2 )/(f*PC);
            
            
            variables.Add("Nth", Nth);

            double Ntcalc = u / (tSFC*PC);
            variables.Add("Nt", Ntcalc);

            
        }



    }
}
