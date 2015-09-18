package com.example.sample_study.Scene;

import com.example.sample_study.IWorld;

public interface IScene {

	void Draw();
	void Update();
	void Initialize();
	IWorld getWorld();

}
