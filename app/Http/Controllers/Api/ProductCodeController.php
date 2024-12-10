<?php

namespace App\Http\Controllers\Api;

use App\Services\ProductCodeService;
use App\Http\Requests\ProductCodeRequest;
use LaravelAux\BaseController;

class ProductCodeController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param ProductCodeService $service
     * @param ProductCodeRequest $request
     */
    public function __construct(ProductCodeService $service)
    {
        parent::__construct($service, new ProductCodeRequest);
    }
}