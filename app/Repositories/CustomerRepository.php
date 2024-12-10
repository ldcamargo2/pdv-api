<?php

namespace App\Repositories;

use App\Models\Customer;
use LaravelAux\BaseRepository;

class CustomerRepository extends BaseRepository
{
    /**
     * UserService constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}