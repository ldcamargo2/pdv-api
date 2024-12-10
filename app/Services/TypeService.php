<?php

namespace App\Services;

use App\Repositories\TypeRepository;
use LaravelAux\BaseService;

class TypeService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param TypeRepository $repository
     */
    public function __construct(TypeRepository $repository)
    {
        parent::__construct($repository);
    }
}