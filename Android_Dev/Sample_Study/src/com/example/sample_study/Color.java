package com.example.sample_study;

public class Color {
	
	public enum COLORNAME
	{
		BLACK,
		WHITE,
		RED,
		BLUE,
		GREEN		
	};
	
	public static float[] enumtoColor(COLORNAME cc)
	{
		float[] color =  {10.0f, 10.0f, 10.0f,1.0f};
		
		switch (cc) {
		case BLACK:
			color = new float[]{0.0f,0.0f,0.0f,1.0f};
		break;

		case WHITE:
			color = new float[]{1.0f,1.0f,1.0f,1.0f};
		break;

			
		default:
			break;
		}
		
		return color;
		
	}
	
	
	
	float[] getColor()
	{
					
		float[] color =  {10.0f, 10.0f, 10.0f,1.0f};
		return color;
	}
	
	

}
