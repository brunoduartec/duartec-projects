package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Vector3;

import java.util.Stack;

/**
 * Created by Bruno on 08/10/2015.
 */
public  abstract class Block {

    private int objectID;
    private Vector3 localposition;
    Stack<Block> child = new Stack<>();

    public abstract float[] getColor();
    public abstract boolean canMove();
    public abstract boolean canStack();
    public abstract void onCollide(Block b);


public Block(){}

    public Block(int ID, Vector3 localposition)
    {
        this.objectID = ID;
        this.setLocalposition(localposition);

    }

    public int getChildreenCount()
    {

        return child.size();

    }

    public boolean equals(Block b)
    {

        return this.getObjectID()==b.getObjectID();


    }


    public Object[] getChildreen()
    {
        return child.toArray();


    }


    void MoveTo(Vector3 localpos)
    {

        setLocalposition(localpos);


        for (Block b:child) {


            b.getLocalposition().setX(localpos.getX());
            b.getLocalposition().setZ(localpos.getZ());


        }



    }

    void StackBlock(Block b)
    {

        int topstack = child.size()+1;

        b.getLocalposition().setX(getLocalposition().getX());
        b.getLocalposition().setY(getLocalposition().getY() + topstack);
        b.getLocalposition().setZ(getLocalposition().getZ());

        child.push(b);

    }
    Block[] UnStrackBlocks(int n)
    {

        // to don´t unstack more than the stack, to avoid overflow
        if (n>child.size())
            n=child.size();


        Stack<Block> btemp = new Stack<>();

        for (int i=0;i<n;i++)
        {
            btemp.push(child.pop());

        }

     /*
        if (n==1)n=2;
        Block[] bret = new Block[n];

        if (n>child.size())
            n=child.size();

        for (int i=0;i<n;i++)
        {
            Block tt = child.pop();
            bret[n-i] = tt;
        }
*/
        return btemp.toArray(new Block[btemp.size()]);

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
