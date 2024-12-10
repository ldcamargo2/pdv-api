<?php

namespace App\Services;

use App\Repositories\SaleRepository;
use LaravelAux\BaseService;

class SaleService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param SaleRepository $repository
     */
    public function __construct(SaleRepository $repository)
    {
        parent::__construct($repository);
    }
}