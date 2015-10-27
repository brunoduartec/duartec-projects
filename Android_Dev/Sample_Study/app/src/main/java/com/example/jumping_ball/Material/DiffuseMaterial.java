package com.example.jumping_ball.Material;

import android.content.Context;
import android.opengl.GLES30;
import android.opengl.Matrix;

import com.example.jumping_ball.GraphicFactory;
import com.example.jumping_ball.IObject;
import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.R;
import com.example.jumping_ball.RawResourceReader;
import com.example.jumping_ball.Utils;
import com.example.jumping_ball.Camera.ICamera;

import org.w3c.dom.Node;

import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.FloatBuffer;

public class DiffuseMaterial extends IMaterial {

	
	 
	private int mPositionHandle;
	private int mColorHandle;
	private float[] color = { 0.2f, 0.709803922f, 0.898039216f, 1.0f };


	// R, G, B, A
	final float[] cubeColorData =
			{
					// Front face (red)
					1.0f, 0.0f, 0.0f, 1.0f,
					1.0f, 0.0f, 0.0f, 1.0f,
					1.0f, 0.0f, 0.0f, 1.0f,
					1.0f, 0.0f, 0.0f, 1.0f,
					1.0f, 0.0f, 0.0f, 1.0f,
					1.0f, 0.0f, 0.0f, 1.0f,

					// Right face (green)
					0.0f, 1.0f, 0.0f, 1.0f,
					0.0f, 1.0f, 0.0f, 1.0f,
					0.0f, 1.0f, 0.0f, 1.0f,
					0.0f, 1.0f, 0.0f, 1.0f,
					0.0f, 1.0f, 0.0f, 1.0f,
					0.0f, 1.0f, 0.0f, 1.0f,

					// Back face (blue)
					0.0f, 0.0f, 1.0f, 1.0f,
					0.0f, 0.0f, 1.0f, 1.0f,
					0.0f, 0.0f, 1.0f, 1.0f,
					0.0f, 0.0f, 1.0f, 1.0f,
					0.0f, 0.0f, 1.0f, 1.0f,
					0.0f, 0.0f, 1.0f, 1.0f,

					// Left face (yellow)
					1.0f, 1.0f, 0.0f, 1.0f,
					1.0f, 1.0f, 0.0f, 1.0f,
					1.0f, 1.0f, 0.0f, 1.0f,
					1.0f, 1.0f, 0.0f, 1.0f,
					1.0f, 1.0f, 0.0f, 1.0f,
					1.0f, 1.0f, 0.0f, 1.0f,

					// Top face (cyan)
					0.0f, 1.0f, 1.0f, 1.0f,
					0.0f, 1.0f, 1.0f, 1.0f,
					0.0f, 1.0f, 1.0f, 1.0f,
					0.0f, 1.0f, 1.0f, 1.0f,
					0.0f, 1.0f, 1.0f, 1.0f,
					0.0f, 1.0f, 1.0f, 1.0f,

					// Bottom face (magenta)
					1.0f, 0.0f, 1.0f, 1.0f,
					1.0f, 0.0f, 1.0f, 1.0f,
					1.0f, 0.0f, 1.0f, 1.0f,
					1.0f, 0.0f, 1.0f, 1.0f,
					1.0f, 0.0f, 1.0f, 1.0f,
					1.0f, 0.0f, 1.0f, 1.0f
			};



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


	private final FloatBuffer mCubeColors;
	
	public DiffuseMaterial()
	{
		
		setColor(Utils.RandColor());
		Context localContext = GraphicFactory.getInstance().getGraphicContext();
		String frag = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
		String vert = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertexlight);

		 int vertexShaderHandle = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vert);
		 int fragmentShaderHandle = Utils.loadShader(	GLES30.GL_FRAGMENT_SHADER, frag);
			
			mProgram = Utils.createAndLinkProgram(vertexShaderHandle, fragmentShaderHandle, 
					new String[] {"a_Position",  "a_Color", "a_Normal"});



		mCubeColors = ByteBuffer.allocateDirect(cubeColorData.length * 4)
				.order(ByteOrder.nativeOrder()).asFloatBuffer();
		mCubeColors.put(cubeColorData).position(0);

		
	}
	

	@Override
	public void Draw(IObject obj, IWorld world) {
		 GLES30.glUseProgram(mProgram);
		 
		// set program handles for cube drawing.
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
	        
	        
	        
	        // set color for drawing the triangle
		// set color for drawing the triangle
		//GLES30.glUniform4fv(mColorHandle, 1, color, 0);

	      //  GLES30.glUniform4f(mColorHandle, color[0],color[1],color[2],color[3]);
		//GLES30.glEnableVertexAttribArray(mColorHandle);
// Pass in the color information
		mCubeColors.position(0);
		GLES30.glVertexAttribPointer(mColorHandle, 4, GLES30.GL_FLOAT, false,
				0, mCubeColors);

		GLES30.glEnableVertexAttribArray(mColorHandle);

	        
	        // Prepare the triangle coordinate data
	        GLES30.glVertexAttribPointer(
	        		mNormalHandle, COORDS_PER_VERTEX,
	                GLES30.GL_FLOAT, false,
	                vertexStride,obj.getModel().getNormalsBuffer());



			GLES30.glEnableVertexAttribArray(mNormalHandle);



		ICamera cam = world.getCameraManager().getActualCamera();
		
		//Multiply the ViewMatrix by the Object local position to obtain position in worldspace
		Matrix.multiplyMM(mMVMatrix, 0, cam.getViewMatrix(), 0, obj.getLocalTransformation(), 0);
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVMatrixHandle, 1, false,mMVMatrix, 0);
		
		
		//Multiply the worldspace position by the projection matrix and obtain the screen position
		Matrix.multiplyMM(mMVPMatrix, 0, cam.getProjectionMatrix(), 0, mMVMatrix, 0);
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVPMatrixHandle, 1, false,mMVPMatrix, 0);
		
     //   ILight l1 = world.getLights().get(0);
        
       // Matrix.multiplyMV(mLightPosInEyeSpace, 0, cam.getViewMatrix(), 0, l1.getLocalTransformation(), 0);
        
        // Apply the projection and view transformation
      //  GLES30.glUniformMatrix4fv(mLightPosHandle, 1, false,mLightPosInEyeSpace, 0);
	
                
        // Draw the cube.
        GLES30.glDrawArrays(GLES30.GL_TRIANGLE_STRIP, 0, 24);
           
           // Disable vertex array
         GLES30.glDisableVertexAttribArray(mPositionHandle);
	}


	@Override
	public Object Parse(Node childnode) {
		return null;
	}

	public float[] getColor() {
		return color;
	}

	public void setColor(float[] color) {
		this.color = color;
	}
}
