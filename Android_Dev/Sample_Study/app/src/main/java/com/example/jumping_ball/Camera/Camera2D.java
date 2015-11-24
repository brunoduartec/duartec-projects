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


        float[] pos =  {0.0f, 0.0f, 1.5f};
        float[] target =  {0.0f, 0.0f, -5.0f};



        this.setPosition(pos);
        this.setTarget(target);


        CalcViewMatrix();
        CalcProjectionMatrix();
        CalcViewProjectionMatrix();

    }

    @Override
    public void CalcViewMatrix()
    {
        float[] position = this.getPosition();
        float[] target = this.getTarget();

        Matrix.setLookAtM(this.getViewMatrix(), 0 ,position[0], position[1], position[2], target[0],target[1],target[2], 0f, 1.0f, 0.0f);

    }



}
