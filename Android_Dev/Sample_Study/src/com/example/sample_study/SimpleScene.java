package com.example.sample_study;

import java.util.Map;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Camera.SimpleCamera;

public class SimpleScene implements IScene {

	private IWorld world;
	@Override
	public void Draw() {
		// TODO Auto-generated method stub
		
		
		Map<Integer,IObject> ot = world.getObjectsList();
		for (int i = 0; i < ot.size(); i++) {
			IObject o1 = (IObject) ot.get(i);
			o1.Draw(world);
		}
	}
	
	public SimpleScene(IWorld w)
	{

		this.world = w;
		
	}
	

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		world.Update();
		
	}

	@Override
	public void Initialize() {
		
		
	
	}

	@Override
	public IWorld getWorld() {
		// TODO Auto-generated method stub
		return world;
	}

}
