package com.example.sample_study.Material;

import com.example.sample_study.IObject;
import com.example.sample_study.IWorld;
import com.example.sample_study.Camera.ICamera;

public interface IMaterial
{
	
int getVertexShader();
int getFragmentShader();
void Draw(IObject obj, IWorld world);
void initShader();



}