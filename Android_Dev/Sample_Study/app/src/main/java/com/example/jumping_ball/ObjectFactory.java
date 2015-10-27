package com.example.jumping_ball;

import com.example.jumping_ball.Material.DiffuseMaterial;
import com.example.jumping_ball.Material.IMaterial;
import com.example.jumping_ball.Material.SimpleMaterial;
import com.example.jumping_ball.Model.BoxModel;
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
