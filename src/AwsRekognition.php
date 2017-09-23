<?php

namespace Jeylabs\AwsRekognition;

use Aws\Rekognition\RekognitionClient;

class AwsRekognition
{

    protected $client;

    public function __construct()
    {
        $this->client = new RekognitionClient(config('rekognition'));
    }

    public function compareFaces($targetImageName, $sourceImageName, $targetImageBytes = null, $sourceImageBytes = null, $SimilarityThreshold = 50, $targetImageVersion = null, $sourceImageVersion = null)
    {
        $params = [
            'SimilarityThreshold' => $SimilarityThreshold,
            'SourceImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $sourceImageName,
                ],
            ],
            'TargetImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $targetImageName,
                ],
            ],
        ];
        if ($sourceImageVersion) {
            $params['SourceImage']['S3Object']['Version'] = $sourceImageVersion;
        }
        if ($targetImageVersion) {
            $params['TargetImage']['S3Object']['Version'] = $targetImageVersion;
        }
        if ($targetImageBytes) {
            $params['TargetImage']['Bytes'] = $targetImageBytes;
        }
        if ($sourceImageBytes) {
            $params['SourceImage']['Bytes'] = $sourceImageBytes;
        }
        return $this->client->compareFaces($params);
    }

    public function compareFacesAsync($targetImageName, $sourceImageName, $targetImageBytes = null, $sourceImageBytes = null, $SimilarityThreshold = 50, $targetImageVersion = null, $sourceImageVersion = null)
    {
        $params = [
            'SimilarityThreshold' => $SimilarityThreshold,
            'SourceImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $sourceImageName,
                ],
            ],
            'TargetImage' => [
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $targetImageName,
                ],
            ],
        ];
        if ($sourceImageVersion) {
            $params['SourceImage']['S3Object']['Version'] = $sourceImageVersion;
        }
        if ($targetImageVersion) {
            $params['TargetImage']['S3Object']['Version'] = $targetImageVersion;
        }
        if ($targetImageBytes) {
            $params['TargetImage']['Bytes'] = $targetImageBytes;
        }
        if ($sourceImageBytes) {
            $params['SourceImage']['Bytes'] = $sourceImageBytes;
        }
        return $this->client->compareFacesAsync($params);
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


    public function detectFaces($imageName, $attributes = ['DEFAULT'], $imageBytes = null, $imageVersion = null)
    {
        $params = [
            'Attributes' => $attributes,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];

        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }

        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }

        return $this->client->detectFaces();
    }

    public function detectFacesAsync($imageName, $attributes = ['DEFAULT'], $imageBytes = null, $imageVersion = null)
    {
        $params = [
            'Attributes' => $attributes,
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];

        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }

        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }

        return $this->client->detectFacesAsync($params);
    }

    public function detectLabels($imageName, $imageBytes = null, $maxLabels = null, $minConfidence = null, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];

        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        if ($maxLabels) {
            $params['MaxLabels'] = $maxLabels;
        }
        if ($minConfidence) {
            $params['MinConfidence'] = $minConfidence;
        }

        return $this->client->detectLabels($params);
    }

    public function detectLabelsAsync($imageName, $imageBytes = null, $maxLabels = null, $minConfidence = null, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];

        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }

        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        if ($maxLabels) {
            $params['MaxLabels'] = $maxLabels;
        }
        if ($minConfidence) {
            $params['MinConfidence'] = $minConfidence;
        }

        return $this->client->detectLabelsAsync($params);
    }

    public function detectModerationLabels($imageName, $imageBytes = null, $minConfidence = null, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        if ($minConfidence) {
            $params['MinConfidence'] = $minConfidence;
        }
        return $this->client->detectLabelsAsync($params);
    }

    public function detectModerationLabelsAsync($imageName, $imageBytes = null, $minConfidence = null, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        if ($minConfidence) {
            $params['MinConfidence'] = $minConfidence;
        }
        return $this->client->detectLabelsAsync($params);
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

    public function indexFaces($imageName, $collectionId, $imageBytes = null, $detectionAttributes = ['DEFAULT'], $ExternalImageId = null, $imageVersion = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }
        if ($detectionAttributes) {
            $params['DetectionAttributes'] = $detectionAttributes;
        }
        if ($ExternalImageId) {
            $params['ExternalImageId'] = $ExternalImageId;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        return $this->client->indexFaces($params);
    }

    public function indexFacesAsync($imageName, $collectionId, $imageBytes = null, $detectionAttributes = ['DEFAULT'], $ExternalImageId = null, $imageVersion = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageBytes) {
            $params['Image']['Bytes'] = $imageBytes;
        }
        if ($detectionAttributes) {
            $params['DetectionAttributes'] = $detectionAttributes;
        }
        if ($ExternalImageId) {
            $params['ExternalImageId'] = $ExternalImageId;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
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
        $params = [
            'MaxResults' => $MaxResults,
        ];
        if ($NextToken) {
            $params['NextToken'] = $NextToken;
        }
        return $this->client->listCollections($params);
    }

    public function listCollectionsAsync($MaxResults = null, $NextToken = null)
    {
        $params = [
            'MaxResults' => $MaxResults,
        ];
        if ($NextToken) {
            $params['NextToken'] = $NextToken;
        }
        return $this->client->listCollectionsAsync($params);
    }

    public function listFaces($CollectionId, $MaxResults = null, $NextToken = null)
    {
        $params = [
            'CollectionId' => $CollectionId,
        ];
        if ($MaxResults) {
            $params['MaxResults'] = $MaxResults;
        }
        if ($NextToken) {
            $params['NextToken'] = $NextToken;
        }
        return $this->client->listFaces($params);
    }

    public function listFacesAsync($CollectionId, $MaxResults = null, $NextToken = null)
    {
        $params = [
            'CollectionId' => $CollectionId,
        ];
        if ($MaxResults) {
            $params['MaxResults'] = $MaxResults;
        }
        if ($NextToken) {
            $params['NextToken'] = $NextToken;
        }
        return $this->client->listFacesAsync($params);
    }

    public function recognizeCelebrities($imageName, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        return $this->client->recognizeCelebrities($params);
    }

    public function recognizeCelebritiesAsync($imageName, $imageVersion = null)
    {
        $params = [
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        return $this->client->recognizeCelebrities($params);
    }


    public function searchFaces($collectionId, $faceId, $faceMatchThreshold = null, $axFaces = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'FaceId' => $faceId, // REQUIRED
        ];
        if ($faceMatchThreshold) {
            $params['FaceMatchThreshold'] = $faceMatchThreshold;
        }
        if ($axFaces) {
            $params['MaxFaces'] = $axFaces;
        }
        return $this->client->searchFaces($params);
    }

    public function searchFacesAsync($collectionId, $faceId, $faceMatchThreshold = null, $axFaces = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'FaceId' => $faceId, // REQUIRED
        ];
        if ($faceMatchThreshold) {
            $params['FaceMatchThreshold'] = $faceMatchThreshold;
        }
        if ($axFaces) {
            $params['MaxFaces'] = $axFaces;
        }
        return $this->client->searchFaces($params);
    }

    public function searchFacesByImage($collectionId, $imageName, $imageVersion = null, $faceMatchThreshold = null, $axFaces = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($faceMatchThreshold) {
            $params['FaceMatchThreshold'] = $faceMatchThreshold;
        }
        if ($axFaces) {
            $params['MaxFaces'] = $axFaces;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        return $this->client->searchFacesByImage($params);
    }

    public function searchFacesByImageAsync($collectionId, $imageName, $imageVersion = null, $faceMatchThreshold = null, $axFaces = null)
    {
        $params = [
            'CollectionId' => $collectionId, // REQUIRED
            'Image' => [ // REQUIRED
                'S3Object' => [
                    'Bucket' => config('rekognition.bucket'),
                    'Name' => $imageName,
                ],
            ],
        ];
        if ($faceMatchThreshold) {
            $params['FaceMatchThreshold'] = $faceMatchThreshold;
        }
        if ($axFaces) {
            $params['MaxFaces'] = $axFaces;
        }
        if ($imageVersion) {
            $params['Image']['S3Object']['Version'] = $imageVersion;
        }
        return $this->client->searchFacesByImageAsync($params);
    }
}
