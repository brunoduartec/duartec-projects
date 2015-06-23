package com.example.sample_study;

import android.opengl.Matrix;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Model.IModel;


public class SimpleObject implements IObject
{
	private IMaterial material;
	private IModel model;
	
	float position[] = new float[3];
	float rotation[] = new float[3];
	float scale[] = new float[3];
	
	float[] localTransformation = new float[16];
	boolean Enabled=true;
	boolean Visible=true;

	public String name=null;
	//The object must be unique
	static int ID=0;
	
	int localID=-1;

	
	
	
	public SimpleObject(IMaterial mat, IModel mod, String nm)
	{
		this.name = nm;
		this.material = mat;
		this.model = mod;
		
		localID = ID++;		
		
		 
		
	}

	@Override
	public void Draw(ICamera cam) {
		// TODO Auto-generated method stub
	material.Draw(this,cam);	
	}

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		
		 Matrix.setIdentityM(localTransformation, 0); // initialize to identity matrix
		 Matrix.translateM(localTransformation, 0, position[0], position[1],position[2]); // Multiply by translation to the position

	}

	@Override
	public float[] getPosition() {
		// TODO Auto-generated method stub
		return position;
	}

	@Override
	public float[] getLocalTransformation() {
		// TODO Auto-generated method stub
		return localTransformation;
	}

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
	public IMaterial getMaterial() {
		// TODO Auto-generated method stub
		return material;
	}

	@Override
	public IModel getModel() {
		// TODO Auto-generated method stub
		return model;
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



}