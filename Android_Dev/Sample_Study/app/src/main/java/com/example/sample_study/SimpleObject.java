package com.example.sample_study;

import android.opengl.Matrix;

import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Material.SimpleMaterial;
import com.example.sample_study.Model.BoxModel;
import com.example.sample_study.Model.IModel;
import com.example.sample_study.Model.SimpleModel;

import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;

import java.io.IOException;


public class SimpleObject extends IObject
{
	// used to xmlparse
	public SimpleObject()
	{

	}

	public SimpleObject(IMaterial mat, IModel mod, String nm)
	{
		this.name = nm;
		//this.material = mat;
		//this.model = mod;
		setMaterial(mat);
		setModel(mod);
		localID = ID++;		
		
		 
		
	}

	@Override
	public void Draw(IWorld world) {
		// TODO Auto-generated method stub

		getMaterial().Draw(this,world);
	}

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		
		 Matrix.setIdentityM(localTransformation, 0); // initialize to identity matrix
		 Matrix.translateM(localTransformation, 0, position[0], position[1], position[2]); // Multiply by translation to the position

	}

	@Override
	public float[] getPosition() {
		// TODO Auto-generated method stub
		return position;
	}

	
	/*
	@Override
	public float[] getLocalTransformation() {
		// TODO Auto-generated method stub
		return localTransformation;
	}
*/
	@Override
	public boolean getEnabled() {
		// TODO Auto-generated method stub
		return Enabled;
	}

	@Override
	public boolean getVisible() {
		// TODO Auto-generated method stub
		return Visible;
	}

	@Override
	public String getName() {
		// TODO Auto-generated method stub
		return name;
	}

	@Override
	public int getID() {
		// TODO Auto-generated method stub
		return localID;
	}


	@Override
	public void setLocalTransformation(float[] trans) {
		// TODO Auto-generated method stub
		this.localTransformation = trans;
	}

	@Override
	public void setPosition(float[] pos) {
		// TODO Auto-generated method stub
	this.position = pos;	
	}

	@Override
	public float[] getRotation() {
		// TODO Auto-generated method stub
		return rotation;
	}

	@Override
	public void setRotation(float[] rot) {
		// TODO Auto-generated method stub
		rotation = rot;
	}

	@Override
	public float[] getScale() {
		// TODO Auto-generated method stub
		return scale;
	}

	@Override
	public void setScale(float[] scale) {
		// TODO Auto-generated method stub
		this.scale = scale;
	}


	@Override
	public Object Parse(XmlPullParser parser) throws IOException, XmlPullParserException {


		parser.require(XmlPullParser.START_TAG,null,"object");

	float width,height,length;

		width=height=length=0;

//parser.next();


        //branching out when the close node is reached
		while (parser.next()!= XmlPullParser.END_DOCUMENT && !parser.getName().equalsIgnoreCase("object") ){

			if (parser.getEventType() != XmlPullParser.START_TAG) {
                parser.next();
                continue;
            }


            String nodename = parser.getName();



            switch (nodename)
			{
				case "id":
					name=Utils.readText(parser);
					parser.require(XmlPullParser.END_TAG,null,"id");
					break;
				case "collision":


                    String modeltype = (String) parser.getAttributeValue(0);
                    float pp[] = new float[3];
                    parser.next();

                    while (  !parser.getName().equalsIgnoreCase("collision") )
                    {
                            //to retrieve the x,y,z
                        if (parser.getEventType() != XmlPullParser.START_TAG) {
                            parser.next();
                            continue;
                        }

                        switch(parser.getName()) {

                            case "position":

                                parser.next();
                                String vv = Utils.readText(parser);
                                pp[0] = Float.parseFloat(vv);
                                parser.next();
                                pp[1] = Float.parseFloat(Utils.readText(parser));
                                parser.next();
                                pp[2] = Float.parseFloat(Utils.readText(parser));
                                setPosition(pp);
                                parser.next();

                            break;

                            case "width":
                                width = Float.parseFloat(Utils.readText(parser));
                                parser.next();
                                break;

                            case "height":
                                height = Float.parseFloat(Utils.readText(parser));
                                parser.next();
                                break;

                            case "length":
                                length = Float.parseFloat(Utils.readText(parser));

                                parser.next();

								setModel(new BoxModel(width));
                                break;
                        }

                    }

					break;

				case "material":


					String materialtype = (String) parser.getAttributeValue(0);
					IMaterial mat = new SimpleMaterial();



					switch (materialtype)
					{

						case "SimpleMaterial":
							mat = (SimpleMaterial)mat.Parse(parser);
                            parser.next();
							break;
					}




					break;

			}
			
			//if (nodename.equals("id")){
				
			//}else
				//Utils.skip(parser);
            parser.next();
		}



	return this;

	}
}