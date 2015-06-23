package com.example.sample_study;

import java.util.List;
import java.util.Map;

import com.example.sample_study.Camera.ICamera;

public interface IWorld {
	
	Map getObjectsList();
	void Initialize();
	void AddObject(IObject obj);
	IObject RemoveObject(int ID);
	void Update();
	
	ICamera getCamera();
	void setCamera(ICamera c);

}
