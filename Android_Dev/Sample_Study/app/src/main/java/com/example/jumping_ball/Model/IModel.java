package com.example.jumping_ball.Model;

import java.nio.FloatBuffer;

public interface IModel
{

    /** How many bytes per float. */
    public final int mBytesPerFloat = 4;
float[] getVertices();
float[] getNormals();

FloatBuffer getVertexBuffer();
FloatBuffer getNormalsBuffer();

}