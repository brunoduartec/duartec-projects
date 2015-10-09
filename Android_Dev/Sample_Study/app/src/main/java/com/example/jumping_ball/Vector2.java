package com.example.jumping_ball;

import static android.util.FloatMath.sqrt;

public class Vector2
{
	private float magnitude;
	private float[] normalized;

	private float x;
	private float y;





	public Vector2(float x, float y)
	{
		this.x=x;
		this.y=y;

		normalized = new float[2];
	}
	
	
	public void Set(float x, float y)
	{
		this.x=x;
		this.y=y;

	}
	
	public float[] Get()
	{
		float[] ret = new float[2];
		
		ret[0] = x;
		ret[1] = y;

		
		return ret;
	
	
	
	}
	
	public float getMagnitude()
	{
		magnitude =sqrt(x * x + y * y );
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

	
	
    public Vector2 add(Vector2 other) {
        return new Vector2(x + other.x, y + other.y);
    }

    public Vector2 sub(Vector2 other) {
        return new Vector2(x - other.x, y - other.y);
    }

    public Vector2 mul(Vector2 other) {
        return new Vector2(x * other.x, y * other.y);
    }

	
	// When the vectors are interpreted as points, 
	// you'll often need these:
	// (Updated based on the comments: This is 
	// basically the length of the difference of
	// the two vectors)
	public float distanceSquared(Vector2 other) {
		float dx = this.x - other.x;
		float dy = this.y - other.y;

		return dx*dx+dy*dy;
	}
	public float distance(Vector2 other) {
		return sqrt(distanceSquared(other));
	}

	

}