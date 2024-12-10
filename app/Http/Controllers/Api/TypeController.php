<?php

namespace App\Http\Controllers\Api;

use App\Services\TypeService;
use App\Http\Requests\TypeRequest;
use LaravelAux\BaseController;

class TypeController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param TypeService $service
     * @param TypeRequest $request
     */
    public function __construct(TypeService $service)
    {
        parent::__construct($service, new TypeRequest);
    }
}