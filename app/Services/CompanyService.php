<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use LaravelAux\BaseService;

class CompanyService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param CompanyRepository $repository
     */
    public function __construct(CompanyRepository $repository)
    {
        parent::__construct($repository);
    }
}