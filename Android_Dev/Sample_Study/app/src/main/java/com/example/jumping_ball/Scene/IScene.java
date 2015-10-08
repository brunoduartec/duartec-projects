package com.example.jumping_ball.Scene;

import com.example.jumping_ball.IWorld;

public interface IScene {

	void Draw();
	void Update();
	void Initialize();
	IWorld getWorld();

}
