<?php

namespace App\Repositories;

use App\Models\Company;
use LaravelAux\BaseRepository;

class CompanyRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Company $model
     */
    public function __construct(Company $model)
    {
        parent::__construct($model);
    }
}