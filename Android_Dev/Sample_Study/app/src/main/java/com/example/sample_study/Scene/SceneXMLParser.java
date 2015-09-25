package com.example.sample_study.Scene;

import android.content.Context;
import android.content.res.XmlResourceParser;
import android.renderscript.Element;
import android.util.Xml;

import com.example.sample_study.Camera.SimpleCamera;
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


                switch (nodename) {

                    case "camera":
                        SimpleCamera cam = new SimpleCamera();
                        cam.Parse(node);
                        scene.getWorld().setCamera(cam);

                        break;



                    case "object":

                        // if (nodename.equalsIgnoreCase("object"))
                    {

                        SimpleObject obj = new SimpleObject();
                        SimpleMaterial mat = new SimpleMaterial();
                        NodeList childs = node.getChildNodes();

                        for (int j = 0; j < childs.getLength(); j++) {
                            Node childnode = childs.item(j);
                            String childnodename = childnode.getNodeName();

                            switch (childnodename) {
                                case "id":


                                    obj.setName(childnode.getLastChild().getTextContent().trim());
                                    break;

                                case "collision":

                                    obj.Parse(childnode);
                                    obj.setMaterial(mat);

                                    break;

                                case "material":

                                    mat.Parse(childnode);
                                    obj.setMaterial(mat);

                                    break;
                            }
                        }

                        Obj.add(obj);
                    }
                    break;
                }
            }
        }
        scene.getWorld().AddObjectList(Obj);

            return scene;
    }









}
