uniform mat4 u_MVPMatrix;      		// A constant representing the combined model/view/projection matrix.
uniform mat4 u_MVMatrix;       		// A constant representing the combined model/view matrix.	
uniform vec3 u_LightPos;       	    // The position of the light in eye space.
attribute vec4 a_Position;     		// Per-vertex position information we will pass in.
attribute vec4 a_Color;        		// Per-vertex color information we will pass in.
attribute vec3 a_Normal;       		// Per-vertex normal information we will pass in.
		  
varying vec4 v_Color;          		// This will be passed into the fragment shader.
		  
void main()                     	// The entry point for our vertex shader.
{                              		


	// Transform the vertex into eye space.
   vec3 modelViewVertex = vec3(u_MVMatrix * a_Position);

//vec4 vlaus = u_MVPMatrix * a_Position;


   gl_Position = u_MVPMatrix * a_Position;  

//float distance = 1.0;

//float diffuse = 1.0;

//diffuse = diffuse * (1.0/ (1.0+(0.25*distance*distance) ) );

 
v_Color = a_Color;//*diffuse;

}    