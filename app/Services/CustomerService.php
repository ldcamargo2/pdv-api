<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use LaravelAux\BaseService;

class CustomerService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        parent::__construct($repository);
    }
}