package com.example.jumping_ball;

import com.example.jumping_ball.Gameplay.Player;
import com.example.jumping_ball.Material.DiffuseMaterial;
import com.example.jumping_ball.Material.IMaterial;
import com.example.jumping_ball.Material.FaceShadedCubeMaterial;
import com.example.jumping_ball.Material.SimpleSquareMaterial;
import com.example.jumping_ball.Model.Model2D.Square;
import com.example.jumping_ball.Model.Model2D.SquareModel;
import com.example.jumping_ball.Model.Model3D.BoxModel;
import com.example.jumping_ball.Model.IModel;

public class ObjectFactory {
	
	private ObjectFactory(){}
	
	
	/**
	   * SingletonHolder is loaded on the first execution of Singleton.getInstance() 
	   * or the first access to SingletonHolder.INSTANCE, not before.
	   */
	  private static class SingletonHolder { 
	    private static final ObjectFactory INSTANCE = new ObjectFactory();
	  }

	  public static ObjectFactory getInstance() {
		    return SingletonHolder.INSTANCE;
		  }

	public Player getPlayer(String name,float scale)
	{
		Player obj;
		IModel m1 = new BoxModel(scale);
		//
		//IModel m1 = new SphereModel(scale,4,4);

		//FaceShadedCubeMaterial mat1 = new FaceShadedCubeMaterial();////DiffuseMaterial();
		DiffuseMaterial mat1 = new DiffuseMaterial();
		mat1.setColor(Color.enumtoColor(Color.COLORNAME.WHITE));

		obj = new Player(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;

	}

	public SimpleObject getNormalBoxObject(String name, float scale)
	{
		SimpleObject obj;
		IModel m1 = new BoxModel(scale);
		//FaceShadedCubeMaterial mat1 = new FaceShadedCubeMaterial();////DiffuseMaterial();
		DiffuseMaterial mat1 = new DiffuseMaterial();


		mat1.setColor(new float[]{0.2695f, 0.921875f, 0.109375f, 1.0f});
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;
	}

	public SimpleObject getStoneBoxObject(String name, float scale)
	{
		SimpleObject obj;
		IModel m1 = new BoxModel(scale);
		DiffuseMaterial mat1 = new DiffuseMaterial();////DiffuseMaterial();

		mat1.setColor(new float[]{.1f, .1f, .1f, 1.0f});
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;
	}

	public SimpleObject getGemaObject(String name, float scale)
	{
		SimpleObject obj;
		IModel m1 = new BoxModel(scale);
		//FaceShadedCubeMaterial mat1 = new FaceShadedCubeMaterial();////DiffuseMaterial();
		DiffuseMaterial mat1 = new DiffuseMaterial();
		mat1.setColor(Color.enumtoColor(Color.COLORNAME.YELLOW));
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;
	}


	
	public SimpleObject getBoxObject(String name,float scale)
	{
		SimpleObject obj;
		IModel m1 = new BoxModel(scale);
		IMaterial mat1 = new FaceShadedCubeMaterial();////DiffuseMaterial();
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;
		
	}


	public SimpleObject getSquareObject(String name, float size, Vector2 pos)
	{
		Square sq;

		SimpleObject obj;
		IModel m1 = new SquareModel(size);
		SimpleSquareMaterial mat1 = new SimpleSquareMaterial(R.drawable.box);////DiffuseMaterial();
		mat1.setColor(Color.enumtoColor(Color.COLORNAME.YELLOW));
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{size, size, size});


		return obj;
	}


}
