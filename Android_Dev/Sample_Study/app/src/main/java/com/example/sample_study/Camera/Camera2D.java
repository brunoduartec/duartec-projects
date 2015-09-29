package com.example.sample_study.Camera;

import android.opengl.Matrix;

/**
 * Created by Bruno on 28/09/2015.
 */
public class Camera2D extends SimpleCamera {



    public Camera2D(String name,float nearPlane,float farPlane,float ratio)
    {
        this.setName(name);
this.ratio=ratio;
        this.nearPlane=nearPlane;
        this.farPlane = farPlane;


    }
    private void CalcProjectionMatrix()
    {

        Matrix.orthoM(mProjectionMatrix, 0, -ratio, ratio, -1.0f, 1.0f, nearPlane,farPlane);

    }



}
