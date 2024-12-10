<?php

namespace App\Services;

use App\Repositories\ProductCodeRepository;
use LaravelAux\BaseService;

class ProductCodeService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param ProductCodeRepository $repository
     */
    public function __construct(ProductCodeRepository $repository)
    {
        parent::__construct($repository);
    }
}