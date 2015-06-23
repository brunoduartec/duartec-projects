package com.example.sample_study;

import android.content.Context;

public class GraphicFactory {
	
	
	private GraphicFactory(){}
	
	  /**
	   * SingletonHolder is loaded on the first execution of Singleton.getInstance() 
	   * or the first access to SingletonHolder.INSTANCE, not before.
	   */
	  private static class SingletonHolder { 
	    private static final GraphicFactory INSTANCE = new GraphicFactory();
	  }

	  public static GraphicFactory getInstance() {
		    return SingletonHolder.INSTANCE;
		  }

	  public Context getGraphicContext() {
		return graphicContext;
	}

	public void setGraphicContext(Context graphicContext) {
		this.graphicContext = graphicContext;
	}

	private Context graphicContext;
	  
	  
}
