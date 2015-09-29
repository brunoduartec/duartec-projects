package com.example.sample_study.Gameplay;

import com.example.sample_study.IObject;
import com.example.sample_study.Light.ILight;
import com.example.sample_study.ObjectFactory;
import com.example.sample_study.SimpleObject;

import java.util.LinkedList;
import java.util.List;

/**
 * Created by Bruno on 25/09/2015.
 */
public class Board {

    private String name;
private List<IObject> obj= new LinkedList<>();



    public Board()
    {    }

    public List<IObject> CreateBoard(int size, float cellsize)
    {
        float x,z;

        x = -(size/2)*cellsize;
        z = -(size/2)*cellsize;


        for (int i=0;i<size;i++)
        {
            //x = -(size/2)*cellsize;
            //z = -(size/2)*cellsize;
            x = x+  cellsize;
            z = -(size/2)*cellsize;

            for (int j=0;j<size;j++) {
                SimpleObject b1 = ObjectFactory.getInstance().getBoxObject("box" + i+"_"+j, cellsize);

            //    x = x+ i * cellsize;
                z = z +  cellsize;

                float[] pos3 = {x, 0, z, 1.0f};
                b1.setPosition(pos3);
                b1.setScale(new float[]{cellsize,cellsize,cellsize});
                obj.add(b1);
            }


        }
        return obj;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }


}
