package com.example.sample_study.Light;

import com.example.sample_study.IObject;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Model.IModel;

public abstract class ILight extends IObject
{
	
	private int Intensity;
	private float[] color = new float[4];
	
	
	private float[] getColor()
	{
		
		return this.color;
	}
	private void setColor(float[] color)
	{
		
		this.color = color;
		
	}
	
	
	
	
	
	int getIntensity()
	{
		return this.Intensity;
	}
	void setIntensity(int intens)
	{
		this.Intensity = intens;
	}
	





}