<?php

namespace App\Services;

use App\Repositories\StockMovementRepository;
use LaravelAux\BaseService;

class StockMovementService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param StockMovementRepository $repository
     */
    public function __construct(StockMovementRepository $repository)
    {
        parent::__construct($repository);
    }
}