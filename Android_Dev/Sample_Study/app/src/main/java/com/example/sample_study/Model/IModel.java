package com.example.sample_study.Model;

import java.nio.FloatBuffer;

public interface IModel
{
	
float[] getVertices();
float[] getNormals();

FloatBuffer getVertexBuffer();
FloatBuffer getNormalsBuffer();

}