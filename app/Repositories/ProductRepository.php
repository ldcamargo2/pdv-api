<?php

namespace App\Repositories;

use App\Models\Product;
use LaravelAux\BaseRepository;

class ProductRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
}