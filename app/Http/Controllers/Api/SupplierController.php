<?php

namespace App\Http\Controllers\Api;

use App\Services\SupplierService;
use App\Http\Requests\SupplierRequest;
use LaravelAux\BaseController;

class SupplierController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param SupplierService $service
     * @param SupplierRequest $request
     */
    public function __construct(SupplierService $service)
    {
        parent::__construct($service, new SupplierRequest);
    }
}