package com.example.sample_study;

import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;

import java.io.IOException;

/**
 * Created by Bruno on 09/09/2015.
 */
public interface ISerializable {

  abstract Object Parse(XmlPullParser parser) throws IOException, XmlPullParserException;




}
