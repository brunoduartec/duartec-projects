package com.example.jumping_ball.Material;

import android.content.Context;
import android.opengl.GLES30;
import android.opengl.Matrix;

import com.example.jumping_ball.GraphicFactory;
import com.example.jumping_ball.IObject;
import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.Light.ILight;
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
	float[] cubeColorData;
	private final FloatBuffer mCubeColors;


	private int mMVPMatrixHandle;
    // number of coordinates per vertex in this array
    static final int COORDS_PER_VERTEX = 3;
    private final int vertexStride = COORDS_PER_VERTEX * 4; // 4 bytes per vertex
	private float[] mMVPMatrix =new float[16];
	private float[] mMVMatrix = new float[16];

	private int mMVMatrixHandle;

	private int mNormalHandle;


	private int mLightIntensityHandle;
	private int mLightPosHandle;
	private int mLightColorHandle;

	private float[] mLightPosInEyeSpace = new float[16];



	public DiffuseMaterial()
	{
		color = Utils.RandColor();
		//setColor(Utils.RandColor());
		Context localContext = GraphicFactory.getInstance().getGraphicContext();
		String frag = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_fragment);
		String vert = RawResourceReader.readTextFileFromRawResource(localContext, R.raw.shader_vertexlight);

		 int vertexShaderHandle = Utils.loadShader(	GLES30.GL_VERTEX_SHADER, vert);
		 int fragmentShaderHandle = Utils.loadShader(	GLES30.GL_FRAGMENT_SHADER, frag);
			
			mProgram = Utils.createAndLinkProgram(vertexShaderHandle, fragmentShaderHandle,
					new String[]{"a_Position", "a_Color", "a_Normal"});


		mCubeColors = ByteBuffer.allocateDirect(144 * 4)
				.order(ByteOrder.nativeOrder()).asFloatBuffer();

		//mCubeColors.put(cubeColorData).position(0);

		
	}
	public void setColor(float[] color)
	{

		this.color = color;
		this.cubeColorData = setColorCubeData(color);
		mCubeColors.put(cubeColorData).position(0);

	}

	private float[] setColorCubeData(float[] cc)
	{

		float frontfactor = -0.2f;
		float topfactor = 0.3f;
		float leftfactor = 0.4f;

		float[] cubeColor =
				{
						// Front face (color)
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,
						cc[0]+frontfactor, cc[1]+frontfactor, cc[2]+frontfactor, 1.0f,



						// Right face (green)
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,

						// Back face (blue)
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,

						// Left face (yellow)
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,
						cc[0]+leftfactor, cc[1]+leftfactor, cc[2]+leftfactor, 1.0f,


						// Top face (cyan)
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,
						cc[0]+topfactor, cc[1]+topfactor, cc[2]+topfactor, 1.0f,


						// Bottom face (magenta)
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f,
						cc[0], cc[1], cc[2], 1.0f
				};
		return cubeColor;


	}



	@Override
	public void Draw(IObject obj, IWorld world) {


// Use culling to remove back faces.
		GLES30.glEnable(GLES30.GL_CULL_FACE);

		// Enable depth testing
		GLES30.glEnable(GLES30.GL_DEPTH_TEST);
		GLES30.glUseProgram(mProgram);
		 
		// set program handles for cube drawing.
	        mMVPMatrixHandle = GLES30.glGetUniformLocation(mProgram, "u_MVPMatrix");
	        mMVMatrixHandle = GLES30.glGetUniformLocation(mProgram, "u_MVMatrix"); 
	        
	        mLightPosHandle = GLES30.glGetUniformLocation(mProgram, "u_LightPos");
		mLightIntensityHandle = GLES30.glGetUniformLocation(mProgram, "u_LightIntensity");

	        
	        mPositionHandle = GLES30.glGetAttribLocation(mProgram, "a_Position");
	        mColorHandle = GLES30.glGetAttribLocation(mProgram, "a_Color");
	        mNormalHandle = GLES30.glGetAttribLocation(mProgram, "a_Normal"); 
	
	       
	        
	        // Enable a handle to the triangle vertices

			GLES30.glEnableVertexAttribArray(mPositionHandle);
		// Prepare the triangle coordinate data
		GLES30.glVertexAttribPointer(
				mPositionHandle, COORDS_PER_VERTEX,
				GLES30.GL_FLOAT, false,
				vertexStride, obj.getModel().getVertexBuffer());


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


		GLES30.glEnableVertexAttribArray(mNormalHandle);
	        // Prepare the triangle coordinate data
		GLES30.glVertexAttribPointer(
					mNormalHandle, COORDS_PER_VERTEX,
					GLES30.GL_FLOAT, false,
					vertexStride, obj.getModel().getNormalsBuffer());







		ICamera cam = world.getCameraManager().getActualCamera();
		
		//Multiply the ViewMatrix by the Object local position to obtain position in worldspace
		Matrix.multiplyMM(mMVMatrix, 0, cam.getViewMatrix(), 0, obj.getLocalTransformation(), 0);
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mMVMatrixHandle, 1, false,mMVMatrix, 0);
		
		
		//Multiply the worldspace position by the projection matrix and obtain the screen position
		Matrix.multiplyMM(mMVPMatrix, 0, cam.getProjectionMatrix(), 0, mMVMatrix, 0);
        // Apply the projection and view transformation
		GLES30.glUniformMatrix4fv(mMVPMatrixHandle, 1, false, mMVPMatrix, 0);
		

        ILight l1 = world.getLights().get(0);
        
        Matrix.multiplyMV(mLightPosInEyeSpace, 0, cam.getViewMatrix(), 0, l1.getLocalTransformation(), 0);


		GLES30.glUniform1f(mLightIntensityHandle,l1.getIntensity());
        // Apply the projection and view transformation
        GLES30.glUniformMatrix4fv(mLightPosHandle, 1, false,mLightPosInEyeSpace, 0);
	
                
        // Draw the cube.
      //  GLES30.glDrawArrays(GLES30.GL_TRIANGLE_STRIP, 0, 24);
           
           // Disable vertex array
       //  GLES30.glDisableVertexAttribArray(mPositionHandle);

		int verticescount = obj.getModel().getVertices().length/3;

		GLES30.glDrawArrays(GLES30.GL_TRIANGLES,0,verticescount);


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






}
