<?php

namespace App\Http\Controllers\Api;

use App\Services\SalePaymentService;
use App\Http\Requests\SalePaymentRequest;
use LaravelAux\BaseController;

class SalePaymentController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param SalePaymentService $service
     * @param SalePaymentRequest $request
     */
    public function __construct(SalePaymentService $service)
    {
        parent::__construct($service, new SalePaymentRequest);
    }
}