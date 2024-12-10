<?php

namespace App\Http\Controllers\Api;

use App\Services\SaleItemService;
use App\Http\Requests\SaleItemRequest;
use LaravelAux\BaseController;

class SaleItemController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param SaleItemService $service
     * @param SaleItemRequest $request
     */
    public function __construct(SaleItemService $service)
    {
        parent::__construct($service, new SaleItemRequest);
    }
}