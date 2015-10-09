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
		this.setX(x);
		this.setY(y);
		this.setZ(z);
		normalized = new float[3];
	}
	
	
	public void Set(float x, float y, float z)
	{
		this.setX(x);
		this.setY(y);
		this.setZ(z);
	}
	
	public float[] Get()
	{
		float[] ret = new float[3];
		
		ret[0] = getX();
		ret[1] = getY();
		ret[2] = getZ();
		
		return ret;
	
	
	
	}
	
	public float getMagnitude()
	{
		magnitude =sqrt(getX() * getX() + getY() * getY() + getZ() * getZ());
		return magnitude;
	}
	
	public float getMagnitudeSquared()
	{
	
		return magnitude * magnitude;
	
	}
	
	
	
	public float[] getNormalized()
	{
		normalized[0] = getX() /magnitude;
		return normalized;
	
	}

	
	
    public Vector3 add(Vector3 other) {
        return new Vector3(getX() + other.getX(), getY() + other.getY(), getZ() + other.getZ());
    }

    public Vector3 sub(Vector3 other) {
        return new Vector3(getX() - other.getX(), getY() - other.getY(), getZ() - other.getZ());
    }

    public Vector3 mul(Vector3 other) {
        return new Vector3(getX() * other.getX(), getY() * other.getY(), getZ() * other.getZ());
    }

	
	// When the vectors are interpreted as points, 
	// you'll often need these:
	// (Updated based on the comments: This is 
	// basically the length of the difference of
	// the two vectors)
	public float distanceSquared(Vector3 other) {
		float dx = this.getX() - other.getX();
		float dy = this.getY() - other.getY();
		float dz = this.getZ() - other.getZ();
		return dx*dx+dy*dy+dz*dz;
	}
	public float distance(Vector3 other) {
		return sqrt(distanceSquared(other));
	}


	public float getX() {
		return x;
	}

	public void setX(float x) {
		this.x = x;
	}

	public float getY() {
		return y;
	}

	public void setY(float y) {
		this.y = y;
	}

	public float getZ() {
		return z;
	}

	public void setZ(float z) {
		this.z = z;
	}
}