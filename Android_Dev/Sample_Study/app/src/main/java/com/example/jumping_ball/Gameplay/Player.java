package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Material.IMaterial;
import com.example.jumping_ball.Model.IModel;
import com.example.jumping_ball.SimpleObject;
import com.example.jumping_ball.Vector2;
import com.example.jumping_ball.Vector3;

/**
 * Created by Bruno on 21/10/2015.
 */
public class Player extends SimpleObject {


    private int objectID;
private Vector2 _direction;


    private Vector3 velocity = new Vector3(0,0,0);

    private Vector3 g = new Vector3(0,-9.81f,0);

    //stores a 3X3 Matrix of the board height around the player
    private float[] _kernel = new float[9];

    private float mass;

private float minimunY=0.7f;

    private boolean isColiding;


    public Player(IMaterial mat, IModel mod, String nm)
    {
        //public SimpleObject(IMaterial mat, IModel mod, String nm)
        super(mat,mod,nm);
    }



    public void Collide(float min)
    {

        //velocity.setY(-velocity.getY());
    this.minimunY = min;

    }



    public  void setKernelMoviment(float[] kernel)
    {
        this._kernel = kernel;

    }

    public void setDirection(Vector2 dir)
    {
       this._direction = dir;
    }





    @Override
    public void Update()
    {


        Jump();
      ///  Move();



    }

    void Move()
    {

        float nextHeight=0;
        float playerpos = _kernel[4];

        if (_direction.getX() > 0 ) //pos5
        {

            nextHeight = _kernel[5] - playerpos;

        }
        else if (_direction.getX()<0) //pos3
        {
            nextHeight = _kernel[3] - playerpos;

        }
        else if (_direction.getY() >0)
        {
            nextHeight = _kernel[1] - playerpos;
        }
        else if (_direction.getY() <0)
        {
            nextHeight = _kernel[7] - playerpos;

        }


        if (getPosition()[1] > nextHeight)
        {
            float[] pos = getPosition();
            pos[1] = nextHeight;


        }


    }

    void Jump()
    {

        float dt = 0.05f;

        // Vector3 V1t = velocity.mul(0.5f*dt);
        // Vector3 gt = g.mul(dt);
        // Vector3 Vft = velocity.add(gt);

        // Vector3 dx = Vft;//V1t.add(Vft);
        Vector3 Vft = velocity.add(g.mul(dt));
        Vector3 dx = velocity.mul(dt).add(g.mul(0.5f*dt*dt));
        velocity = Vft;

        float[] pp = this.getPosition();

        pp[0] += dx.getX();
        pp[1] += dx.getY();
        pp[2] += dx.getZ();

        this.setPosition(pp);

        if ( pp[1]<=minimunY)
            velocity = velocity.mul(new Vector3(0,-1,0));





    }



}
