<?php

namespace App\Repositories;

use App\Models\SaleItem;
use LaravelAux\BaseRepository;

class SaleItemRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param SaleItem $model
     */
    public function __construct(SaleItem $model)
    {
        parent::__construct($model);
    }
}