package com.example.jumping_ball.Model;

import java.nio.FloatBuffer;

public interface IModel
{
	
float[] getVertices();
float[] getNormals();

FloatBuffer getVertexBuffer();
FloatBuffer getNormalsBuffer();

}