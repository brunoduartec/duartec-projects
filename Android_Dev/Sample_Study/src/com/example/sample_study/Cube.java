/*
 * Copyright (C) 2011 The Android Open Source Project
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
package com.example.sample_study;

import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.FloatBuffer;
import java.nio.ShortBuffer;

//import com.learnopengles.android.R;



import com.example.sample_study.R;
import com.example.sample_study.RawResourceReader;

import android.content.Context;
import android.opengl.GLES30;





/**
 * A two-dimensional square for use as a drawn object in OpenGL ES 2.0.
 */
public class Cube {

	
	public static Context localContext;
	
    private final String vertexShaderCode =
            // This matrix member variable provides a hook to manipulate
            // the coordinates of the objects that use this vertex shader
            "uniform mat4 uMVPMatrix;" +
            "attribute vec4 vPosition;" +
            "void main() {" +
            // The matrix must be included as a modifier of gl_Position.
            // Note that the uMVPMatrix factor *must be first* in order
            // for the matrix multiplication product to be correct.
            "  gl_Position = uMVPMatrix * vPosition;" +
            "}";

    private final String fragmentShaderCode =
            "precision mediump float;" +
            "uniform vec4 vColor;" +
            "void main() {" +
            "  gl_FragColor = vColor;" +
            "}";

    private final FloatBuffer vertexBuffer;
    private final ShortBuffer drawListBuffer;
    private final int mProgram;
    private int mPositionHandle;
    private int mColorHandle;
    private int mMVPMatrixHandle;

    // number of coordinates per vertex in this array
    static final int COORDS_PER_VERTEX = 3;
   
    /*
    static float squareCoords[] = {
            -0.5f,  0.5f, 0.0f,   // top left
            -0.5f, -0.5f, 0.0f,   // bottom left
             0.5f, -0.5f, 0.0f,   // bottom right
             0.5f,  0.5f, 0.0f }; // top right
    */
    
    float[] squareCoords;
    float size;
    
    
   // private final short drawOrder[] = { 0, 1, 2, 0, 2, 3 }; // order to draw vertices
    
   // private final short drawOrder[] = { 0, 1, 2, 0, 2, 3,0, 4, 5, 0, 5, 1};
    
    private final short[] drawOrder = { // Vertex indices of the 4 Triangles
    	      2, 4, 3,   // front face (CCW)
    	      1, 4, 2,   // right face
    	      0, 4, 1,   // back face
    	      4, 0, 3    // left face
    	   };
    

    private final int vertexStride = COORDS_PER_VERTEX * 4; // 4 bytes per vertex

    float color[] = { 0.2f, 0.709803922f, 0.898039216f, 1.0f };

    
    private float position[] = {0.0f, 0.0f};
    
    public float[] getPosition()
    {
     	return position;
    }
    public void setPosition(float x, float y)
    {
    position[0]=x;
    position[1]=y;
    }
    
    protected String getVertexShader()
	{
    	//return RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertex);
    	return RawResourceReader.readExternalTextFile(localContext,"shader_vertex.glsl");
    	
	}
    
    protected String getFragmentShader()
  	{
      	return RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
  	}
    
    
    private void calculateSquareCoords(float size)
    {
    	
       	
    	 float squareTemp[] = {  // Vertices of the 6 faces
    		      // FRONT
    		      -size, -size,  size,  // 0. left-bottom-front
    		       size, -size,  size,  // 1. right-bottom-front
    		      -size,  size,  size,  // 2. left-top-front
    		       size,  size,  size,  // 3. right-top-front
    		      // BACK
    		       size, -size, -size,  // 6. right-bottom-back
    		      -size, -size, -size,  // 4. left-bottom-back
    		       size,  size, -size,  // 7. right-top-back
    		      -size,  size, -size,  // 5. left-top-back
    		      // LEFT
    		      -size, -size, -size,  // 4. left-bottom-back
    		      -size, -size,  size,  // 0. left-bottom-front 
    		      -size,  size, -size,  // 5. left-top-back
    		      -size,  size,  size,  // 2. left-top-front
    		      // RIGHT
    		       size, -size,  size,  // 1. right-bottom-front
    		       size, -size, -size,  // 6. right-bottom-back
    		       size,  size,  size,  // 3. right-top-front
    		       size,  size, -size,  // 7. right-top-back
    		      // TOP
    		      -size,  size,  size,  // 2. left-top-front
    		       size,  size,  size,  // 3. right-top-front
    		      -size,  size, -size,  // 5. left-top-back
    		       size,  size, -size,  // 7. right-top-back
    		      // BOTTOM
    		      -size, -size, -size,  // 4. left-bottom-back
    		       size, -size, -size,  // 6. right-bottom-back
    		      -size, -size,  size,  // 0. left-bottom-front
    		       size, -size,  size   // 1. right-bottom-front
    		   };
    	squareCoords = squareTemp;
     	 	
    	
    	
    }

    
    
