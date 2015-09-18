package com.example.sample_study;

import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;

import java.io.IOException;

/**
 * Created by Bruno on 09/09/2015.
 */
public interface ISerializable {

  abstract Object Parse(Node childnode);




}
