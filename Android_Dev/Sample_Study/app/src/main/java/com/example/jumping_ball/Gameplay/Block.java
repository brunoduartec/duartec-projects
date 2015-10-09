package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Vector3;

import java.util.Stack;

/**
 * Created by Bruno on 08/10/2015.
 */
public class Block {

    private int objectID;
    private Vector3 localposition;
    Stack<Block> child = new Stack<>();

public Block(){}
    public Block(int ID, Vector3 localposition)
    {
        this.objectID = ID;
        this.setLocalposition(localposition);

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
        b.getLocalposition().setX(getLocalposition().getX());
        b.getLocalposition().setY(getLocalposition().getX() + 1);
        b.getLocalposition().setZ(getLocalposition().getZ());

        child.push(b);

    }
    Block[] UnStrackBlocks(int n)
    {
        Block[] bret = new Block[n];

        if (n>child.size())
            n=child.size();

        for (int i=0;i<n;i++)
        {

            bret[n-i] = child.pop();
        }

        return bret;

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
