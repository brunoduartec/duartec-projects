package com.example.sample_study.Material;

import android.content.Context;
import android.opengl.GLES30;
import android.opengl.Matrix;

import com.example.sample_study.GraphicFactory;
import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.R;
import com.example.sample_study.RawResourceReader;
import com.example.sample_study.Utils;
import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Light.ILight;

import org.w3c.dom.Node;

public class DiffuseMaterial extends IMaterial {

	
	 
	private int mPositionHandle;
	private int mColorHandle;
	private float color[] = { 0.2f, 0.709803922f, 0.898039216f, 1.0f };
	private int mMVPMatrixHandle;
    // number of coordinates per vertex in this array
    static final int COORDS_PER_VERTEX = 3;
    private final int vertexStride = COORDS_PER_VERTEX * 4; // 4 bytes per vertex
	private float[] mMVPMatrix =new float[16];
	private int mMVMatrixHandle;
	private int mLightPosHandle;
	private int mNormalHandle;
	private float[] mMVMatrix = new float[16];
	private float[] mLightPosInEyeSpace = new float[16];

	
	public DiffuseMaterial()
	{
		
		color = Utils.RandColor();
		Context localContext = GraphicFactory.getInstance().getGraphicContext();
		String frag = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
		String vert = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertexlight);
		 int vertexShaderHandle = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vert);
		 int fragmentShaderHandle = Utils.loadShader(	GLES30.GL_FRAGMENT_SHADER, frag);
			
			mProgram = Utils.createAndLinkProgram(vertexShaderHandle, fragmentShaderHandle, 
					new String[] {"a_Position",  "a_Color", "a_Normal"});

		 

		
	}
	

	@Override
	public void Draw(IObject obj, IWorld world) {
		 GLES30.glUseProgram(mProgram);
		 
		// Set program handles for cube drawing.
	        mMVPMatrixHandle = GLES30.glGetUniformLocation(mProgram, "u_MVPMatrix");
	        mMVMatrixHandle = GLES30.glGetUniformLocation(mProgram, "u_MVMatrix"); 
	        
	        mLightPosHandle = GLES30.glGetUniformLocation(mProgram, "u_LightPos");
	        
	        mPositionHandle = GLES30.glGetAttribLocation(mProgram, "a_Position");
	        mColorHandle = GLES30.glGetAttribLocation(mProgram, "a_Color");
	        mNormalHandle = GLES30.glGetAttribLocation(mProgram, "a_Normal"); 
	
	       
	        
	        // Enable a handle to the triangle vertices


	        // Prepare the triangle coordinate data
	        GLES30.glVertexAttribPointer(mPositionHandle, COORDS_PER_VERTEX,GLES30.GL_FLOAT, false,
	                //vertexStride,obj.getModel().getVertexBuffer());
	        		0,obj.getModel().getVertexBuffer());
	        
	        GLES30.glEnableVertexAttribArray(mPositionHandle);    
	        
	        
	        
	        // Set color for drawing the triangle
	        GLES30.glUniform4fv(mColorHandle, 1, color, 0);
	        
	        // Prepare the triangle coordinate data
	        GLES30.glVertexAttribPointer(
	        		mNormalHandle, COORDS_PER_VERTEX,
	                GLES30.GL_FLOAT, false,
	                vertexStride,obj.getModel().getNormalsBuffer());

		ICamera cam = world.getCameraManager().getActualCamera();
		
		//Multiply the ViewMatrix by the Object local position to obtain position in worldspace
		Matrix.multiplyMM(mMVMatrix, 0, cam.getViewMatrix(), 0, obj.getLocalTransformation(), 0);
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVMatrixHandle, 1, false,mMVMatrix, 0);
		
		
		//Multiply the worldspace position by the projection matrix and obtain the screen position
		Matrix.multiplyMM(mMVPMatrix, 0, cam.getProjectionMatrix(), 0, mMVMatrix, 0);
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVPMatrixHandle, 1, false,mMVPMatrix, 0);
		
        ILight l1 = world.getLights().get(0);
        
        Matrix.multiplyMV(mLightPosInEyeSpace, 0, cam.getViewMatrix(), 0, l1.getLocalTransformation(), 0);
        
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mLightPosHandle, 1, false,mLightPosInEyeSpace, 0);
	
                
        // Draw the cube.
        GLES30.glDrawArrays(GLES30.GL_TRIANGLE_STRIP, 0, 24);   
           
           // Disable vertex array
         GLES30.glDisableVertexAttribArray(mPositionHandle);
	}


	@Override
	public Object Parse(Node childnode) {
		return null;
	}
}
