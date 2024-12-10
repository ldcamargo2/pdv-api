<?php

namespace App\Services;

use App\Repositories\SaleItemRepository;
use LaravelAux\BaseService;

class SaleItemService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param SaleItemRepository $repository
     */
    public function __construct(SaleItemRepository $repository)
    {
        parent::__construct($repository);
    }
}