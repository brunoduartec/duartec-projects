package com.example.sample_study.Gameplay;

import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.Light.ILight;
import com.example.sample_study.Material.SimpleMaterial;
import com.example.sample_study.ObjectFactory;
import com.example.sample_study.SimpleObject;

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


    private String[][] blocks;
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
    private String[] swapTopBlocks(String origin, String destiny)
    {

        String[] partsOrigin = origin.split(";");


        int originlenght = getBlockCount(origin);
        int destinylenght = getBlockCount(destiny);

        int delta = originlenght - destinylenght;

        //changed items vector
        String[] partsChanged = new String[delta];

        int count = 0;



        for (int x=destinylenght; x<originlenght;x++)
        {
            partsChanged[count] =partsOrigin[x];
            count++;

            destiny += (partsOrigin[x]+";");
        }
        origin = "";
        for (int x=0;x<destinylenght;x++)
        {
            origin+=(partsOrigin[x]+";");

        }


        return partsChanged;
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


    private float[] convertLocalPosWorldPos(int[] localpos)
    {

        float x = localpos[0]*scale - (this.size/2)*scale;
        float y = localpos[1]*scale;
        float z = localpos[2]*scale - (this.size/2)*scale;

        return new float[]{x,y,z,1};



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
                county++;
                switch (dir) {
                    case LEFT:
                        if (getBlockCount(blocks[x][y]) > getBlockCount(blocks[x-1][y])  )
                        {
                            //retrieving

                            int height = getBlockCount(blocks[x][y]);//localposition Y
                            String[] blocksid= swapTopBlocks(blocks[x][y], blocks[x - 1][y]);

                            for (int xb = 0;xb< blocksid.length;xb++)
                            {
                                IObject ob = localWorld.getObjectbyID(Integer.parseInt(blocksid[xb]));


                                float[] oldpos = ob.getPosition();
                                float[] delta = convertLocalPosWorldPos(new int[]{1,0,0});



                                float[] newpos = new float[4];
                                newpos[0] = oldpos[0]+delta[0];
                                newpos[1] = oldpos[1];
                                newpos[2] = oldpos[2] + delta [2];
                                newpos[3] = oldpos[3];

                                ob.setPosition(newpos);

                            }
                            //IObject ob = localWorld.getObjectbyID(blockid);
                            //ob.setPosition( convertLocalPosWorldPos(new int[]{x-1,height,y}) );



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

                b1.setPosition( convertLocalPosWorldPos(new int[]{i,0,j}));

                localWorld.AddObject(b1);


            }


        }

    }
private String StackBlock(String origin,String block)
{
    String lastblock = origin;
    lastblock.trim();
    origin=lastblock;

    origin+=(block+"; ");


    return origin;
}



    public void PlaceBlockat(int x, int y)
    {

        count++;
        String obname = Integer.toString(count);




        int[] localposition = new int[3];
        localposition[0]=x;
        localposition[1]=1;
        localposition[2]=y;


        IObject ob1 = ObjectFactory.getInstance().getBoxObject(obname,scale);
        SimpleMaterial m1 = (SimpleMaterial)ob1.getMaterial();
        m1.setColor(new float[]{0.5f, 0.5f, 0.5f, 1.0f});


        float[] position = new float[3];



        position = convertLocalPosWorldPos(localposition);



        ob1.setPosition(position);
        int id = localWorld.AddObject(ob1);



        String lastblock = blocks[x][y];
        lastblock.trim();
        blocks[x][y]=lastblock;

        blocks[x][y]+=(id+"; ");

    }



    public void PlaceRandonBlock()
    {

        Random rnd = new Random();
        int x,y;

        do {
            x = rnd.nextInt(size);
            y = rnd.nextInt(size);

        }while (!blocks[x][y].equals(""));

        PlaceBlockat(x,y);

    }


    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }


}
