package com.example.sample_study.Model;

import java.nio.Buffer;
import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.FloatBuffer;
import java.nio.ShortBuffer;

public class BoxModel implements IModel
{

	float[] squareCoords;
	private FloatBuffer vertexBuffer;
	 private final ShortBuffer drawListBuffer;
	  private final short[] drawOrder = { // Vertex indices of the 4 Triangles
    	      2, 4, 3,   // front face (CCW)
    	      1, 4, 2,   // right face
    	      0, 4, 1,   // back face
    	      4, 0, 3    // left face
    	   };
	
	@Override
	public float[] getVertices() {
		// TODO Auto-generated method stub
		return squareCoords;
	}
	
	public BoxModel(float scale)
	{
		
		
		calculateSquareCoords(scale);
		 // initialize vertex byte buffer for shape coordinates
        ByteBuffer bb = ByteBuffer.allocateDirect(
        // (# of coordinate values * 4 bytes per float)
                squareCoords.length * 4);
        bb.order(ByteOrder.nativeOrder());
        vertexBuffer = bb.asFloatBuffer();
        vertexBuffer.put(squareCoords);
        vertexBuffer.position(0);

        // initialize byte buffer for the draw list
        ByteBuffer dlb = ByteBuffer.allocateDirect(
                // (# of coordinate values * 2 bytes per short)
                drawOrder.length * 2);
        dlb.order(ByteOrder.nativeOrder());
        drawListBuffer = dlb.asShortBuffer();
        drawListBuffer.put(drawOrder);
        drawListBuffer.position(0);
		
	}
	
	private void calculateSquareCoords(float size)
    {
    	
       	
    	 float squareTemp[] = {  // Vertices of the 6 faces
    		      // FRONT
    		      -size, -size,  size,  // 0. left-bottom-front
    		       size, -size,  size,  // 1. right-bottom-front
    		      -size,  size,  size,  // 2. left-top-front
    		       size,  size,  size,  // 3. right-top-front
    		      // BACK
    		       size, -size, -size,  // 6. right-bottom-back
    		      -size, -size, -size,  // 4. left-bottom-back
    		       size,  size, -size,  // 7. right-top-back
    		      -size,  size, -size,  // 5. left-top-back
    		      // LEFT
    		      -size, -size, -size,  // 4. left-bottom-back
    		      -size, -size,  size,  // 0. left-bottom-front 
    		      -size,  size, -size,  // 5. left-top-back
    		      -size,  size,  size,  // 2. left-top-front
    		      // RIGHT
    		       size, -size,  size,  // 1. right-bottom-front
    		       size, -size, -size,  // 6. right-bottom-back
    		       size,  size,  size,  // 3. right-top-front
    		       size,  size, -size,  // 7. right-top-back
    		      // TOP
    		      -size,  size,  size,  // 2. left-top-front
    		       size,  size,  size,  // 3. right-top-front
    		      -size,  size, -size,  // 5. left-top-back
    		       size,  size, -size,  // 7. right-top-back
    		      // BOTTOM
    		      -size, -size, -size,  // 4. left-bottom-back
    		       size, -size, -size,  // 6. right-bottom-back
    		      -size, -size,  size,  // 0. left-bottom-front
    		       size, -size,  size   // 1. right-bottom-front
    		   };
    	squareCoords = squareTemp;
     	 	
    	
    	
    }

	@Override
	public FloatBuffer getVertexBuffer() {
		// TODO Auto-generated method stub
		return vertexBuffer;
	}

	
	

}
