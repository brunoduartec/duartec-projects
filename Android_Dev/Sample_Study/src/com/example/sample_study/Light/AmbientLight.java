package com.example.sample_study.Light;

import com.example.sample_study.IWorld;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Material.PointLightMaterial;

public class AmbientLight extends ILight 
{


		
   private IMaterial pLightMaterial = new PointLightMaterial();
	

   
   public AmbientLight(float[] color, int intens, float[] position)
   {
	   
	   this.setColor(color);
	   this.setIntensity(intens);
	   this.setPosition(position);
	   
   }
	

	@Override
	public void Update() {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void Draw(IWorld world) {
		
		pLightMaterial.Draw(this, world);
		
	}


	
	

	

	
}
