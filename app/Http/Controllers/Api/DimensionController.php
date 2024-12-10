<?php

namespace App\Http\Controllers\Api;

use App\Services\DimensionService;
use App\Http\Requests\DimensionRequest;
use LaravelAux\BaseController;

class DimensionController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param DimensionService $service
     * @param DimensionRequest $request
     */
    public function __construct(DimensionService $service)
    {
        parent::__construct($service, new DimensionRequest);
    }
}