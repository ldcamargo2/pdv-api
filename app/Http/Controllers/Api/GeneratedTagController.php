<?php

namespace App\Http\Controllers\Api;

use App\Services\GeneratedTagService;
use App\Http\Requests\GeneratedTagRequest;
use LaravelAux\BaseController;

class GeneratedTagController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param GeneratedTagService $service
     * @param GeneratedTagRequest $request
     */
    public function __construct(GeneratedTagService $service)
    {
        parent::__construct($service, new GeneratedTagRequest);
    }
}