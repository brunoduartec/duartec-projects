package com.example.jumping_ball;

import java.util.HashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;

import com.example.jumping_ball.Camera.SceneCameraManager;
import com.example.jumping_ball.Light.ILight;

public class SimpleWorld implements IWorld {

	
	private SceneCameraManager camManager;
	private Map<Integer,IObject> Objs = new HashMap<Integer,IObject>();
	private List<ILight> lights = new LinkedList<ILight>();
	

	
	@Override
	public Map<Integer,IObject> getObjectsList() {
		// TODO Auto-generated method stub
		return Objs;
	}

	@Override
	public void Initialize() {
		// TODO Auto-generated method stub
	}

	@Override
	public void AddObjectList(List<IObject> obj) {
		for (IObject oo :obj) {
			AddObject(oo);
		}	

	}
	
	
	



	public SimpleWorld()
	{
		
		//Objs= new HashMap<Integer,IObject>();
		camManager = new SceneCameraManager();

	}
	
	
	@Override
	public int AddObject(IObject obj) {
		// TODO Auto-generated method stub
		
		Objs.put(obj.getID(),obj);
		return obj.getID();
	}

	@Override
	public IObject getObjectbyID(int ID) {



		return (IObject) Objs.get(ID);
	}

	@Override
	public IObject RemoveObject(int ID) {
		// TODO Auto-generated method stub
		
		IObject o = (IObject) Objs.get(ID);
		Objs.remove(o);
		return o;
	}

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		for (int i = 0; i < Objs.size(); i++) {
			IObject o = (IObject) Objs.get(i);
			o.Update();
		}
		
		
	getCameraManager().getActualCamera().Update();
	}

	@Override
	public void AddLight(ILight l) {
		// TODO Auto-generated method stub
		lights.add(l);
	}

	@Override
	public void RemoveLight(ILight l) {
		// TODO Auto-generated method stub
		lights.remove(l);
	}

	@Override
	public List<ILight> getLights() {
		// TODO Auto-generated method stub
		return lights;
	}

	
	@Override
	public SceneCameraManager getCameraManager() {
		// TODO Auto-generated method stub
		return camManager;
	}

	

}
