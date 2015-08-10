package com.example.sample_study;

import java.util.HashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Light.ILight;

public class SimpleWorld implements IWorld {

	
	
	private Map<Integer,IObject> Objs = new HashMap<Integer,IObject>();
	private List<ILight> lights = new LinkedList<ILight>();
	
	private ICamera cam;
	
	@Override
	public Map<Integer,IObject> getObjectsList() {
		// TODO Auto-generated method stub
		return Objs;
	}

	@Override
	public void Initialize() {
		// TODO Auto-generated method stub
	}

	
	public SimpleWorld()
	{
		
		//Objs= new HashMap<Integer,IObject>();
		int a=0;
	}
	
	
	@Override
	public void AddObject(IObject obj) {
		// TODO Auto-generated method stub
		
		Objs.put(obj.getID(),obj);
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
		
		
		cam.Update();
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
	public ICamera getCamera() {
		// TODO Auto-generated method stub
		return cam;
	}

	@Override
	public void setCamera(ICamera c) {
		// TODO Auto-generated method stub
		cam = c;
	}
	

}
