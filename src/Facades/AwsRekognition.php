<?php

namespace Jeylabs\AwsRekognition\Facades;

use Illuminate\Support\Facades\Facade;

class AwsRekognition extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AwsRekognition';
    }
}