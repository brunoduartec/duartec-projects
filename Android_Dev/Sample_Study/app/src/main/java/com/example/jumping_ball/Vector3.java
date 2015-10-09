package com.example.jumping_ball;

import static android.util.FloatMath.sqrt;

public class Vector3
{
	private float magnitude;
	private float[] normalized;

	private float x;
	private float y;
	private float z;




	public  Vector3(float x, float y, float z)
	{
		this.x=x;
		this.y=y;
		this.z=z;
		normalized = new float[3];
	}
	
	
	public void Set(float x, float y, float z)
	{
		this.x=x;
		this.y=y;
		this.z=z;
	}
	
	public float[] Get()
	{
		float[] ret = new float[3];
		
		ret[0] = x;
		ret[1] = y;
		ret[2] = z;
		
		return ret;
	
	
	
	}
	
	public float getMagnitude()
	{
		magnitude =sqrt(x * x + y * y + z * z); 
		return magnitude;
	}
	
	public float getMagnitudeSquared()
	{
	
		return magnitude * magnitude;
	
	}
	
	
	
	public float[] getNormalized()
	{
		normalized[0] = x/magnitude;
		return normalized;
	
	}

	
	
    public Vector3 add(Vector3 other) {
        return new Vector3(x + other.x, y + other.y,z + other.z);
    }

    public Vector3 sub(Vector3 other) {
        return new Vector3(x - other.x, y - other.y,z - other.z);
    }

    public Vector3 mul(Vector3 other) {
        return new Vector3(x * other.x, y * other.y,z * other.z);
    }

	
	// When the vectors are interpreted as points, 
	// you'll often need these:
	// (Updated based on the comments: This is 
	// basically the length of the difference of
	// the two vectors)
	public float distanceSquared(Vector3 other) {
		float dx = this.x - other.x;
		float dy = this.y - other.y;
		float dz = this.z - other.z;
		return dx*dx+dy*dy+dz*dz;
	}
	public float distance(Vector3 other) {
		return sqrt(distanceSquared(other));
	}

	

}