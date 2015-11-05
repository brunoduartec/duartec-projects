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

    private Vector3 localPos = new Vector3();

    private Vector3 velocity = new Vector3(0,0,0);

    private Vector3 g = new Vector3(0,-9.81f,0);


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

    //The direction is assincronous
    public void setDirection(Vector2 dir,float after)
    {
       this._direction = dir;


        if (getPosition()[1]>= after)
        {
            float[] oldpos = getPosition();
            oldpos[0] += dir.getX();
            oldpos[2] += dir.getY();
            this.minimunY = after;
            setPosition(oldpos);

        }
    }





    @Override
    public void Update()
    {


        Jump();
        Move();



    }

    void Move()
    {



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


    public Vector3 getLocalPos() {
        return localPos;
    }

    public void setLocalPos(Vector3 localPos) {
        this.localPos = localPos;
    }
}
