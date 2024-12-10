<?php

namespace App\Services;

use App\Repositories\GeneratedTagRepository;
use LaravelAux\BaseService;

class GeneratedTagService extends BaseService
{
    /**
     * UserService constructor.
     *
     * @param GeneratedTagRepository $repository
     */
    public function __construct(GeneratedTagRepository $repository)
    {
        parent::__construct($repository);
    }
}