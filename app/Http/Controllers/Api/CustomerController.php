<?php

namespace App\Http\Controllers\Api;

use App\Services\CustomerService;
use App\Http\Requests\CustomerRequest;
use LaravelAux\BaseController;

class CustomerController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param CustomerService $service
     * @param CustomerRequest $request
     */
    public function __construct(CustomerService $service)
    {
        parent::__construct($service, new CustomerRequest);
    }
}