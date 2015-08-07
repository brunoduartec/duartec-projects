package com.example.sample_study.Material;

import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.Camera.ICamera;

public abstract class IMaterial
{
	
	
	int vertexShaderHandle=-1;
	int fragmentShaderHandle=-1;
	int mProgram;
	
	public int getVertexShader() {
		// TODO Auto-generated method stub
		return vertexShaderHandle;
	}
	
	public int getFragmentShader() {
		// TODO Auto-generated method stub
		return fragmentShaderHandle;
	}
public abstract void Draw(IObject obj, IWorld world);




}