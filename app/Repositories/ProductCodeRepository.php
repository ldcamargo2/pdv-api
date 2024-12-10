<?php

namespace App\Repositories;

use App\Models\ProductCode;
use LaravelAux\BaseRepository;

class ProductCodeRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param ProductCode $model
     */
    public function __construct(ProductCode $model)
    {
        parent::__construct($model);
    }
}