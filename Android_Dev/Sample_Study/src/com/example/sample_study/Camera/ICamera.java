package com.example.sample_study.Camera;


public interface ICamera
{
float getFOV();
void setFOV(float f);
void Update();
float getNearPlane();
void setNearPlane(float n);
float getFarPlane();
void setFarPlane(float f);

float[] getPosition();
void setPosition(float[] p);
float[] getTarget();
void setTarget(float[] t);
String getName();
void setName(String name);

float[] getViewMatrix();
float[] getProjectionMatrix();
float[] getViewProjectionMatrix();







}