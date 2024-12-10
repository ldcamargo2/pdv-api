<?php

namespace App\Repositories;

use App\Models\StockMovement;
use LaravelAux\BaseRepository;

class StockMovementRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param StockMovement $model
     */
    public function __construct(StockMovement $model)
    {
        parent::__construct($model);
    }
}