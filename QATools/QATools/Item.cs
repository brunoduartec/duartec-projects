using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Serialization;

namespace QATools
{
   public class Item
    {
         [XmlElement("label")]
       public string label;
         [XmlElement("value")]
       public string value;
    }
}
