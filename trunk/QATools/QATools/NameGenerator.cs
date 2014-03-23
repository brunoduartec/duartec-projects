using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Xml;
using System.IO;
using System.Xml.Serialization;

namespace QATools
{
    public partial class NameGenerator : Form
    {

        List<Element> EList = new List<Element>();

        public NameGenerator()
        {
            InitializeComponent();
        }

        private void NameGenerator_Load(object sender, EventArgs e)
        {
            LoadXML();


        
            int d = 1;
            foreach (var item in EList)
            {
                Label lb1 = new Label();
                lb1.Text = item.name;
                lb1.Width = 90;
                lb1.Location = new Point(0, 25 * d);
                ComboBox cb1 = new ComboBox();
                cb1.Location = new Point(100, 25*d);

                foreach (Item items in item.items)
                {
                    cb1.Items.Add(items.value);
                }


                this.Controls.Add(lb1);
                this.Controls.Add(cb1);
                d++;
            }
           

          
        }



        public void ParseXML()
        {
            string path = @"F:\Projects\duartec-projects\QATools\QATools\plugin\NamePatterns.xml";

            using (StreamReader reader = new StreamReader(path))
            {
                XmlSerializer serializer = new XmlSerializer(typeof(Element));
                Element school = (Element)serializer.Deserialize(reader);
            }

        }
        public void LoadXML()
        {

            XmlDocument doc = new XmlDocument();
            doc.Load(@"F:\Projects\duartec-projects\QATools\QATools\plugin\NamePatterns.xml");

            XmlNodeList nodes = doc.DocumentElement.SelectNodes("/elements/element");

            

            foreach (XmlNode node in nodes)
            {
                Element el = new Element();

                el.name = node.SelectSingleNode("name").InnerText;
                el.id = node.SelectSingleNode("id").InnerText;
                el.type = node.SelectSingleNode("type").InnerText;


                foreach (XmlNode item in node.SelectNodes("items/item"))
                {
                    Item it = new Item();

                    it.label = item.Attributes[0].Value;
                    it.value = item.Attributes[1].Value;
                    el.items.Add(it);
                }

                //book.author = node.SelectSingleNode("author").InnerText;
                //book.title = node.SelectSingleNode("title").InnerText;
                //book.id = node.Attributes["id"].Value;
                EList.Add(el);
                //books.Add(book);
            }

        }
    }
}
