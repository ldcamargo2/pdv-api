<?php

namespace App\Repositories;

use App\Models\SalePayment;
use LaravelAux\BaseRepository;

class SalePaymentRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param SalePayment $model
     */
    public function __construct(SalePayment $model)
    {
        parent::__construct($model);
    }
}