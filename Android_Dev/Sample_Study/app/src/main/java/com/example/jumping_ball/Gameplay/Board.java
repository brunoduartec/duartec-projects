package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.IObject;
import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.Material.DiffuseMaterial;
import com.example.jumping_ball.Material.SimpleMaterial;
import com.example.jumping_ball.ObjectFactory;
import com.example.jumping_ball.SimpleObject;
import com.example.jumping_ball.Vector3;

import java.util.LinkedList;
import java.util.List;
import java.util.Random;

/**
 * Created by Bruno on 25/09/2015.
 */
public class Board {




    public enum DIRECTION {LEFT, RIGHT, UP, DOWN};

    private float scale;
    private String name;

    int count = 0; // used to name objects




    private List<Block> bk = new LinkedList<>();



    private int size;
    private int maxheight;


    private IWorld localWorld;

    public Board(IWorld w, float scale) {
        this.localWorld = w;
        this.scale = scale;

    Player p1 = ObjectFactory.getInstance().getPlayer("P1", scale);
    p1.setPosition(new float[]{0,10,0});
    //    localWorld.AddObject(p1);

    }


//considering that the origin > destiny
    private void swapTopBlocks(Block origin,Block destiny)
    {

        Object[] partsOrigin = origin.getChildreen();//retrieving childreen


        int originlenght = origin.getChildreenCount();
        int destinylenght = destiny.getChildreenCount();

        int delta = originlenght - destinylenght;

        int count = 0;

        Block[] bchanged =    origin.UnStrackBlocks(delta);

        for (int i=0;i<delta;i++)
        {
            destiny.StackBlock(bchanged[i]);

        }



    }


    private float[] convertLocalPosWorldPos(float[] localpos)
    {

        float x = localpos[0]*scale - (this.size/2)*scale;
        float y = localpos[1]*scale;
        float z = localpos[2]*scale - (this.size/2)*scale;

        return new float[]{x,y,z,1};



    }

    public boolean intotheBoard(Block b, Vector3 dir)
    {

        Vector3 go = b.getLocalposition().add(dir);

        if (go.getX()<0 || go.getX()>size-1 || go.getZ()<0 || go.getZ()>size-1)
            return false;
        else
        return true;



    }
    public void MoveBlocks(Vector3 dir)
    {

        boolean moved = false;

        for (int i=0; i< bk.size();i++)
        {
            Block b = bk.get(i);

            if (!b.canMove())//in the case the block cannot move
                continue;

            Vector3 posA = b.getLocalposition();
            boolean trymove=true;


            if(intotheBoard(b, dir)) {
                for (int j = 0; j < bk.size(); j++) {
                    Vector3 posB = bk.get(j).getLocalposition();
                    if (posA.add(dir).equals(posB) && !b.equals(bk.get(j)) ) {//there is a Block blocking it

                        if (b.getChildreenCount()>bk.get(j).getChildreenCount() && bk.get(j).canStack())
                        {
                            swapTopBlocks(b,bk.get(j));
                            moved = true;
                        }

                           trymove = false;
                        break;
                    }
                }

                if (trymove) {
                    moved=true;
                    b.MoveTo(posA.add(dir));
                }
            }
        }

        for (Block b:bk ) {//updating the IObject instance

            IObject ob = localWorld.getObjectbyID(b.getObjectID());
            float[] newpos = convertLocalPosWorldPos(b.getLocalposition().get());
            ob.setPosition(newpos);

            Object[] chilren = b.getChildreen();

            for (int k =0;k<chilren.length;k++)
            {
                Block bb = (Block)chilren[k];
                IObject ob1 = localWorld.getObjectbyID(bb.getObjectID());
                float[] newpos1 = convertLocalPosWorldPos(bb.getLocalposition().get());
                ob1.setPosition(newpos1);
            }

        }



      //  if (moved)
        //    PlaceRandonBlock();



    }





    public void CreateBoard(int size)
    {
        this.size = size;
        this.maxheight = 3;

        float x,z;




        for (int i=0;i<size;i++)
        {
            for (int j=0;j<size;j++) {
                SimpleObject b1 = ObjectFactory.getInstance().getBoxObject("box" + i+"_"+j, scale);


               // SimpleMaterial m1 = (SimpleMaterial)b1.getMaterial();

                //DiffuseMaterial m1 = (DiffuseMaterial)b1.getMaterial();
                SimpleMaterial m1 = (SimpleMaterial)b1.getMaterial();
                m1.setColor(new float[]{0.2695f,0.921875f , 0.109375f,1.0f});

               // x = i*scale - (this.size/2)*scale;
               // z = j*scale - (this.size/2)*scale;

                b1.setPosition( convertLocalPosWorldPos(new float[]{i,0,j}));

                localWorld.AddObject(b1);


            }


        }

    }



    public void PlaceBlocksat(Class<?> t, int n, int x, int y)
    {

        Block b1=new NormalBlock();

        if (t == StoneBlock.class)
            b1 = new StoneBlock();




        Block b2 = BlockExistAt(x,y);


        int init=0;
        if ( b2 != null ) {
            b1 = b2;
            init = b2.getChildreenCount()+1;

            if (!b2.canStack())// in the case the block cannot be stacked
                return;

        }

        for (int i=init;i<(n+init);i++)
        {
            count++;
            String obname = Integer.toString(count);


            float[] localposition = new float[3];
            localposition[0] = x;
            localposition[1] = i+1;
            localposition[2] = y;


            IObject ob1 = ObjectFactory.getInstance().getBoxObject(obname, scale);
          //  SimpleMaterial m1 = (SimpleMaterial) ob1.getMaterial();
//


            //DiffuseMaterial m1 = (DiffuseMaterial) ob1.getMaterial();
            SimpleMaterial m1 = (SimpleMaterial)ob1.getMaterial();

            m1.setColor(b1.getColor());

            float[] position = new float[3];

            position = convertLocalPosWorldPos(localposition);

            ob1.setPosition(position);
            int id = localWorld.AddObject(ob1);






            if(i==0) {

                if (t == NormalBlock.class)
                    b1 = new NormalBlock(id, new Vector3(localposition));
                else if (t == StoneBlock.class)
                    b1 = new StoneBlock(id, new Vector3(localposition));

                bk.add(b1);
            }
            else
            {
                Block bn = new NormalBlock();

                if (t == NormalBlock.class)
                    bn = new NormalBlock(id,new Vector3(localposition));



                     b1.StackBlock(bn);

            }


        }



    }

    public Block BlockExistAt(float x, float y)
    {
        Block i = null;
        for (Block b:bk ) {
            if (b.getLocalposition().getX() == x && b.getLocalposition().getZ() == y)
               i=b;
                //return i;
        }

        return i;
    }


    public void PlaceRandonBlock()
    {

        Random rnd = new Random();
        int x,y;
        boolean canplace = false;


        do {
            x = rnd.nextInt(size);
            y = rnd.nextInt(size);
            Block bb = BlockExistAt(x,y);

            if (bb ==null)
                canplace=true;
            else {
                if ((bb.getChildreenCount() + 1) <= maxheight)
                    canplace = true;
            }


        }while(!canplace);







        PlaceBlocksat(NormalBlock.class,1,x, y);

    }


    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }


}
