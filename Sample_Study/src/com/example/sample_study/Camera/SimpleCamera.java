package com.example.sample_study.Camera;

import android.opengl.Matrix;


public class SimpleCamera implements ICamera {

	private float fov;
	private float nearPlane;
	private float farPlane;
	private float[] position;
	private float[] target;
	private final float[] mViewMatrix = new float[16];
	private final float[] mProjectionMatrix = new float[16];
	private final float[] mViewProjectionMatrix = new float[16];
	
	private String name;
	private float _aspectRatio = 4f / 3f;

	public SimpleCamera(String name,float FOV,float NearPlane, float FarPlane, float[] position, float[] target)
	{
		this.name=name;
		this.fov=FOV;
		this.nearPlane = NearPlane;
		this.farPlane = FarPlane;
		this.position = position;
		this.target = target;
		
		
		CalcViewMatrix();
		CalcProjectionMatrix();
		CalcViewProjectionMatrix();

	}
	
	void CalcViewProjectionMatrix()
	{
		Matrix.multiplyMM(mViewProjectionMatrix, 0, mProjectionMatrix, 0, mViewMatrix, 0);
		
	}
	
	void CalcViewMatrix()
	{
		 Matrix.setLookAtM(mViewMatrix, 0 ,position[0], position[1], position[2], target[0],target[1],target[2], 0f, 1.0f, 0.0f);
		
	}
	void CalcProjectionMatrix()
	{
		Matrix.orthoM(mProjectionMatrix, 0, -_aspectRatio, _aspectRatio, -1.0f, 1.0f, nearPlane,farPlane);
		
	}
	
	@Override
	public float getFOV() {
		// TODO Auto-generated method stub
		return fov;
	}

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		CalcViewMatrix();
		CalcProjectionMatrix();
		CalcViewProjectionMatrix();
	}

	@Override
	public float getNearPlane() {
		// TODO Auto-generated method stub
		return nearPlane;
	}

	@Override
	public float getFarPlane() {
		// TODO Auto-generated method stub
		return farPlane;
	}

	@Override
	public float[] getPosition() {
		// TODO Auto-generated method stub
		return position;
	}

	@Override
	public float[] getTarget() {
		// TODO Auto-generated method stub
		return target;
	}

	@Override
	public String getName() {
		// TODO Auto-generated method stub
		return name;
	}


	@Override
	public void setFOV(float f) {
		// TODO Auto-generated method stub
		this.fov = f;
	
	}

	@Override
	public void setNearPlane(float n) {
		// TODO Auto-generated method stub
		this.nearPlane = n;
		
	}

	@Override
	public void setFarPlane(float f) {
		// TODO Auto-generated method stub
		this.farPlane = f;
		
	}

	@Override
	public void setPosition(float[] p) {
		// TODO Auto-generated method stub
		this.position = p;
	
		
	}

	@Override
	public void setTarget(float[] t) {
		// TODO Auto-generated method stub
		this.target = t;
	
	}

	@Override
	public void setName(String name) {
		// TODO Auto-generated method stub
		this.name=name;
	}

	@Override
	public float[] getViewMatrix() {
		
		return mViewMatrix;
	}

	@Override
	public float[] getProjectionMatrix() {
		// TODO Auto-generated method stub
		
		 
		return mProjectionMatrix;
	}

	@Override
	public float[] getViewProjectionMatrix() {
		// TODO Auto-generated method stub
		return mViewProjectionMatrix;
	}

}
