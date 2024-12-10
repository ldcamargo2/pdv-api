<?php

namespace App\Services;

use App\Repositories\SupplierRepository;
use LaravelAux\BaseService;

class SupplierService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
    {
        parent::__construct($repository);
    }
}