<?php

namespace App\Repositories;

use App\Models\GeneratedTag;
use LaravelAux\BaseRepository;

class GeneratedTagRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param GeneratedTag $model
     */
    public function __construct(GeneratedTag $model)
    {
        parent::__construct($model);
    }
}