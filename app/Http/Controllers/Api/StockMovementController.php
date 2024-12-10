<?php

namespace App\Http\Controllers\Api;

use App\Services\StockMovementService;
use App\Http\Requests\StockMovementRequest;
use LaravelAux\BaseController;

class StockMovementController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param StockMovementService $service
     * @param StockMovementRequest $request
     */
    public function __construct(StockMovementService $service)
    {
        parent::__construct($service, new StockMovementRequest);
    }
}