<?php

namespace Jeylabs\AwsRekognition;
use Aws\Rekognition\RekognitionClient;

class AwsRekognition{

    protected $client;

    public function __construct()
    {
        $this->client = new RekognitionClient(config('rekognition'));
    }

    public function compareFaces($targetImageName, $sourceImageName, $SimilarityThreshold = 50, $imageVersion = null)
    {
        return $this->client->compareFaces([
            'SimilarityThreshold' => $SimilarityThreshold,
            'SourceImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $sourceImageName,
                    'Version' => $imageVersion,
                ],
            ],
            'TargetImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $targetImageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function compareFacesAsync($targetImageName, $sourceImageName, $SimilarityThreshold = 50, $imageVersion = null)
    {
        return $this->client->compareFacesAsync([
            'SimilarityThreshold' => $SimilarityThreshold,
            'SourceImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $sourceImageName,
                    'Version' => $imageVersion,
                ],
            ],
            'TargetImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $targetImageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function createCollection($collectionId)
    {
        return $this->client->createCollection([
            'CollectionId' => $collectionId,
        ]);
    }

    public function createCollectionAsync($collectionId)
    {
        return $this->client->createCollectionAsync([
            'CollectionId' => $collectionId,
        ]);
    }

    public function deleteCollection($collectionId)
    {
        return $this->client->deleteCollection([
            'CollectionId' => $collectionId,
        ]);
    }

    public function deleteCollectionAsync($collectionId)
    {
        return $this->client->deleteCollectionAsync([
            'CollectionId' => $collectionId,
        ]);
    }

    public function deleteFaces($collectionId, $faceIds)
    {
        return $this->client->deleteFaces([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceIds' => $faceIds, // REQUIRED
        ]);
    }

    public function deleteFacesAsync($collectionId, $faceIds)
    {
        return $this->client->deleteFacesAsync([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceIds' => $faceIds, // REQUIRED
        ]);
    }


    public function detectFaces($imageName, $attributes = ['DEFAULT'], $imageVersion = null)
    {
        return $this->client->detectFaces([
            'Attributes' => $attributes,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function detectFacesAsync($imageName, $attributes = ['DEFAULT'], $imageVersion = null)
    {
        return $this->client->detectFacesAsync([
            'Attributes' => $attributes,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function detectLabels($imageName, $maxLabels = 123, $minConfidence = 70, $imageVersion = null)
    {
        return $this->client->detectLabels([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MaxLabels' => $maxLabels,
            'MinConfidence' => $minConfidence,
        ]);
    }

    public function detectLabelsAsync($imageName, $maxLabels = 123, $minConfidence = 70, $imageVersion = null)
    {
        return $this->client->detectLabelsAsync([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MaxLabels' => $maxLabels,
            'MinConfidence' => $minConfidence,
        ]);
    }

    public function detectModerationLabels($imageName, $minConfidence = 70, $imageVersion = null)
    {
        return $this->client->detectLabelsAsync([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MinConfidence' => $minConfidence,
        ]);
    }

    public function detectModerationLabelsAsync($imageName, $minConfidence = 70, $imageVersion = null)
    {
        return $this->client->detectLabelsAsync([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MinConfidence' => $minConfidence,
        ]);
    }

    public function getCelebrityInfo($id)
    {
        return $this->client->getCelebrityInfo([
            'Id' => $id, // REQUIRED
        ]);
    }

    public function getCelebrityInfoAsync($id)
    {
        return $this->client->getCelebrityInfo([
            'Id' => $id, // REQUIRED
        ]);
    }

    public function indexFaces($imageName, $collectionId, $detectionAttributes = ['DEFAULT'], $ExternalImageId = null, $imageVersion = null)
    {
        return $this->client->indexFaces([
            'CollectionId' => $collectionId, // REQUIRED
            'DetectionAttributes' => $detectionAttributes,
            'ExternalImageId' => '<string>',
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function indexFacesAsync($imageName, $collectionId, $detectionAttributes = ['DEFAULT'], $ExternalImageId = null, $imageVersion = null)
    {
        return $this->client->indexFacesAsync([
            'CollectionId' => $collectionId, // REQUIRED
            'DetectionAttributes' => $detectionAttributes,
            'ExternalImageId' => '<string>',
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function listCollections($MaxResults, $NextToken = null)
    {
        return $this->client->listCollections([
            'MaxResults' => $MaxResults,
            'NextToken' => $NextToken,
        ]);
    }

    public function listCollectionsAsync($MaxResults = null, $NextToken = null)
    {
        return $this->client->listCollectionsAsync([
            'MaxResults' => $MaxResults,
            'NextToken' => $NextToken,
        ]);
    }

    public function listFaces($CollectionId, $MaxResults = null, $NextToken = null)
    {
        return $this->client->listFaces([
            'CollectionId' => $CollectionId,
            'MaxResults' => $MaxResults,
            'NextToken' => $NextToken,
        ]);
    }

    public function recognizeCelebrities($imageName, $imageVersion = null)
    {
        return $this->client->recognizeCelebrities([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }

    public function recognizeCelebritiesAsync($imageName, $imageVersion = null)
    {
        return $this->client->recognizeCelebrities([
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
        ]);
    }


    public function searchFaces($collectionId, $faceId, $faceMatchThreshold = null, $axFaces = null)
    {
        return $this->client->searchFaces([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceId' => $faceId, // REQUIRED
            'FaceMatchThreshold' => $faceMatchThreshold,
            'MaxFaces' => $axFaces,
        ]);
    }

    public function searchFacesAsync($collectionId, $faceId, $faceMatchThreshold = null, $axFaces = null)
    {
        return $this->client->searchFaces([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceId' => $faceId, // REQUIRED
            'FaceMatchThreshold' => $faceMatchThreshold,
            'MaxFaces' => $axFaces,
        ]);
    }

    public function searchFacesByImage($collectionId, $imageName, $imageVersion = null, $faceMatchThreshold = null, $axFaces = null)
    {
        return $this->client->searchFacesByImage([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceMatchThreshold' => $faceMatchThreshold,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MaxFaces' => $axFaces,
        ]);
    }

    public function searchFacesByImageAsync($collectionId, $imageName, $imageVersion = null, $faceMatchThreshold = null, $axFaces = null)
    {
        return $this->client->searchFacesByImageAsync([
            'CollectionId' => $collectionId, // REQUIRED
            'FaceMatchThreshold' => $faceMatchThreshold,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                    'Version' => $imageVersion,
                ],
            ],
            'MaxFaces' => $axFaces,
        ]);
    }
}
