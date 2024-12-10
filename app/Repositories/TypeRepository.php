<?php

namespace App\Repositories;

use App\Models\Type;
use LaravelAux\BaseRepository;

class TypeRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Type $model
     */
    public function __construct(Type $model)
    {
        parent::__construct($model);
    }
}