package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.Color;
import com.example.jumping_ball.IObject;
import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.Material.DiffuseMaterial;
import com.example.jumping_ball.Material.SimpleMaterial;
import com.example.jumping_ball.MyGLRenderer;
import com.example.jumping_ball.ObjectFactory;
import com.example.jumping_ball.SimpleObject;
import com.example.jumping_ball.Vector2;
import com.example.jumping_ball.Vector3;

import java.util.Collection;
import java.util.Collections;
import java.util.LinkedList;
import java.util.List;
import java.util.Random;

/**
 * Created by Bruno on 25/09/2015.
 */
public class Board {






    private float scale;
    private String name;

    int count = 0; // used to name objects


    Vector2 _direction = new Vector2(0,0);
    Vector2 _playerpos;


    private LinkedList<Block> bk;// = new LinkedList<Block>();

    Block higherblock;

    Player p1;
    SimpleObject gema;


    private int size;
    private int maxheight;


    private IWorld localWorld;


    public void Initialize()
    {
        bk = new LinkedList<>();
        this.localWorld.Initialize();
        this.p1 = null;
        this.gema = null;


    }

    public boolean TestEnd()
    {

        Vector3 ppos = new Vector3(p1.getPosition());
        Vector3 gemapos = new Vector3(gema.getPosition());

         return ppos.distance(gemapos) <= GameConstants.scale;


    }

