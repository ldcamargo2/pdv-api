<?php

namespace App\Repositories;

use App\Models\Sale;
use LaravelAux\BaseRepository;

class SaleRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Sale $model
     */
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }
}