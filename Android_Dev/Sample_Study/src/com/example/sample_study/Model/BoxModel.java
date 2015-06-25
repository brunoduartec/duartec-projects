package com.example.sample_study.Model;

import java.nio.Buffer;
import java.nio.ByteBuffer;
import java.nio.ByteOrder;
import java.nio.FloatBuffer;
import java.nio.ShortBuffer;

public class BoxModel implements IModel
{

	float[] squareCoords;
	private final FloatBuffer vertexBuffer;
	private final FloatBuffer mCubeNormals;
	
	 private final ShortBuffer drawListBuffer;
	  private final short[] drawOrder = { // Vertex indices of the 4 Triangles
    	      2, 4, 3,   // front face (CCW)
    	      1, 4, 2,   // right face
    	      0, 4, 1,   // back face
    	      4, 0, 3    // left face
    	   };
	  
	  /** Size of the normal data in elements. */
		private final int mNormalDataSize = 3;
		
		/** How many bytes per float. */
		private final int mBytesPerFloat = 4;	
		// X, Y, Z
		// The normal is used in light calculations and is a vector which points
		// orthogonal to the plane of the surface. For a cube model, the normals
		// should be orthogonal to the points of each face.
		final float[] cubeNormalData =
		{												
				// Front face
				0.0f, 0.0f, 1.0f,				
				0.0f, 0.0f, 1.0f,
				0.0f, 0.0f, 1.0f,
				0.0f, 0.0f, 1.0f,				
				0.0f, 0.0f, 1.0f,
				0.0f, 0.0f, 1.0f,
				
				// Right face 
				1.0f, 0.0f, 0.0f,				
				1.0f, 0.0f, 0.0f,
				1.0f, 0.0f, 0.0f,
				1.0f, 0.0f, 0.0f,				
				1.0f, 0.0f, 0.0f,
				1.0f, 0.0f, 0.0f,
				
				// Back face 
				0.0f, 0.0f, -1.0f,				
				0.0f, 0.0f, -1.0f,
				0.0f, 0.0f, -1.0f,
				0.0f, 0.0f, -1.0f,				
				0.0f, 0.0f, -1.0f,
				0.0f, 0.0f, -1.0f,
				
				// Left face 
				-1.0f, 0.0f, 0.0f,				
				-1.0f, 0.0f, 0.0f,
				-1.0f, 0.0f, 0.0f,
				-1.0f, 0.0f, 0.0f,				
				-1.0f, 0.0f, 0.0f,
				-1.0f, 0.0f, 0.0f,
				
				// Top face 
				0.0f, 1.0f, 0.0f,			
				0.0f, 1.0f, 0.0f,
				0.0f, 1.0f, 0.0f,
				0.0f, 1.0f, 0.0f,				
				0.0f, 1.0f, 0.0f,
				0.0f, 1.0f, 0.0f,
				
				// Bottom face 
				0.0f, -1.0f, 0.0f,			
				0.0f, -1.0f, 0.0f,
				0.0f, -1.0f, 0.0f,
				0.0f, -1.0f, 0.0f,				
				0.0f, -1.0f, 0.0f,
				0.0f, -1.0f, 0.0f
		};
	
	@Override
	public float[] getVertices() {
		// TODO Auto-generated method stub
		return squareCoords;
	}
	
	public BoxModel(float scale)
	{
		
		
		calculateSquareCoords(scale);
		
		/*
		// initialize vertex byte buffer for shape coordinates
        ByteBuffer bb = ByteBuffer.allocateDirect(
        // (# of coordinate values * 4 bytes per float)
                squareCoords.length * 4);
        bb.order(ByteOrder.nativeOrder());
        vertexBuffer = bb.asFloatBuffer();
        vertexBuffer.put(squareCoords);
        vertexBuffer.position(0);
*/
        vertexBuffer = ByteBuffer.allocateDirect(squareCoords.length * mBytesPerFloat)
		        .order(ByteOrder.nativeOrder()).asFloatBuffer();							
        vertexBuffer.put(squareCoords).position(0);	
        
        
        
        // initialize byte buffer for the draw list
        ByteBuffer dlb = ByteBuffer.allocateDirect(
                // (# of coordinate values * 2 bytes per short)
                drawOrder.length * 2);
        dlb.order(ByteOrder.nativeOrder());
        drawListBuffer = dlb.asShortBuffer();
        drawListBuffer.put(drawOrder);
        drawListBuffer.position(0);
        
        
        
		mCubeNormals = ByteBuffer.allocateDirect(cubeNormalData.length * mBytesPerFloat)
		        .order(ByteOrder.nativeOrder()).asFloatBuffer();							
				mCubeNormals.put(cubeNormalData).position(0);
		
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

	@Override
	public float[] getNormals() {
		// TODO Auto-generated method stub
		return cubeNormalData;
	}

	@Override
	public FloatBuffer getNormalsBuffer() {
		// TODO Auto-generated method stub
		return mCubeNormals;
	}

	
	

}
