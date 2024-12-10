<?php

namespace App\Http\Controllers\Api;

use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;
use LaravelAux\BaseController;

class CompanyController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param CompanyService $service
     * @param CompanyRequest $request
     */
    public function __construct(CompanyService $service)
    {
        parent::__construct($service, new CompanyRequest);
    }
}