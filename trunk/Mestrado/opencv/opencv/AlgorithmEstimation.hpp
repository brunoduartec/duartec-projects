#ifndef AlgorithmEstimation_hpp
#define AlgorithmEstimation_hpp

#include "CollectedStatistics.hpp"
#include "FeatureAlgorithm.hpp"
#include "ImageTransformation.hpp"


bool computeMatchesDistanceStatistics(const Matches& matches, float& meanDistance, float& stdDev);

void ratioTest(const std::vector<Matches>& knMatches, float maxRatio, Matches& goodMatches);

bool performEstimation(const FeatureAlgorithm& alg,
  const ImageTransformation& transformation,
  const cv::Mat& sourceImage,
  SingleRunStatistics& stat);


bool performDinamicEstimation
(
 const FeatureAlgorithm& alg,
 const ImageTransformation& transformation,
 const cv::Mat& sourceImage,
 std::vector<FrameMatchingStatistics>& stat
);


#endif