package com.example.jumping_ball.Material;

import com.example.jumping_ball.IObject;
import com.example.jumping_ball.ISerializable;
import com.example.jumping_ball.IWorld;

public abstract class IMaterial implements ISerializable
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