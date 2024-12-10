<?php

namespace App\Repositories;

use App\Models\UnityMeasure;
use LaravelAux\BaseRepository;

class UnityMeasureRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param UnityMeasure $model
     */
    public function __construct(UnityMeasure $model)
    {
        parent::__construct($model);
    }
}