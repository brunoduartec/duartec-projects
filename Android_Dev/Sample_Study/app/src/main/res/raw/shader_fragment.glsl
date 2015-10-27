#version 300 es

precision mediump float;


//varying vec4 v_Color;
in vec4 v_Color;
out vec4 fragColor;


void main() {
  //gl_FragColor = v_Color;
 // gl_FragColor = vec4(0,1.0,0,1);
 //fragColor = vec4(0,1.0,0,1);
 fragColor  = v_Color;
}