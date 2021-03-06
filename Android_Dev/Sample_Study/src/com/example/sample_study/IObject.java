package com.example.sample_study;

import android.opengl.Matrix;

import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Model.IModel;


public abstract class IObject
{

	
	float[] localTransformation = new float[16];
	float position[] = new float[3];
	float rotation[] = new float[3];
	float scale[] = new float[3];
	private IMaterial material;
	private IModel model;
	boolean Enabled=true;
	boolean Visible=true;
	public String name=null;
	static int ID=0;
	int localID=-1;

	
public float[] getPosition()
{
	return position;
}

public  void setPosition(float[] pos)
{
	 this.position = pos;
}
 

public float[] getRotation()
{
	return this.rotation;
}



public void setRotation(float[] rot)
{
	this.rotation=rot;	
}

public float[] getScale()
{
	return this.scale;	
}



public void setScale(float[] scale)
{
	this.scale = scale;	
}



public float[] getLocalTransformation()
{
	
	 float[] localTransformation= new float[16];
	 float[] position = getPosition();
	 
	Matrix.setIdentityM(localTransformation, 0); // initialize to identity matrix
	 Matrix.translateM(localTransformation, 0, position[0], position[1],position[2]); // Multiply by translation to the position

	return localTransformation;
	
}

public void setLocalTransformation(float[] trans)
{
	this.localTransformation = trans;

}

public boolean getEnabled()
{
	
	return this.Enabled;

}

public boolean getVisible()
{
	
	return this.Visible;

}




public String getName()
{
return name;	
}

public int getID()
{
	return ID;	
}
public abstract void Draw(IWorld world);public abstract void Update();


public IMaterial getMaterial()
{
	return material;
}

public IModel getModel()
{
	return model;
}



}