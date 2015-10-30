package com.example.jumping_ball.Model;

import com.example.jumping_ball.Vector3;

import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.FloatBuffer;
import java.util.LinkedList;
import java.util.List;

/**
 * Created by Bruno on 28/10/2015.
 */
public class SphereModel implements IModel {

   // List<float[]> vertices = new LinkedList<>();

    float[] vertices;
    private  float _radius;
    int _rows,_cols;
    private final FloatBuffer vertexBuffer;




    public SphereModel(float radius, int columns, int rows)
    {

        this._radius = radius;
        this._cols = columns;
        this._rows = rows;

        calculateSphereCoords();

        vertexBuffer = ByteBuffer.allocateDirect(vertices.length * mBytesPerFloat)
                .order(ByteOrder.nativeOrder()).asFloatBuffer();
        vertexBuffer.put(vertices).position(0);


       // mCubeNormals = ByteBuffer.allocateDirect(cubeNormalData.length * mBytesPerFloat)
        //        .order(ByteOrder.nativeOrder()).asFloatBuffer();
       // mCubeNormals.put(cubeNormalData).position(0);

    }

    @Override
    public float[] getVertices() {
        return vertices;

    }

    @Override
    public float[] getNormals() {
        return new float[0];
    }

    @Override
    public FloatBuffer getVertexBuffer() {
        return vertexBuffer;
    }

    @Override
    public FloatBuffer getNormalsBuffer() {
        return null;
    }

    private void calculateSphereCoords()
    {

        int r, c;

        Vector3 n = new Vector3();
        Vector3 pos = new Vector3();
        Vector3 posFull = new Vector3();

        vertices = new float[_rows*_cols*3];

        //if( defaultColor() == null ) defaultColor(new Color4());
        // Build vertices

        for (r = 0; r <= _rows; r++)
        {
            float v = (float)r / (float)_rows; // [0,1]
            float theta1 = v * (float)Math.PI; // [0,PI]

            n.set(0, 1, 0);
            n.rotateZ(theta1);

            // each 'row' assigned random color. for the hell of it.

            for (c = 0; c <= _cols; c++)
            {
                float u = (float)c / (float)_cols; // [0,1]
                float theta2 = u * (float)(Math.PI * 2f); // [0,2PI]
                pos = n;
               pos.rotateY(theta2);

                posFull = pos;
                posFull = posFull.mul(_radius);


                vertices[3*c  ] = posFull.getX();
                vertices[3*c+1] = posFull.getY();
                vertices[3*c+2] = posFull.getZ();


                //this.vertices().addVertex(posFull.x,posFull.y,posFull.z,  u,v,  pos.x,pos.y,pos.z,  defaultColor().r,defaultColor().g,defaultColor().b,defaultColor().a);
            }
        }

    }


}
