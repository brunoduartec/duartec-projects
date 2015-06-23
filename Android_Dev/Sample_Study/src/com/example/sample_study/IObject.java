package com.example.sample_study;

import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Model.IModel;


public interface IObject
{

float[] getPosition();
void setPosition(float[] pos);

float[] getRotation();
void setRotation(float[] rot);

float[] getScale();
void setScale(float[] scale);



float[] getLocalTransformation();
void setLocalTransformation(float[] trans);

boolean getEnabled();
boolean getVisible();
String getName();
int getID();	
void Draw(ICamera cam);void Update();
IMaterial getMaterial();
IModel getModel();



}