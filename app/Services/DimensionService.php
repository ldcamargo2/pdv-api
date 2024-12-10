<?php

namespace App\Services;

use App\Repositories\DimensionRepository;
use LaravelAux\BaseService;

class DimensionService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param DimensionRepository $repository
     */
    public function __construct(DimensionRepository $repository)
    {
        parent::__construct($repository);
    }
}