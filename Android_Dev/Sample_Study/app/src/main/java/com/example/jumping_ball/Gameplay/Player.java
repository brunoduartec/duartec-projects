package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Vector3;

/**
 * Created by Bruno on 21/10/2015.
 */
public class Player {


    private int objectID;
    private Vector3 localposition = new Vector3(0,3,0);

    private Vector3 velocity = new Vector3(0,0,0);
    private float mass;
    private boolean isColiding;


    public Player(int ID, Vector3 localposition)
    {
        this.objectID = ID;
        this.setLocalposition(localposition);

    }


    void Collide()
    {

        velocity.setY(-velocity.getY());
    }


    void Jump()
    {





    }


    void MoveTo(Vector3 localpos)
    {


    }

    public int getObjectID() {
        return objectID;
    }

    public void setObjectID(int objectID) {
        this.objectID = objectID;
    }

    public Vector3 getLocalposition() {
        return localposition;
    }

    public void setLocalposition(Vector3 localposition) {
        this.localposition = localposition;
    }
}
