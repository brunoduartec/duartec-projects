package com.example.sample_study.Material;

import java.nio.Buffer;

import com.example.sample_study.GraphicFactory;
import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.MyGLRenderer;
import com.example.sample_study.R;
import com.example.sample_study.RawResourceReader;
import com.example.sample_study.Utils;
import com.example.sample_study.Camera.ICamera;

import android.content.Context;
import android.opengl.GLES30;
import android.opengl.Matrix;

public class SimpleMaterial extends IMaterial
{


	 private final int mProgram;
	private int mPositionHandle;
	private int mColorHandle;
	private float color[] = { 0.2f, 0.709803922f, 0.898039216f, 1.0f };
	private int mMVPMatrixHandle;
    // number of coordinates per vertex in this array
    static final int COORDS_PER_VERTEX = 3;
    private final int vertexStride = COORDS_PER_VERTEX * 4; // 4 bytes per vertex
	private float[] mMVPMatrix =new float[16];

    
public SimpleMaterial()
{
	
	color = Utils.RandColor();
	Context localContext = GraphicFactory.getInstance().getGraphicContext();
	String frag = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
	String vert = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertex);
	 int vertexShaderHandle = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vert);
	 int fragmentShaderHandle = Utils.loadShader(	GLES30.GL_FRAGMENT_SHADER, frag);
	 mProgram = GLES30.glCreateProgram();             // create empty OpenGL Program
      GLES30.glAttachShader(mProgram, vertexShaderHandle);   // add the vertex shader to program
      GLES30.glAttachShader(mProgram, fragmentShaderHandle); // add the fragment shader to program
      GLES30.glLinkProgram(mProgram);        

}
	
	
	




	@Override
	public void Draw(IObject obj, IWorld world) {
		
		// TODO Auto-generated method stub
		
		 // Add program to OpenGL environment
    	GLES30.glUseProgram(mProgram);

        // get handle to vertex shader's vPosition member
        mPositionHandle = GLES30.glGetAttribLocation(mProgram, "vPosition");
        // get handle to fragment shader's vColor member
        mColorHandle = GLES30.glGetUniformLocation(mProgram, "v_Color");
        // get handle to shape's transformation matrix
        mMVPMatrixHandle = GLES30.glGetUniformLocation(mProgram, "uMVPMatrix");
        MyGLRenderer.checkGlError("glGetUniformLocation");        
        
        // Enable a handle to the triangle vertices
        GLES30.glEnableVertexAttribArray(mPositionHandle);

        // Prepare the triangle coordinate data
        GLES30.glVertexAttribPointer(
                mPositionHandle, COORDS_PER_VERTEX,
                GLES30.GL_FLOAT, false,
                vertexStride,obj.getModel().getVertexBuffer());



        // Set color for drawing the triangle
        GLES30.glUniform4fv(mColorHandle, 1, color, 0);

ICamera cam = world.getCamera();

       // Matrix.setIdentityM(mMVPMatrix, 0);
        
     // This multiplies the view matrix by the model matrix, and stores the result in the MVP matrix
        // (which currently contains model * view).
        Matrix.multiplyMM(mMVPMatrix, 0,cam.getViewMatrix() , 0,obj.getLocalTransformation(), 0);
        
        // This multiplies the modelview matrix by the projection matrix, and stores the result in the MVP matrix
        // (which now contains model * view * projection).
        Matrix.multiplyMM(mMVPMatrix, 0,cam.getProjectionMatrix() , 0, mMVPMatrix, 0);
        
        
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVPMatrixHandle, 1, false,mMVPMatrix, 0);
        MyGLRenderer.checkGlError("glUniformMatrix4fv");

        // Draw the square
         
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