package com.example.jumping_ball.Gameplay;

import com.example.jumping_ball.IObject;
import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.Material.SimpleMaterial;
import com.example.jumping_ball.ObjectFactory;
import com.example.jumping_ball.SimpleObject;
import com.example.jumping_ball.Vector2;
import com.example.jumping_ball.Vector3;

import java.util.LinkedList;
import java.util.List;
import java.util.Random;

/**
 * Created by Bruno on 25/09/2015.
 */
public class Board {


    private class ChangedBlocks
    {
        private String origin;
        private String destiny;
        private String[] changed;

        public ChangedBlocks(int amount)
        {
            setChanged(new String[amount]);

        }


        public String getOrigin() {
            return origin;
        }

        public void setOrigin(String origin) {
            this.origin = origin;
        }

        public String getDestiny() {
            return destiny;
        }

        public void setDestiny(String destiny) {
            this.destiny = destiny;
        }

        public String[] getChanged() {
            return changed;
        }

        public void setChanged(String[] changed) {
            this.changed = changed;
        }
    }


    public enum DIRECTION {LEFT, RIGHT, UP, DOWN};

    private float scale;
    private String name;

    int count = 0; // used to name objects


    private String[][] blocks;


    private List<Block> bk = new LinkedList<>();



    private int size;
    private IWorld localWorld;

    public Board(IWorld w, float scale) {
        this.localWorld = w;
        this.scale = scale;
    }

    public void InitBlocks() {

        blocks = new String[size][size];


        for (int x = 0; x < size; x++)
            for (int y = 0; y < size; y++)
                blocks[x][y] = "";


    }
//considering that the origin > destiny
    private ChangedBlocks swapTopBlocks(String origin, String destiny)
    {
        ChangedBlocks changed;
        String[] partsOrigin = origin.split(";");


        int originlenght = getBlockCount(origin);
        int destinylenght = getBlockCount(destiny);

        int delta = originlenght - destinylenght;

        //changed items vector
        String[] partsChanged = new String[delta];

        changed = new ChangedBlocks(delta);

        int count = 0;



        for (int x=destinylenght; x<originlenght;x++)
        {
            destiny.trim();//cleaning the space
            partsChanged[count] =partsOrigin[x];
            count++;

            destiny += (partsOrigin[x]+"; "); // adding the space at the end of the block string
        }
        origin = "";
        for (int x=0;x<destinylenght;x++)
        {
            origin+=(partsOrigin[x+2]+";");//incrementing to add the strings changed also

        }

        changed.setOrigin(origin);
        changed.setDestiny(destiny);
        changed.setChanged(partsChanged);

        return changed;
    }

    private String[] getCellObjts(String cellcontent) {

        String[] parts = cellcontent.split(";");

        return parts;
    }

    private int getBlockCount(String cellcontent)
    {

        String[] parts = cellcontent.split(";");
        return parts.length-1;//removing the " " at the end of the block string

    }


    private float[] convertLocalPosWorldPos(float[] localpos)
    {

        float x = localpos[0]*scale - (this.size/2)*scale;
        float y = localpos[1]*scale;
        float z = localpos[2]*scale - (this.size/2)*scale;

        return new float[]{x,y,z,1};



    }

    public void MoveBlocks(Vector3 dir)
    {
        for (int i=0; i< bk.size();i++)
        {
            Block b = bk.get(i);
            Vector3 posA = b.getLocalposition();
            boolean trymove=true;
            for (int j=0; j< bk.size();j++)
            {
                Vector3 posB = bk.get(j).getLocalposition();
                if ( posA.add(dir) == posB )
                {
                trymove = false;
                    break;
                }
            }

            if (trymove) {
                b.MoveTo(posA.add(dir));

                IObject ob = localWorld.getObjectbyID(b.getObjectID());
                float[] newpos = convertLocalPosWorldPos(b.getLocalposition().Get());
                ob.setPosition(newpos);

                Object[] chilren = b.getChildreen();

                for (int k =0;k<chilren.length;k++)
                {
                    Block bb = (Block)chilren[k];
                    IObject ob1 = localWorld.getObjectbyID(bb.getObjectID());
                    float[] newpos1 = convertLocalPosWorldPos(bb.getLocalposition().Get());
                    ob1.setPosition(newpos1);



                }



            }
        }


    }



