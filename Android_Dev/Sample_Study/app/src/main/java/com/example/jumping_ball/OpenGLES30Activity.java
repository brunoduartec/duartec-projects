package com.example.jumping_ball;

import android.app.Activity;
import android.opengl.GLSurfaceView;
import android.os.Bundle;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.LinearLayout;

public class OpenGLES30Activity extends Activity {

	
	private MyGLSurfaceView mGLView;
	

	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);

		// Create a GLSurfaceView instance and set it
		// as the ContentView for this Activity
		mGLView = new MyGLSurfaceView(this);
		//setContentView(mGLView);
		setContentView(R.layout.activity_open_gles20);
/*
		LinearLayout ll = new LinearLayout(this);

		//ImageButton b = new ImageButton(this);


		Button b = new Button(this);//(Button) findViewById(R.id.button); //new Button(this);
		b.setText("Change Context");

		ll.addView(b);
		ll.setGravity(Gravity.CENTER_HORIZONTAL | Gravity.BOTTOM);
		this.addContentView(ll,
				new ViewGroup.LayoutParams(ViewGroup.LayoutParams.FILL_PARENT, ViewGroup.LayoutParams.FILL_PARENT));

		b.setOnClickListener(new Button.OnClickListener() {
								 public void onClick(View v)
								 {
									 mGLView.getmRenderer().ChangeGameContext();
								 }
							 }	);


*/
	}
	
	
	 @Override
	    protected void onPause() {
	        super.onPause();
	        // The following call pauses the rendering thread.
	        // If your OpenGL application is memory intensive,
	        // you should consider de-allocating objects that
	        // consume significant memory here.
	        mGLView.onPause();
	    }

	    @Override
	    protected void onResume() {
	        super.onResume();
	        // The following call resumes a paused rendering thread.
	        // If you de-allocated graphic objects for onPause()
	        // this is a good place to re-allocate them.
	        mGLView.onResume();
	    }	
	
	
}
