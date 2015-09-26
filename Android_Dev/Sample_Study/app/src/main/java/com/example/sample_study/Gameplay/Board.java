package com.example.sample_study.Gameplay;

import com.example.sample_study.IObject;
import com.example.sample_study.ObjectFactory;
import com.example.sample_study.SimpleObject;

import java.util.List;

/**
 * Created by Bruno on 25/09/2015.
 */
public class Board {

    private String name;
private List<IObject> obj;





    public Board(int size, float cellsize)
    {

        for (int i=0;i<size;i++)
        {
           SimpleObject b1 =  ObjectFactory.getInstance().getBoxObject("box"+i,cellsize);

            float[] pos3 = {0.5f,0.0f,0.5f,1.0f};
            b1.setPosition(pos3);
           



        }





    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<IObject> getObj() {
        return obj;
    }

    public void setObj(List<IObject> obj) {
        this.obj = obj;
    }
}
