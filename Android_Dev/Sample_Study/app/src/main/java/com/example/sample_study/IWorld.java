package com.example.sample_study;

import java.util.List;
import java.util.Map;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Camera.SceneCameraManager;
import com.example.sample_study.Light.ILight;

public interface IWorld {
	
	Map getObjectsList();
	void Initialize();


	void AddObjectList(List<IObject> obj);
	void AddObject(IObject obj);
	IObject RemoveObject(int ID);
	void Update();
	
	
	void AddLight(ILight l);
	void RemoveLight(ILight l);
	List<ILight> getLights();



	SceneCameraManager getCameraManager();


}
