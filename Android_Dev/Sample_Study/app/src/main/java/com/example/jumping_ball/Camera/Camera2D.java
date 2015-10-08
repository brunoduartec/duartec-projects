package com.example.jumping_ball.Camera;

import android.opengl.Matrix;

/**
 * Created by Bruno on 28/09/2015.
 */
public class Camera2D extends SimpleCamera {





    public Camera2D(String name,float width,float height,float nearplane, float farplane,float ratio)
    {
        this.setName(name);
        this.setRatio(ratio);
        this.setWidth(width);
        this.setHeight(height);
        this.setNearPlane(nearplane);
        this.setFarPlane(farplane);


        float[] pos =  {0.0f, 0.0f, 10.0f};
        float[] target =  {0.0f, 0.0f, 0.0f};



        this.setPosition(pos);
        this.setTarget(target);


        CalcViewMatrix();
        CalcProjectionMatrix();
        CalcViewProjectionMatrix();

    }

    @Override
    public void CalcProjectionMatrix()
    {

        Matrix.orthoM(mProjectionMatrix, 0, 0f, this.getWidth(), 0.0f, this.getHeight(), this.getNearPlane(),this.getFarPlane());

    }



}
