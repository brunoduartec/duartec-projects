package com.example.jumping_ball.Model;

import java.nio.FloatBuffer;

/**
 * Created by Bruno on 28/10/2015.
 */
public class SphereModel implements IModel {
    @Override
    public float[] getVertices() {
        return new float[0];
    }

    @Override
    public float[] getNormals() {
        return new float[0];
    }

    @Override
    public FloatBuffer getVertexBuffer() {
        return null;
    }

    @Override
    public FloatBuffer getNormalsBuffer() {
        return null;
    }



}
