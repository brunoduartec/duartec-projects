package com.example.jumping_ball.Light;

import com.example.jumping_ball.IObject;

public abstract class ILight extends IObject
{
	
	private int Intensity;
	private float[] color = new float[4];
	
	
	public float[] getColor()
	{
		
		return this.color;
	}
	public void setColor(float[] color)
	{
		
		this.color = color;
		
	}
	
	
	
	
	
	public int getIntensity()
	{
		return this.Intensity;
	}
	public void setIntensity(int intens)
	{
		this.Intensity = intens;
	}
	





}