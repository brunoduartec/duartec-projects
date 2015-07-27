package com.example.sample_study.Light;

import android.content.Context;
import android.opengl.GLES20;
import android.opengl.GLES30;
import android.opengl.Matrix;

import com.example.sample_study.GraphicFactory;
import com.example.sample_study.IWorld;
import com.example.sample_study.MyGLRenderer;
import com.example.sample_study.R;
import com.example.sample_study.RawResourceReader;
import com.example.sample_study.Utils;
import com.example.sample_study.Camera.ICamera;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Material.PointLightMaterial;
import com.example.sample_study.Model.IModel;

public class AmbientLight extends ILight 
{


		
   private IMaterial pLightMaterial = new PointLightMaterial();
	

	

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void Draw(IWorld world) {
		
		pLightMaterial.Draw(this, world);
		
	}



	

	
}
