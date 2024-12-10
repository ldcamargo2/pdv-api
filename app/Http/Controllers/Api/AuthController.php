<?php

namespace App\Http\Controllers\Api;

use App\Models\Company;
use App\Services\UserService;
use App\Http\Requests\AuthRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * AuthController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to authenticate User
     *
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth(AuthRequest $request)
    {
        $data = $request->only(['email', 'password']);
        if ($token = JWTAuth::attempt($data)) {

            $return = Auth::user()->getAttributes();

            foreach ($return as $key => $value) {
                if (empty($value)) {
                    unset($return[$key]);
                }
            }
    
            unset($return['password']);
    
            $return['photo'] = env('APP_URL') . 'user/image/' . $return['id'];
            $return['access_token'] = $token;
            $return['token_type'] = 'bearer';
            $return['expires_in'] = 3600;
    
            return response()->json($return);
    

            // return response()->json($token);
        }
        return response()->json('Credenciais Inválidas', 401);
    }

    /**
     * Get the authenticated user.
    *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if ($auth = JWTAuth::parseToken()) {

            $user = $auth->toUser()->getAttributes();
            $user['photo'] = env('APP_URL') . '/user/image/' . $user['id'] .'/'.$user['created_at'];
            $user['company_name'] = Company::where('id', $user['company_id'])->first()->company_name;
            $user['company_color'] = Company::where('id', $user['company_id'])->first()->color;
            $user['company_font_color'] = Company::where('id', $user['company_id'])->first()->font_color;

            return response()->json($user, 200);
        }
        return response()->json('Credenciais Inválidas', 401);
    }

    /**
     * Method to invalidate the token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->json('Logout efetuado com sucesso.', 200);
    }

    /**
     * Method to refresh token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $condition = JWTAuth::getToken();
        if ($condition) {
            $token = JWTAuth::refresh($condition);
            return response()->json($token, 200);
        }
        return response()->json('Não foi possível refrescar o token', 500);
    }
}