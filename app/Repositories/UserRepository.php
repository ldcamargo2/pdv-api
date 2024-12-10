<?php

namespace App\Repositories;

use App\Models\User;
use LaravelAux\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}