package com.example.sample_study.Scene;

import android.content.Context;
import android.content.res.XmlResourceParser;
import android.renderscript.Element;
import android.util.Xml;

import com.example.sample_study.GraphicFactory;

import com.example.sample_study.IObject;
import com.example.sample_study.Material.SimpleMaterial;
import com.example.sample_study.Model.BoxModel;
import com.example.sample_study.Model.IModel;
import com.example.sample_study.Model.SimpleModel;
import com.example.sample_study.SimpleObject;
import com.example.sample_study.Utils;

import org.w3c.dom.Document;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;
import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;

import java.io.IOException;
import java.io.InputStream;
import java.util.ArrayList;
import java.util.List;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

/**
 * Created by Bruno on 09/09/2015.
 */
public class SceneXMLParser {

    private static final String ns =null;


    public IScene DOMparseScene(int id, IScene scene) {

        Context localContext = GraphicFactory.getInstance().getGraphicContext();
        // Get the DOM Builder Factory
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();

        //Get the DOM Builder
        DocumentBuilder builder = null;
        Document document = null;
        try {
            builder = factory.newDocumentBuilder();
            document = builder.parse(localContext.getResources().getAssets().open("xml/scene01.xml"));


        } catch (Exception e) {
            e.printStackTrace();
        }

        List<IObject> Obj = new ArrayList<>();

        NodeList nodeList = document.getDocumentElement().getChildNodes();

        for (int i = 0; i < nodeList.getLength(); i++) {
            Node node = nodeList.item(i);
            if (node instanceof org.w3c.dom.Element)
            {
               String nodename =  node.getNodeName();
                if (nodename.equalsIgnoreCase("object"))
                {

                    SimpleObject obj = new SimpleObject();

                    NodeList childs = node.getChildNodes();

                    for (int j = 0; j < childs.getLength(); j++) {
                        Node childnode = childs.item(j);
                        String childnodename =  childnode.getNodeName();

                        switch (childnodename){
                            case "id":


                               obj.setName(childnode.getLastChild().getTextContent().trim());
                                break;

                            case "collision":

                                NodeList collisionchildnodeList = childnode.getChildNodes();

                                for (int w = 0; w < collisionchildnodeList.getLength(); w++) {
                                    Node collisionchildnode = collisionchildnodeList.item(w);
                                    String collisionchildnodename = collisionchildnode.getNodeName();



                                switch(collisionchildnodename) {
                                    case "position": {
                                       // Node positionnode = collisionchildnode.getChildNodes().item(1);
                                        NodeList posnodes = collisionchildnode.getChildNodes();
                                        float pp[] = new float[3];

                                        for (int k = 0; k < posnodes.getLength(); k++) {

                                            if (posnodes.item(k) instanceof org.w3c.dom.Element) {

                                                switch (posnodes.item(k).getNodeName()) {
                                                    case "x":


                                                        pp[0] = Float.parseFloat(posnodes.item(k).getLastChild().getTextContent().trim());
                                                        break;
                                                    case "y":
                                                        pp[1] = Float.parseFloat(posnodes.item(k).getLastChild().getTextContent().trim());
                                                        break;
                                                    case "z":
                                                        pp[2] = Float.parseFloat(posnodes.item(k).getLastChild().getTextContent().trim());
                                                        break;

                                                }
                                            }
                                        }
                                        obj.setPosition(pp);
                                    }
                                    break;

                                    case "width":
                                        float width = Float.parseFloat(collisionchildnode.getLastChild().getTextContent().trim());
                                        IModel m1 = new BoxModel(width);
                                        obj.setModel(m1);
                                        break;
                                }
                        }



                                break;

                            case "material":
                                SimpleMaterial mat = new SimpleMaterial();
                                obj.setMaterial(mat);
                                Obj.add(obj);
                                break;



                        }


                    }




                }




            }


        }
        scene.getWorld().AddObjectList(Obj);

            return scene;
    }




    public IScene parseScene(int id, IScene scene)
    {

        Context localContext = GraphicFactory.getInstance().getGraphicContext();
        XmlResourceParser xpp = localContext.getResources().getXml(id);

        try {
           scene.getWorld().AddObjectList(readObjects(xpp));


        } catch (XmlPullParserException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }
    return scene;

    }


    public List parse(InputStream in) throws XmlPullParserException, IOException {

        try {
            XmlPullParser parser = Xml.newPullParser();
            parser.setFeature(XmlPullParser.FEATURE_PROCESS_NAMESPACES,false);
            parser.setInput(in,null);
            parser.nextTag();
            return readObjects(parser);

        }finally {
            in.close();
        }

    }

    public List readObjects(XmlPullParser parser) throws XmlPullParserException, IOException{

        List objects = new ArrayList();

       // parser.require(XmlPullParser.START_TAG,ns,"scene");

        parser.next();
        String vlaus = parser.getName();


        while (parser.next()!= XmlPullParser.END_TAG){
            if ( parser.getEventType()!= XmlPullParser.START_TAG)
                continue;
            String name = parser.getName();

            if (name.equals("object")){

                SimpleObject obj = new SimpleObject();
                objects.add(obj.Parse(parser));
            }
            //else
              //  Utils.skip(parser);
        }




        return objects;
    }




}