    /**
     * Sets up the drawing object data for use in an OpenGL ES context.
     */
    public Cube(float size, float posx, float posy) {
    	
    	calculateSquareCoords(size);
    	setPosition(posx,posy);
        // initialize vertex byte buffer for shape coordinates
        ByteBuffer bb = ByteBuffer.allocateDirect(
        // (# of coordinate values * 4 bytes per float)
                squareCoords.length * 4);
        bb.order(ByteOrder.nativeOrder());
        vertexBuffer = bb.asFloatBuffer();
        vertexBuffer.put(squareCoords);
        vertexBuffer.position(0);

        // initialize byte buffer for the draw list
        ByteBuffer dlb = ByteBuffer.allocateDirect(
                // (# of coordinate values * 2 bytes per short)
                drawOrder.length * 2);
        dlb.order(ByteOrder.nativeOrder());
        drawListBuffer = dlb.asShortBuffer();
        drawListBuffer.put(drawOrder);
        drawListBuffer.position(0);

        // prepare shaders and OpenGL program
        int vertexShader = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vertexShaderCode);
      // int vertexShader = MyGLRenderer.loadShader(	GLES30.GL_VERTEX_SHADER, getVertexShader());        
        
        int fragmentShader = Utils.loadShader(GLES30.GL_FRAGMENT_SHADER, getFragmentShader());

        mProgram = GLES30.glCreateProgram();             // create empty OpenGL Program
        GLES30.glAttachShader(mProgram, vertexShader);   // add the vertex shader to program
        GLES30.glAttachShader(mProgram, fragmentShader); // add the fragment shader to program
        GLES30.glLinkProgram(mProgram);                  // create OpenGL program executables
    }

    /**
     * Encapsulates the OpenGL ES instructions for drawing this shape.
     *
     * @param mvpMatrix - The Model View Project matrix in which to draw
     * this shape.
     */
    public void draw(float[] mvpMatrix) {
        // Add program to OpenGL environment
    	GLES30.glUseProgram(mProgram);

        // get handle to vertex shader's vPosition member
        mPositionHandle = GLES30.glGetAttribLocation(mProgram, "vPosition");

        // Enable a handle to the triangle vertices
        GLES30.glEnableVertexAttribArray(mPositionHandle);

        // Prepare the triangle coordinate data
        GLES30.glVertexAttribPointer(
                mPositionHandle, COORDS_PER_VERTEX,
                GLES30.GL_FLOAT, false,
                vertexStride, vertexBuffer);

        // get handle to fragment shader's vColor member
        mColorHandle = GLES30.glGetUniformLocation(mProgram, "vColor");

        // Set color for drawing the triangle
        GLES30.glUniform4fv(mColorHandle, 1, color, 0);

        // get handle to shape's transformation matrix
        mMVPMatrixHandle = GLES30.glGetUniformLocation(mProgram, "uMVPMatrix");
        MyGLRenderer.checkGlError("glGetUniformLocation");

        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVPMatrixHandle, 1, false, mvpMatrix, 0);
        MyGLRenderer.checkGlError("glUniformMatrix4fv");

        // Draw the square
      //  GLES30.glDrawElements(
        //		GLES30.GL_TRIANGLES, drawOrder.length,
        	//	GLES30.GL_UNSIGNED_SHORT, drawListBuffer);

        // Draw the primitive from the vertex-array directly
        //GLES30.glDrawArrays(GLES30.GL_TRIANGLE_STRIP, 0, squareCoords.length-1);
        
     // Render all the faces
        for (int face = 0; face < 6; face++) {
           // Set the color for each of the faces
           //gl.glColor4f(colors[face][0], colors[face][1], colors[face][2], colors[face][3]);
           // Draw the primitive from the vertex-array directly
           GLES30.glDrawArrays(GLES30.GL_TRIANGLE_STRIP, face*4, 4);
        }
        
        
        // Disable vertex array
        GLES30.glDisableVertexAttribArray(mPositionHandle);
    }

}