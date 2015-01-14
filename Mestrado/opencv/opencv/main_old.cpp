#include <opencv2/core/core.hpp>
#include <opencv2/highgui/highgui.hpp>
#include <opencv2/imgproc/imgproc.hpp>
#include <iostream>
#include <opencv2/nonfree/features2d.hpp>

using namespace cv;
using namespace std;


Mat src, src_gray;
Mat dst, detected_edges;

int thresh = 100;
int max_thresh = 255;
int foundpoints=0;

int maxCorners = 23;
RNG rng(12345);
int maxTrackbar = 100;

char* source_window= "Source Image";
char* corners_window = "Corners detected";

char* img_base = "dani_close.jpg";
char* img_sensed = "dani.jpg";



//Cany
int edgeThresh = 1;
int lowThreshold;
int const max_lowThreshold = 30;
int ratio = 3;
int kernel_size = 3;
char* window_name = "Edge Map";


/// Function header
void cornerHarris_demo( int, void* );
void goodFeaturesToTrack_Demo( int, void* );
void CannyThreshold(int, void*);

/* @function main */
int main( int argc, char** argv )
{
  /// Load source image and convert it to gray
  src = imread( argv[1], 1 );
  cvtColor( src, src_gray, COLOR_BGR2GRAY );

  /// Create a window and a trackbar
  namedWindow( source_window, WINDOW_AUTOSIZE );
  
  int choise=0;


  cout<<"Escolha o demo \n 0\t Canny\n1\t Corner Harris\n2\t goodFeaturesToTrack_Demo"<<endl;
  cin>>choise;
  
  //scanf("%d",&choise);




  switch (choise)
  {

  case 0:
	    lowThreshold=30;
   /// Create a Trackbar for user to enter threshold
		createTrackbar( "Min Threshold:", source_window, &lowThreshold, max_lowThreshold, CannyThreshold );
 /// Show the image
		CannyThreshold(0, 0);
	  break;
  case 1:
	   createTrackbar( "Threshold: ", source_window, &thresh, max_thresh, cornerHarris_demo );
	   imshow( source_window, src );
	   cornerHarris_demo( 0, 0 );
	  break;
  case 2:
	    /// Create Trackbar to set the number of corners
  createTrackbar( "Max  corners:", source_window, &maxCorners, maxTrackbar, goodFeaturesToTrack_Demo );

  imshow( source_window, src );

  goodFeaturesToTrack_Demo( 0, 0 );
	  break;


  default:
	  break;
  }



  waitKey(0);
  return(0);
}

void cornerHarris_demo( int, void* )
{

  Mat dst, dst_norm, dst_norm_scaled;
  dst = Mat::zeros( src.size(), CV_32FC1 );

  /// Detector parameters
  int blockSize = 2;
  int apertureSize = 3;
  double k = 0.04;




  /// Detecting corners
 cornerHarris( src_gray, dst, blockSize, apertureSize, k, BORDER_DEFAULT );

  
  /// Normalizing
  normalize( dst, dst_norm, 0, 255, NORM_MINMAX, CV_32FC1, Mat() );
  convertScaleAbs( dst_norm, dst_norm_scaled );
  

  
  foundpoints=0;
  /// Drawing a circle around corners
  for( int j = 0; j < dst_norm.rows ; j++ )
     { for( int i = 0; i < dst_norm.cols; i++ )
          {
            if( (int) dst_norm.at<float>(j,i) > thresh )
              {
               circle( dst_norm_scaled, Point( i, j ), 5,  Scalar(0), 2, 8, 0 );
			   foundpoints++;
              }
          }
     }
  /// Showing the result
  namedWindow( corners_window, WINDOW_AUTOSIZE );
  imshow( corners_window, dst_norm_scaled );
  printf("%d\n",foundpoints);
  
}


void goodFeaturesToTrack_Demo( int, void* )
{
  if( maxCorners < 1 ) { maxCorners = 1; }

  /// Parameters for Shi-Tomasi algorithm
  vector<Point2f> corners;
  double qualityLevel = 0.01;
  double minDistance = 10;
  int blockSize = 3;
  bool useHarrisDetector = false;
  double k = 0.04;

  /// Copy the source image
  Mat copy;
  copy = src.clone();

  /// Apply corner detection
  goodFeaturesToTrack( src_gray,
               corners,
               maxCorners,
               qualityLevel,
               minDistance,
               Mat(),
               blockSize,
               useHarrisDetector,
               k );


  /// Draw corners detected
  cout<<"** Number of corners detected: "<<corners.size()<<endl;
  int r = 4;
  for( int i = 0; i < corners.size(); i++ )
     { circle( copy, corners[i], r, Scalar(rng.uniform(0,255), rng.uniform(0,255),
              rng.uniform(0,255)), -1, 8, 0 ); }

  /// Show what you got
  namedWindow( source_window, WINDOW_AUTOSIZE );
  imshow( source_window, copy );
}

void CannyThreshold(int, void*)
{
  /// Reduce noise with a kernel 3x3
  blur( src_gray, detected_edges, Size(3,3) );

  /// Canny detector
  Canny( detected_edges, detected_edges, lowThreshold, lowThreshold*ratio, kernel_size );

  /// Using Canny's output as a mask, we display our result
  //dst = Scalar::all(0);

 // src.copyTo( dst, detected_edges);
 // imshow( window_name, dst );
   imshow( window_name, detected_edges );
 }

void SURFDetect(int, void*)
{
	Mat img_1 = imread( img_base,IMREAD_GRAYSCALE);
	Mat img_2 = imread( img_sensed,IMREAD_GRAYSCALE);
	  if( !img_1.data || !img_2.data )
  { std::cout<< " --(!) Error reading images " << std::endl; }

	  //-- Step 1: Detect the keypoints using SURF Detector
  int minHessian = 400;

  Ptr<SURF> detector = SURF::create( "SURF" );

  std::vector<KeyPoint> keypoints_1, keypoints_2;

  detector->detect( img_1, keypoints_1 );
  detector->detect( img_2, keypoints_2 );

}