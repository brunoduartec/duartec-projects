package com.example.sample_study;

import com.example.sample_study.Material.DiffuseMaterial;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Material.SimpleMaterial;
import com.example.sample_study.Model.BoxModel;
import com.example.sample_study.Model.IModel;

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
		
		IMaterial mat1 = new SimpleMaterial();//DiffuseMaterial();
		obj = new SimpleObject(mat1,m1, name);
		
		return obj;
		
	}

}
