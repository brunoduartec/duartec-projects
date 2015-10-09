package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Vector2;
import com.example.jumping_ball.Vector3;

import java.util.Enumeration;
import java.util.Stack;

/**
 * Created by Bruno on 08/10/2015.
 */
public class Block {

    private int objectID;
    private Vector3 localposition;
    Stack<Block> child;

    public Object[] getChildreen()
    {
        return child.toArray();


    }


    void MoveTo(Vector3 localpos)
    {

        localposition =localpos;

        for (Block b:child) {


            b.localposition.setX(localpos.getX());
            b.localposition.setZ(localpos.getZ());


        }



    }

    void StackBlock(Block b)
    {
        b.localposition.setX(localposition.getX());
        b.localposition.setY(localposition.getX() + 1);
        b.localposition.setZ(localposition.getZ());

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
}
