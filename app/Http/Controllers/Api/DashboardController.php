<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
use App\Models\GeneratedTag;
use Illuminate\Http\Request;
use App\Services\UserService;
use LaravelAux\BaseController;
use App\Http\Requests\UserRequest;

class DashboardController extends BaseController
{
    public function __construct(UserService $service)
    {
        parent::__construct($service, new UserRequest);
    }

    public function dashboard(Request $request){

        $return = [
            'users' => User::count(),
            'products' => Product::count(),
            'tags_total' => GeneratedTag::count(),
            'tags_now' => GeneratedTag::whereDate('created_at', Carbon::now()->format('Y-m-d'))->count(),
            'last_tags' => GeneratedTag::orderBy('id', 'desc')->with(['product'])->limit(5)->get(),
        ];

        return ['highlights' => $return];
    }
}