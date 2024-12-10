<?php

namespace App\Repositories;

use App\Models\Supplier;
use LaravelAux\BaseRepository;

class SupplierRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Supplier $model
     */
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }
}