package com.example.jumping_ball.Light;

import com.example.jumping_ball.IWorld;
import com.example.jumping_ball.Material.IMaterial;
import com.example.jumping_ball.Material.PointLightMaterial;

import org.w3c.dom.Node;

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




	@Override
	public Object Parse(Node childnode) {
		return null;
	}
}