using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml.Serialization;

namespace QATools
{
    [XmlRoot("Element")]
    public class Element
    {
        [XmlElement("name")]
        public string name;
        [XmlElement("id")]
        public string id;
        [XmlElement("type")]
        public string type;
        [XmlElement("Item", typeof(Item))]
        public List<Item> items = new List<Item>();

    }
}
