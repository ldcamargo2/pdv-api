<?php

namespace App\Services;

use App\Repositories\UnityMeasureRepository;
use LaravelAux\BaseService;

class UnityMeasureService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param UnityMeasureRepository $repository
     */
    public function __construct(UnityMeasureRepository $repository)
    {
        parent::__construct($repository);
    }
}