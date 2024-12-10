<?php

namespace App\Http\Controllers\Api;

use App\Services\UnityMeasureService;
use App\Http\Requests\UnityMeasureRequest;
use LaravelAux\BaseController;

class UnityMeasureController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param UnityMeasureService $service
     * @param UnityMeasureRequest $request
     */
    public function __construct(UnityMeasureService $service)
    {
        parent::__construct($service, new UnityMeasureRequest);
    }
}