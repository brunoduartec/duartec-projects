package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Vector3;

/**
 * Created by Bruno on 20/10/2015.
 */
public class StoneBlock extends Block {
    public StoneBlock(){}


    public StoneBlock(int ID, Vector3 localposition)
    {
        super(ID,localposition);

    }



    @Override
    public float[] getColor() {
        return new float[]{0.1f, 0.1f, 0.1f, 1.0f};
    }

    @Override
    public boolean canMove() {
        return false;
    }

    @Override
    public boolean canStack() {
        return false;
    }

    @Override
    public void onCollide(Block b) {

    }
}
