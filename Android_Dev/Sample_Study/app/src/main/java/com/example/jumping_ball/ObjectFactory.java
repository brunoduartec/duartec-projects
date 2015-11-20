package com.example.jumping_ball;

import com.example.jumping_ball.Gameplay.Player;
import com.example.jumping_ball.Material.DiffuseMaterial;
import com.example.jumping_ball.Material.IMaterial;
import com.example.jumping_ball.Material.SimpleMaterial;
import com.example.jumping_ball.Model.BoxModel;
import com.example.jumping_ball.Model.IModel;
import com.example.jumping_ball.Model.SphereModel;

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

		//SimpleMaterial mat1 = new SimpleMaterial();////DiffuseMaterial();
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
		//SimpleMaterial mat1 = new SimpleMaterial();////DiffuseMaterial();
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
		//SimpleMaterial mat1 = new SimpleMaterial();////DiffuseMaterial();
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
		IMaterial mat1 = new SimpleMaterial();////DiffuseMaterial();
		obj = new SimpleObject(mat1,m1, name);
		obj.setScale(new float[]{scale, scale, scale});
		return obj;
		
	}

}
