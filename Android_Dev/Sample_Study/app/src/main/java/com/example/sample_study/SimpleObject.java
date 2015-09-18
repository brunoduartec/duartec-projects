package com.example.sample_study;

import android.opengl.Matrix;

import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Model.BoxModel;
import com.example.sample_study.Model.IModel;

import org.w3c.dom.Node;
import org.w3c.dom.NodeList;


public class SimpleObject extends IObject
{
	// used to xmlparse
	public SimpleObject()
	{
		localID = ID++;
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

		getMaterial().Draw(this, world);
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
	public Object Parse(Node childnode) {




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
                                        this.setPosition(pp);
                                    }
                                    break;

                                    case "scale": {
                                        // Node positionnode = collisionchildnode.getChildNodes().item(1);
                                        NodeList scalenodes = collisionchildnode.getChildNodes();
                                        float pp[] = new float[3];

                                        for (int k = 0; k < scalenodes.getLength(); k++) {

                                            if (scalenodes.item(k) instanceof org.w3c.dom.Element) {

                                                switch (scalenodes.item(k).getNodeName()) {
                                                    case "x":
                                                        pp[0] = Float.parseFloat(scalenodes.item(k).getLastChild().getTextContent().trim());
                                                        break;
                                                    case "y":
                                                        pp[1] = Float.parseFloat(scalenodes.item(k).getLastChild().getTextContent().trim());
                                                        break;
                                                    case "z":
                                                        pp[2] = Float.parseFloat(scalenodes.item(k).getLastChild().getTextContent().trim());
                                                        break;

                                                }
                                            }
                                        }
                                        this.setScale(pp);

                                        IModel m1 = new BoxModel(pp[0]);
                                        this.setModel(m1);

                                    }
                                    break;


                                }
                        }





		return this;
	}
}