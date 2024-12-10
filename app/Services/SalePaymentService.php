<?php

namespace App\Services;

use App\Repositories\SalePaymentRepository;
use LaravelAux\BaseService;

class SalePaymentService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param SalePaymentRepository $repository
     */
    public function __construct(SalePaymentRepository $repository)
    {
        parent::__construct($repository);
    }
}