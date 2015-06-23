package com.example.sample_study;

import java.util.HashMap;
import java.util.Map;
import android.annotation.SuppressLint;
import com.example.sample_study.Camera.ICamera;

public class SimpleWorld implements IWorld {

	
	
	private Map<Integer,IObject> Objs = new HashMap<Integer,IObject>();
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
