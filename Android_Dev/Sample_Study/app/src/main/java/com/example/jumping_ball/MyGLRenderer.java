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
package com.example.jumping_ball;

import javax.microedition.khronos.egl.EGLConfig;
import javax.microedition.khronos.opengles.GL10;


import com.example.jumping_ball.Camera.Camera2D;
import com.example.jumping_ball.Camera.SimpleCamera;
import com.example.jumping_ball.Component.FpsCounterComponent;
import com.example.jumping_ball.Component.TimerComponent;
import com.example.jumping_ball.Gameplay.Board;
import com.example.jumping_ball.Scene.IScene;
import com.example.jumping_ball.Scene.SimpleScene;

import android.opengl.GLES30;
import android.opengl.GLSurfaceView;
import android.util.DisplayMetrics;
import android.util.Log;

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
    
    
    private int width,height;
    

    private float mAngle;
    float scale = 0.7f;
    float delta = 0.01f;

    int size = 10;
    float cameradistance = 2.3f;
    
    private float posx;
    private float posy;
    FpsCounterComponent fps;
    TimerComponent timer;
//	private SimpleCamera camera;
    Board board1;

    
  
    @Override
    public void onSurfaceCreated(GL10 unused, EGLConfig config) {

        // set the background frame color
    	GLES30.glClearColor(0.29f, 0.95f, 0.88f, 1.0f);
// Use culling to remove back faces.
        GLES30.glEnable(GLES30.GL_CULL_FACE);

        // Enable depth testing
        GLES30.glEnable(GLES30.GL_DEPTH_TEST);

        DisplayMetrics metrics = GraphicFactory.getInstance().getGraphicContext().getResources().getDisplayMetrics();
        width = metrics.widthPixels;
        height = metrics.heightPixels;


        GraphicFactory.getInstance().setWidth(this.width);
        GraphicFactory.getInstance().setHeight(this.height);

        fps = new FpsCounterComponent(30);
        timer = new TimerComponent(5000);


		world = new SimpleWorld();

    	
    //	float[] pos =  {20.0f, 20.0f, 20.0f};
	//	float[] target =  {0.0f, 0.0f, 0.0f};


       	float[] pos =  {cameradistance, cameradistance*1.5f, cameradistance};
       	float[] target =  {0.0f, 0.0f, 0.0f};
        SimpleCamera camera = new SimpleCamera("CAM1",60, 1, 10, pos, target);

//String name,float width,float height,float nearplane, float farplane,float ratio
        Camera2D cam2D = new Camera2D("CAM2",720,1118,0,50,(float)(3/4));
		

		world.getCameraManager().addCamera(camera);
        world.getCameraManager().addCamera(cam2D);

        world.getCameraManager().setActualCamera("CAM1");
    	
    	scene = new SimpleScene(world);

        board1 = new Board(world,scale);


        board1.CreateBoard(size);

       // board1.PlaceRandonBlock();

        board1.PlaceBlocksat(2,4, 0);
        board1.PlaceBlocksat(1,3, 0);

        board1.PlaceRandonBlock();

        //SceneXMLParser sceneparser = new SceneXMLParser();
      
        //sceneparser.DOMparseScene(R.xml.scene01,scene);

    }


   
    @Override
    public void onDrawFrame(GL10 unused) {
    
        // Draw background color
    	GLES30.glClear(GLES30.GL_DEPTH_BUFFER_BIT | GLES30.GL_COLOR_BUFFER_BIT);
              	  // set the camera position (View matrix)
        


       // if (timer.Update())
        {

          //  board1.PlaceRandonBlock();





        }



        if (fps.Update()) {
            scene.Update();
        }
           scene.Draw();
           
        
    }

    @Override
    public void onSurfaceChanged(GL10 unused, int width, int height) {
        // Adjust the viewport based on geometry changes,
        // such as screen rotation
    	GLES30.glViewport(0, 0, width, height);



        scene.getWorld().getCameraManager().getActualCamera().Update();

        
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


    public void changeCamera()
    {

        String actualname = world.getCameraManager().getActualCamera().getName();
        if (actualname.equals("CAM1"))
            world.getCameraManager().setActualCamera("CAM2");
        else
            world.getCameraManager().setActualCamera("CAM1");


    }
    
    float changeVarX=0.0f;
    float changeVarY=0.0f;
	public void setVar(float dx, float dy) {
		// TODO Auto-generated method stub
		
		changeVarX+= dx;
		changeVarY+= dy;
	
	//float[] cpos = camera.getPosition();
	
	//cpos[0]+=dy;
	//cpos[1]+=dy;
	//cpos[2]+=dy;
	
	//camera.setPosition(cpos);
	
	
	
	}

    public void DirectionMade(Vector2 dir)
    {

        float angle = dir.angle(Vector2.Y);

        angle = Math.abs(angle);

        if (angle > 0 && angle <=90)
            board1.MoveBlocks(new Vector3(0, 0, -1));
        else if (angle > 90 && angle <=180)
            board1.MoveBlocks(new Vector3(1, 0, 0));
        else if (angle > 180 && angle <=270)
            board1.MoveBlocks(new Vector3(0, 0, 1));
        else
            board1.MoveBlocks(new Vector3(-1, 0, 0));

        /*
    if((Math.abs(dx) > Math.abs(dy))) {
        if (dx < 0 )
            board1.MoveBlocks(new Vector3(-1, 0, 0));

        if (dx > 0 )
            board1.MoveBlocks(new Vector3(1, 0, 0));
    }
        else
    {
        if (dy < 0 )
            board1.MoveBlocks(new Vector3(0, 0, -1));

        if (dy > 0 )
            board1.MoveBlocks(new Vector3(0, 0, 1));
    }
*/




    }


}