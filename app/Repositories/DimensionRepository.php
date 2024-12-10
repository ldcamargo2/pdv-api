<?php

namespace App\Repositories;

use App\Models\Dimension;
use LaravelAux\BaseRepository;

class DimensionRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Dimension $model
     */
    public function __construct(Dimension $model)
    {
        parent::__construct($model);
    }
}