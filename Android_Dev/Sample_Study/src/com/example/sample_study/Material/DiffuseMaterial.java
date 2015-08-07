package com.example.sample_study.Material;

import android.content.Context;
import android.opengl.GLES20;
import android.opengl.GLES30;

import com.example.sample_study.GraphicFactory;
import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.R;
import com.example.sample_study.RawResourceReader;
import com.example.sample_study.Utils;
import com.example.sample_study.Light.ILight;

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

	
	public DiffuseMaterial()
	{
		
		color = Utils.RandColor();
		Context localContext = GraphicFactory.getInstance().getGraphicContext();
		String frag = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
		String vert = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertex);
		 int vertexShaderHandle = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vert);
		 int fragmentShaderHandle = Utils.loadShader(	GLES30.GL_FRAGMENT_SHADER, frag);
			
			mProgram = Utils.createAndLinkProgram(vertexShaderHandle, fragmentShaderHandle, 
					new String[] {"a_Position",  "a_Color", "a_Normal"});
		 

		
	}
	

	@Override
	public void Draw(IObject obj, IWorld world) {
		 GLES30.glUseProgram(mProgram);
		 
		// Set program handles for cube drawing.
	        mMVPMatrixHandle = GLES20.glGetUniformLocation(mProgram, "u_MVPMatrix");
	        mMVMatrixHandle = GLES20.glGetUniformLocation(mProgram, "u_MVMatrix"); 
	        
	        mLightPosHandle = GLES20.glGetUniformLocation(mProgram, "u_LightPos");
	        
	        mPositionHandle = GLES20.glGetAttribLocation(mProgram, "a_Position");
	        mColorHandle = GLES20.glGetAttribLocation(mProgram, "a_Color");
	        mNormalHandle = GLES20.glGetAttribLocation(mProgram, "a_Normal"); 
	
	        ILight l1 = world.getLights().get(0);
	        
	        // Enable a handle to the triangle vertices
	        GLES30.glEnableVertexAttribArray(mPositionHandle);

	        // Prepare the triangle coordinate data
	        GLES30.glVertexAttribPointer(
	                mPositionHandle, COORDS_PER_VERTEX,
	                GLES30.GL_FLOAT, false,
	                vertexStride,obj.getModel().getVertexBuffer());
	        

	        // Set color for drawing the triangle
	        GLES30.glUniform4fv(mColorHandle, 1, color, 0);
	        
	        // Prepare the triangle coordinate data
	        GLES30.glVertexAttribPointer(
	        		mNormalHandle, COORDS_PER_VERTEX,
	                GLES30.GL_FLOAT, false,
	                vertexStride,obj.getModel().getNormalsBuffer());

		
		
	}



}
