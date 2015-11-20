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
import com.example.jumping_ball.Gameplay.GameConstants;
import com.example.jumping_ball.Gameplay.NormalBlock;
import com.example.jumping_ball.Gameplay.StageManager;
import com.example.jumping_ball.Gameplay.StoneBlock;
import com.example.jumping_ball.Light.AmbientLight;
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


    public OpenGLES30Activity get_activityhandle() {
        return _activityhandle;
    }

    public void set_activityhandle(OpenGLES30Activity _activityhandle) {
        this._activityhandle = _activityhandle;
    }

    public enum GAMECONTEXT{PLAYER,BLOCK}

    public enum PLAYERRACTION{JUMP,PUSH}


    private GAMECONTEXT _gamecontext = GAMECONTEXT.PLAYER;


    private OpenGLES30Activity _activityhandle;

    private static final String TAG = "MyGLRenderer";

    private IWorld world;
    private IScene scene;


    private int width, height;


    private float mAngle;
    float scale;
    float delta = 0.01f;

    int size = 8;
    float cameradistance = 3.0f;

    Vector2 direction = new Vector2(0, -1);
    Vector3 normalizeddirection = new Vector3(0,0,0);

    private float posx;
    private float posy;
    FpsCounterComponent fps;
    TimerComponent timer;
    //	private SimpleCamera camera;
   // Board board1;
    private boolean startmove = false;
    private int iter = 0;//used to made N moves

    StageManager stages;


    @Override
    public void onSurfaceCreated(GL10 unused, EGLConfig config) {


        this.scale = GameConstants.scale;

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

        fps = new FpsCounterComponent(60);
        timer = new TimerComponent(1000);


        world = new SimpleWorld();


        //	float[] pos =  {20.0f, 20.0f, 20.0f};
        //	float[] target =  {0.0f, 0.0f, 0.0f};


        float[] pos = {cameradistance, cameradistance * 1.5f, cameradistance};
        float[] target = {0.0f, 0.0f, 0.0f};
        SimpleCamera camera = new SimpleCamera("CAM1", 60, 1, 10, pos, target);

//String name,float width,float height,float nearplane, float farplane,float ratio
        Camera2D cam2D = new Camera2D("CAM2", 720, 1118, 0, 50, (float) (3 / 4));


        world.getCameraManager().addCamera(camera);
        world.getCameraManager().addCamera(cam2D);

        world.getCameraManager().setActualCamera("CAM1");

        scene = new SimpleScene(world);


        AmbientLight light1 = new AmbientLight(Color.enumtoColor(Color.COLORNAME.WHITE),2, new Vector3(0,0,0));

        world.AddLight(light1);


        stages = new StageManager(world,_gamecontext);

        stages.NextStage();

        //CreateStage1();


        //SceneXMLParser sceneparser = new SceneXMLParser();

        //sceneparser.DOMparseScene(R.xml.scene01,scene);

    }





    @Override
    public void onDrawFrame(GL10 unused) {

        // Draw background color
        GLES30.glClear(GLES30.GL_DEPTH_BUFFER_BIT | GLES30.GL_COLOR_BUFFER_BIT);
        // set the camera position (View matrix)


      //  if (timer.Update())
      // {

           // board1.PlaceRandonBlock();


      //  }


        //Here in the Prototype 1 i will implement a simple scene management
        if (stages.getBoard1().TestEnd())
           stages.NextStage();





        if (fps.Update()) {
            scene.Update();

           if (startmove)
           {
               DirectionMade(direction);
               startmove = false;

                if (_gamecontext == GAMECONTEXT.PLAYER)
                {

                    Vector2 tdir = new Vector2(normalizeddirection.getX(), normalizeddirection.getZ());
                    stages.getBoard1().MovePlayer(tdir);

                }
           }





        }
        scene.Draw();


    }

    public void RestartStage()
    {

        stages.RestartStage();
    }

    public GAMECONTEXT ChangeGameContext()
    {
        if (_gamecontext == GAMECONTEXT.BLOCK)
            _gamecontext = GAMECONTEXT.PLAYER;
        else
            _gamecontext = GAMECONTEXT.BLOCK;
    return _gamecontext;
    }


    public void setAction(PLAYERRACTION act)
    {

        stages.getBoard1().setPlayerAction(act);
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
     * <p/>
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


    public void setPositionDelta(float dx, float dy) {
        posx = dx;
        posy = -dy;  // the y axys is inverted
    }


    public void changeCamera() {

        String actualname = world.getCameraManager().getActualCamera().getName();
        if (actualname.equals("CAM1"))
            world.getCameraManager().setActualCamera("CAM2");
        else
            world.getCameraManager().setActualCamera("CAM1");


    }

    float changeVarX = 0.0f;
    float changeVarY = 0.0f;

    public void setVar(float dx, float dy) {
        // TODO Auto-generated method stub

        changeVarX += dx;
        changeVarY += dy;

        //float[] cpos = camera.getPosition();

        //cpos[0]+=dy;
        //cpos[1]+=dy;
        //cpos[2]+=dy;

        //camera.setPosition(cpos);


    }

    public void DirectionMade(Vector2 dir) {

            if (dir.x > 0 && dir.y < 0)
                normalizeddirection = new Vector3(0, 0, -1);
               // board1.MoveBlocks(new Vector3(0, 0, -1));
            else if (dir.x < 0 && dir.y > 0)
                normalizeddirection = new Vector3(0, 0, 1);
               // board1.MoveBlocks(new Vector3(0, 0, 1));
            else if (dir.x > 0 && dir.y > 0)
                normalizeddirection = new Vector3(1, 0, 0);
               // board1.MoveBlocks(new Vector3(1, 0, 0));
            else
                normalizeddirection = new Vector3(-1, 0, 0);
               // board1.MoveBlocks(new Vector3(-1, 0, 0));

        //board1.PlaceRandonBlock();

    }

    public void StartMovement(Vector2 dir)
    {

        if (!startmove) {
            direction = dir;
            startmove = true;
        }
    }



}