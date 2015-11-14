package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.MyGLRenderer;

/**
 * Created by Bruno on 11/11/2015.
 */
public class StageManager {

    private Board board1;

    int actualstage=0;
IWorld _localworld;
    private float cameradistance;
    MyGLRenderer.GAMECONTEXT _gamecontext;
    int size;

    public StageManager(IWorld w,MyGLRenderer.GAMECONTEXT gt)
    {
        this._localworld = w;
        setBoard1(new Board(w));
        this._gamecontext = gt;

    }


    public void NextStage() {
        actualstage++;

        switch(actualstage)
        {
            case 1:
               CreateStage1();
                break;
            case 2:
                CreateStage2();
                break;
            case 3:
                CreateStage3();
                break;




        }

        
            
            



    }




    private void CreateStage1()
    {


        _gamecontext = MyGLRenderer.GAMECONTEXT.BLOCK;

       // _activityhandle.setContextImage(_gamecontext);

        GameConstants.size = 4;
        size = GameConstants.size;


        getBoard1().Initialize();

getBoard1().setGemaheight(3);

        cameradistance = 2f;

        float[] pos = {cameradistance, cameradistance * 1.5f, cameradistance};

        _localworld.getCameraManager().getActualCamera().setPosition(pos);




        getBoard1().CreateBoard(GameConstants.size);



        getBoard1().PlaceBlocksat(NormalBlock.class, 1, size - 1, size - 2);
        getBoard1().PlaceBlocksat(NormalBlock.class, 2, 1, 1);

        //   board1.PlaceBlocksat(StoneBlock.class, 1, 3, 0);




    }
    private void CreateStage2()
    {
        _gamecontext = MyGLRenderer.GAMECONTEXT.BLOCK;
        //  _activityhandle.setContextImage(_gamecontext);
        GameConstants.size = 5;
        size = GameConstants.size;

        getBoard1().Initialize();


        cameradistance = 2f;
        getBoard1().setGemaheight(3);

        float[] pos = {cameradistance, cameradistance * 1.5f, cameradistance};

        _localworld.getCameraManager().getActualCamera().setPosition(pos);



        getBoard1().CreateBoard(GameConstants.size);



        getBoard1().PlaceRandonBlock();
        getBoard1().PlaceBlocksat(StoneBlock.class, 1, 3, 0);

        getBoard1().PlaceBlocksat(StoneBlock.class, 1, 2, 2);


        getBoard1().PlaceBlocksat(NormalBlock.class, 1, size - 1, size - 2);
        getBoard1().PlaceBlocksat(NormalBlock.class, 2, 1, 1);

    }


    private void CreateStage3()
    {
        _gamecontext = MyGLRenderer.GAMECONTEXT.BLOCK;
        //  _activityhandle.setContextImage(_gamecontext);
        GameConstants.size = 10;
        size = GameConstants.size;

        getBoard1().Initialize();
        getBoard1().setGemaheight(3);

        cameradistance = 3f;

        float[] pos = {cameradistance, cameradistance * 1.5f, cameradistance};

        _localworld.getCameraManager().getActualCamera().setPosition(pos);



        getBoard1().CreateBoard(GameConstants.size);



        getBoard1().PlaceRandonBlock();
        getBoard1().PlaceBlocksat(StoneBlock.class, 1, 3, 0);

        getBoard1().PlaceBlocksat(StoneBlock.class, 1, 2, 2);

    }

    public Board getBoard1() {
        return board1;
    }

    public void setBoard1(Board board1) {
        this.board1 = board1;
    }
}