    public void MoveBoard(DIRECTION dir)
    {
        int initx=0,inity=0;
        int[] directionincrement = new int[2];
        int countx=-1;
        int county=-1;

        switch (dir) {
            case LEFT:
                initx=size-1;
                inity=0;
                directionincrement[0] = -1;
                directionincrement[1] = 1;

                break;
            case RIGHT:
                initx = 0;
                inity = 0;
                directionincrement[0] = 1;
                directionincrement[1] = 1;

                break;
            case UP:
                initx = 0;
                inity=size-1;
                directionincrement[0] = 1;
                directionincrement[1] = -1;
                break;
            case DOWN:
                initx=0;
                inity=0;
                directionincrement[0] = 1;
                directionincrement[1] = 1;
                break;
        }

        for (int x=initx; countx<size-1;x=x+directionincrement[0])
        {
            countx++;
            county=0;
            for (int y=inity; county<size-1;y=y+directionincrement[1])
            {

                if (x<0 || y<0)
                    continue;

                county++;
                switch (dir) {
                    case LEFT:
                        if (getBlockCount(blocks[x][y]) > getBlockCount(blocks[x-1][y])  )
                        {
                            //retrieving

                            int height = getBlockCount(blocks[x][y]);//localposition Y
                            ChangedBlocks blocksid = swapTopBlocks(blocks[x][y], blocks[x - 1][y]);


                            blocks[x][y] = blocksid.getOrigin();
                            blocks[x-1][y] = blocksid.getDestiny();



                            for (int xb = 0;xb< blocksid.getChanged().length;xb++)
                            {
                                IObject ob = localWorld.getObjectbyID(Integer.parseInt(blocksid.getChanged()[xb]));


                               float[] oldpos = ob.getPosition();
                                float[] newposlocal = new float[3];

                                newposlocal[0] = x-1;
                                newposlocal[1] = 0;
                                newposlocal[2] = y;
                                float[] newpos = convertLocalPosWorldPos(newposlocal);
                                newpos[1] = oldpos[1];
                                ob.setPosition(newpos);

                            }

                        }

                        break;
                    case RIGHT:

                        if (getBlockCount(blocks[x][y]) < getBlockCount(blocks[x-1][y])  )
                        {


                        }


                        break;
                    case UP:
                        break;
                    case DOWN:
                        break;
                }




            }
        }



    }



    public void CreateBoard(int size)
    {
        this.size = size;
        InitBlocks();

        float x,z;




        for (int i=0;i<size;i++)
        {
            for (int j=0;j<size;j++) {
                SimpleObject b1 = ObjectFactory.getInstance().getBoxObject("box" + i+"_"+j, scale);
                SimpleMaterial m1 = (SimpleMaterial)b1.getMaterial();
                m1.setColor(new float[]{0.2695f,0.921875f , 0.109375f,1.0f});



               // x = i*scale - (this.size/2)*scale;
               // z = j*scale - (this.size/2)*scale;

                b1.setPosition( convertLocalPosWorldPos(new float[]{i,0,j}));

                localWorld.AddObject(b1);


            }


        }

    }



    public void PlaceBlocksat(int n, int x, int y)
    {

        Block b1 = new Block();

        for (int i=0;i<n;i++)
        {
            count++;
            String obname = Integer.toString(count);


            float[] localposition = new float[3];
            localposition[0] = x;
            localposition[1] = i+1;
            localposition[2] = y;


            IObject ob1 = ObjectFactory.getInstance().getBoxObject(obname, scale);
            SimpleMaterial m1 = (SimpleMaterial) ob1.getMaterial();
            m1.setColor(new float[]{0.5f, 0.5f, 0.5f, 1.0f});


            float[] position = new float[3];

            position = convertLocalPosWorldPos(localposition);

            ob1.setPosition(position);
            int id = localWorld.AddObject(ob1);


            String lastblock = blocks[x][y];
            lastblock.trim();




            if(i==0) {
                b1 = new Block(id, new Vector3(localposition));
                bk.add(b1);
            }
            else
            {
                Block bn = new Block(id,new Vector3(localposition));
                b1.StackBlock(bn);

            }

//            blocks[x][y] = lastblock;

  //          blocks[x][y] += (id + "; ");


        }



    }



    public void PlaceRandonBlock()
    {

        Random rnd = new Random();
        int x,y;

        do {
            x = rnd.nextInt(size);
            y = rnd.nextInt(size);

        }while (!blocks[x][y].equals(""));

        PlaceBlocksat(1,x, y);

    }


    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }


}
