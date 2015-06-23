package com.example.sample_study;

import java.util.Map;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Camera.SimpleCamera;

public class SimpleScene implements IScene {

	private IWorld world;
	private ICamera camera;
	@Override
	public void Draw() {
		// TODO Auto-generated method stub
		
		
		Map<Integer,IObject> ot = world.getObjectsList();
		for (int i = 0; i < ot.size(); i++) {
			IObject o1 = (IObject) ot.get(i);
			o1.Draw(camera);
		}
	}
	
	public SimpleScene(IWorld w, ICamera c)
	{
		this.camera = c;
		this.world = w;
		
	}
	

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		world.Update();
		camera.Update();
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
