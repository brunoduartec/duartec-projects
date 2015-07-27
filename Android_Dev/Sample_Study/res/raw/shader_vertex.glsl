 // This matrix member variable provides a hook to manipulate
            // the coordinates of the objects that use this vertex shader
uniform mat4 uMVPMatrix;
attribute vec4 vPosition;
attribute vec4 vColor;        		// Per-vertex color information we will pass in.


varying vec4 v_Color;          		// This will be passed into the fragment shader.


void main() {
// The matrix must be included as a modifier of gl_Position.
// Note that the uMVPMatrix factor *must be first* in order
// for the matrix multiplication product to be correct.
  gl_Position = uMVPMatrix * vPosition;
  
  v_Color = vColor;
  
}