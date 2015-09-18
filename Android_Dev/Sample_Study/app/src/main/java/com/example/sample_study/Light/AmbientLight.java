package com.example.sample_study.Light;

import com.example.sample_study.IWorld;
import com.example.sample_study.Material.IMaterial;
import com.example.sample_study.Material.PointLightMaterial;

import org.w3c.dom.Node;
import org.xmlpull.v1.XmlPullParser;
import org.xmlpull.v1.XmlPullParserException;

import java.io.IOException;

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
