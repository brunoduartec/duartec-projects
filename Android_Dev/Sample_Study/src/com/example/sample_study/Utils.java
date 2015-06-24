package com.example.sample_study;

import android.opengl.GLES30;

public class Utils {
	
    /**
     * Utility method for compiling a OpenGL shader.
     *
     * <p><strong>Note:</strong> When developing shaders, use the checkGlError()
     * method to debug shader coding errors.</p>
     *
     * @param type - Vertex or fragment shader type.
     * @param shaderCode - String containing the shader code.
     * @return - Returns an id for the shader.
     */
    public static int loadShader(int type, String shaderCode){

        // create a vertex shader type (GLES20.GL_VERTEX_SHADER)
        // or a fragment shader type (GLES20.GL_FRAGMENT_SHADER)
        int shader = GLES30.glCreateShader(type);

        // add the source code to the shader and compile it
        //GLES30.glShaderSource(shader, shaderCode);
        //GLES30.glCompileShader(shader);

        
		if (shader != 0) 
		{
			// Pass in the shader source.
			GLES30.glShaderSource(shader, shaderCode);

			// Compile the shader.
			GLES30.glCompileShader(shader);

			// Get the compilation status.
			final int[] compileStatus = new int[1];
			GLES30.glGetShaderiv(shader, GLES30.GL_COMPILE_STATUS, compileStatus, 0);

			// If the compilation failed, delete the shader.
			if (compileStatus[0] == 0) 
			{				
				GLES30.glDeleteShader(shader);
				shader = 0;
			}
		}

		if (shader == 0)
		{
			throw new RuntimeException("Error creating vertex shader.");
		}
        
        
        
        
        return shader;
    }
    


}
