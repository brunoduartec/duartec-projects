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

import javax.microedition.khronos.egl.EGLConfig;
import javax.microedition.khronos.opengles.GL10;





import com.example.sample_study.Camera.SimpleCamera;

import android.content.Context;
import android.opengl.GLES30;
import android.opengl.GLSurfaceView;
import android.opengl.Matrix;
import android.util.Log;
import android.view.animation.TranslateAnimation;

/**
 * Provides drawing instructions for a GLSurfaceView object. This class
 * must override the OpenGL ES drawing lifecycle methods:
 * <ul>
 *   <li>{@link android.opengl.GLSurfaceView.Renderer#onSurfaceCreated}</li>
 *   <li>{@link android.opengl.GLSurfaceView.Renderer#onDrawFrame}</li>
 *   <li>{@link android.opengl.GLSurfaceView.Renderer#onSurfaceChanged}</li>
 * </ul>
 */
public class MyGLRenderer implements GLSurfaceView.Renderer {

	

    private static final String TAG = "MyGLRenderer";

    private IWorld world;
    private IScene scene;
    
    
    
    

    private float mAngle;
    float scale = 0.1f;
    float delta = 0.01f;
    
    private float posx;
    private float posy;

	private SimpleCamera camera;
    

    
  
    @Override
    public void onSurfaceCreated(GL10 unused, EGLConfig config) {

        // Set the background frame color
    	GLES30.glClearColor(0.0f, 0.0f, 0.0f, 1.0f);


		world = new SimpleWorld();

    	
    	float[] pos =  {10.0f, 10.0f, 10.0f};
		float[] target =  {0.0f, 0.0f, 0.0f};
		camera = new SimpleCamera("CAM1",30,0,100,pos,target);
    	
	//	SimpleObject o1 = (SimpleObject) objFact.getBoxObject("O1", scale);
    	
    	
		SimpleObject o1 = (SimpleObject) ObjectFactory.getInstance().getBoxObject("o1", scale);
		
		SimpleObject o2 = (SimpleObject) ObjectFactory.getInstance().getBoxObject("o2", scale);
		
		SimpleObject o3 = (SimpleObject) ObjectFactory.getInstance().getBoxObject("o3", scale);
		
		
		float[] pos2 = {0.0f,0.0f,0.5f};
		o2.setPosition(pos2);
		
		
		float[] pos3 = {0.5f,0.0f,0.5f};
		o3.setPosition(pos3);
		
    	
    	
    	world.AddObject(o1);
    	world.AddObject(o2);
    	world.AddObject(o3);
    	
    	
    	scene = new SimpleScene(world,camera);
    	
 
    }
    
   
    @Override
    public void onDrawFrame(GL10 unused) {
    
        // Draw background color
    	GLES30.glClear(GLES30.GL_COLOR_BUFFER_BIT);
              	  // Set the camera position (View matrix)
        

           scene.Update();
           scene.Draw();
           
        
    }

    @Override
    public void onSurfaceChanged(GL10 unused, int width, int height) {
        // Adjust the viewport based on geometry changes,
        // such as screen rotation
    	GLES30.glViewport(0, 0, width, height);

     

        // this projection matrix is applied to object coordinates
        // in the onDrawFrame() method
      //  Matrix.frustumM(mProjectionMatrix, 0, -ratio, ratio, -1, 1, 1, 200);
        
        camera.Update();
      
        
    }

  

    /**
    * Utility method for debugging OpenGL calls. Provide the name of the call
    * just after making it:
    *
    * <pre>
    * mColorHandle = GLES20.glGetUniformLocation(mProgram, "vColor");
    * MyGLRenderer.checkGlError("glGetUniformLocation");</pre>
    *
    * If the operation is not successful, the check throws an error.
    *
    * @param glOperation - Name of the OpenGL call to check.
    */
    public static void checkGlError(String glOperation) {
        int error;
        while ((error = GLES30.glGetError()) != GLES30.GL_NO_ERROR) {
            Log.e(TAG, glOperation + ": glError " + error);
            throw new RuntimeException(glOperation + ": glError " + error);
        }
    }

    /**
     * Returns the rotation angle of the triangle shape (mTriangle).
     *
     * @return - A float representing the rotation angle.
     */
    public float getAngle() {
        return mAngle;
    }

    /**
     * Sets the rotation angle of the triangle shape (mTriangle).
     */
    public void setAngle(float angle) {
        mAngle = angle;
    }
    
    
    public void setPositionDelta(float dx, float dy)
    {
    	posx= dx;
    	posy= -dy;  // the y axys is inverted    	
    }

    
    float changeVarX=0.0f;
    float changeVarY=0.0f;
	public void setVar(float dx, float dy) {
		// TODO Auto-generated method stub
		
		changeVarX+= dx;
		changeVarY+= dy;
	}
    

}