    public Board(IWorld w) {
        this.localWorld = w;
        this.scale = GameConstants.scale;

        _playerpos = new Vector2((float)(size-1),(float)size);
        Initialize();


   // p1.setPosition(new float[]{0,10,0});
   // localWorld.AddObject(p1);

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

    public boolean testposintheBoard(Vector2 p)
    {

        if (p.getX()-1 ==  size && p.getY()==size)
            return true;

        return (p.getX()<=(size-1))&&(p.getY()<=(size-1))&&(p.getX()>=0)&&(p.getY()>=0);
    }

    public boolean intotheBoard(Block b, Vector3 dir)
    {

        Vector3 go = b.getLocalposition().add(dir);

        if (go.getX()<0 || go.getX()>size-1 || go.getZ()<0 || go.getZ()>size-1)
            return false;
        else
        return true;



    }

    public void MovePlayer(Vector2 dir)
    {

        Vector3 playerpos = p1.getLocalPos();


        int h1,h2;

        float[] actualpos = p1.getPosition();

        float x,y;

        x = playerpos.getX()+ dir.getX();
        y = playerpos.getZ()+ dir.getY();


            if (!testposintheBoard(new Vector2(x, y)))
                return;


        this._direction = dir;
        Block btemp =BlockExistAt(x, y);
        if (btemp != null)
            h2 = btemp.getChildreenCount()+1;
        else
            h2 = 0;



        p1.setDirection(dir,(h2)*scale);






    }

public void MergeBlock(Block origin, Block destiny)
{
    destiny.StackBlock(origin);
}

    public void MoveBlocks(Vector3 dir)
    {


      if (dir.getX()>0)
            Collections.sort(bk, new BlockXDESCComparator());

      if (dir.getX()<0)
            Collections.sort(bk, new BlockXASCComparator());

        if (dir.getZ()>0)
            Collections.sort(bk, new BlockZDESCComparator());

        if (dir.getZ()<0)
            Collections.sort(bk, new BlockZASCComparator());

        List<Block> marktoremove = new LinkedList<>();

        boolean moved = false;

       // for (int i=0; i< bk.size();i++)
        for (Block bOrigin:bk )

        {


           // Block b = bk.get(i);

            if (!bOrigin.canMove())//in the case the block cannot move
                continue;

            Vector3 posA = bOrigin.getLocalposition();
            boolean trymove=true;


            if(intotheBoard(bOrigin, dir)) {
                for (Block bdestiny:bk)
                {

                //for (int j = 0; j < bk.size(); j++) {
                    Vector3 posB = bdestiny.getLocalposition();
                    if (posA.add(dir).equals(posB) && !bOrigin.equals(bdestiny) ) {//there is a Block blocking it

                        //if (b.getChildreenCount()>bk.get(j).getChildreenCount() && bk.get(j).canStack())
                        if(bOrigin.getChildreenCount() == bdestiny.getChildreenCount() && bdestiny.canStack())
                        {
                          //  swapTopBlocks(b,bk.get(j));
                            MergeBlock(bOrigin,bdestiny);
                            marktoremove.add(bOrigin);
                            //bk.remove(bdestiny);
                            moved = true;
                        }

                           trymove = false;
                        break;
                    }
                }

                if (trymove) {
                    moved=true;
                    bOrigin.MoveTo(posA.add(dir));
                }
            }
        }

       for (Block b:marktoremove) {
            bk.remove(b);
        }

        for (Block b:bk ) {//updating the IObject instance

            IObject ob = localWorld.getObjectbyID(b.getObjectID());
            float[] newpos = convertLocalPosWorldPos(b.getLocalposition().get());
            ob.setPosition(newpos);

            Object[] children = b.getChildreen();

            for (Object aChildren : children) {
                Block bb = (Block) aChildren;
                IObject ob1 = localWorld.getObjectbyID(bb.getObjectID());
                float[] newpos1 = convertLocalPosWorldPos(bb.getLocalposition().get());
                ob1.setPosition(newpos1);
            }

        }





        if (moved) {
          //  HigherBlock();
           // PlaceRandonBlock();
          //  PlaceHeuristicBlock();
            Place0x0Block();
        }

    }





    public void CreateBoard(int size)
    {
        this.size = size;
        this.maxheight = 3;

        float x,z;




        for (int i=0;i<size;i++)
        {
            for (int j=0;j<size;j++) {

                SimpleObject b1 = ObjectFactory.getInstance().getNormalBoxObject("box" + i+"_"+j, scale);



                if ( i == size/2 && j == size/2) {
                    float dark = -0.2f;
                    SimpleMaterial m1 = (SimpleMaterial)b1.getMaterial();



                    m1.setColor(new float[]{0.2695f+dark, 0.921875f+dark, 0.109375f+dark, 1.0f});
                }

                b1.setPosition( convertLocalPosWorldPos(new float[]{i,0,j}));

                localWorld.AddObject(b1);


            }


        }

//Adding Plateau


        SimpleObject b1 = ObjectFactory.getInstance().getNormalBoxObject("box" + size + "_" + size, scale);



        b1.setPosition(convertLocalPosWorldPos(new float[]{size - 1, 0, size}));

        localWorld.AddObject(b1);

            CreatePlayer();
        CreateGema();


    }

    private void CreateGema()
    {

        gema =  ObjectFactory.getInstance().getGemaObject("gema" + size + "_" + size, scale);


        gema.setPosition(convertLocalPosWorldPos(new float[]{size / 2, size, size / 2}));

        localWorld.AddObject(gema);

    }

    private void CreatePlayer()
    {
        p1 = ObjectFactory.getInstance().getPlayer("P1", scale);


        SimpleMaterial mt1 = (SimpleMaterial)p1.getMaterial();
        mt1.setColor(Color.enumtoColor(Color.COLORNAME.WHITE));

        p1.setPosition(convertLocalPosWorldPos(new float[]{size - 1, 4, size}));
        p1.setLocalPos(new Vector3(size - 1, 3, size));

        localWorld.AddObject(p1);

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

            IObject ob1 = null;
            if (t == NormalBlock.class)
                ob1 = ObjectFactory.getInstance().getNormalBoxObject(obname, scale);
            else if (t == StoneBlock.class)
                ob1 = ObjectFactory.getInstance().getStoneBoxObject(obname, scale);



            float[] position;

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

public void HigherBlock()
{

    for (Block b:bk) {

        if (higherblock == null)
            higherblock = b;
        else if (b.getChildreenCount() > higherblock.getChildreenCount())
            higherblock = b;

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

public void Place0x0Block()
{



    float[] localposition = new float[3];
    localposition[0] =0 ;
    localposition[1] = 0+1;
    localposition[2] = 0;


    String obname = Integer.toString(count);
    IObject ob1 = ObjectFactory.getInstance().getNormalBoxObject(obname, scale);

    float[] position;

    position = convertLocalPosWorldPos(localposition);
    ob1.setPosition(position);
    int id = localWorld.AddObject(ob1);

    Block b1 = new NormalBlock(id, new Vector3(localposition));
    bk.add(b1);


}

    public void PlaceHeuristicBlock()
    {
        Random rnd = new Random();
        int x,y;
        int kernelsize = 2;
        boolean canplace = false;


        do {
            x = rnd.nextInt(kernelsize);
            boolean signal = rnd.nextBoolean();
            if (!signal)
                x = -x;

            y = rnd.nextInt(kernelsize);
            signal = rnd.nextBoolean();
            if (!signal)
                y = -y;



            x = (int)higherblock.getLocalposition().getX()+ x;
            y = (int)higherblock.getLocalposition().getY()+ y;


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
