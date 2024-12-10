<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\CheckPoints;
use Illuminate\Http\Request;
use App\Services\UserService;
use LaravelAux\BaseController;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;

class UserController extends BaseController
{
    /**
     * UserController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        parent::__construct($service, new UserRequest());
    }

    public function getProfile(){
        $user = auth()->user();

        return $user;
    }

    public function changeCompany(Request $request){
        $data = $request->all();

        $user = auth()->user();

        $usr = User::find($user->id);

        $usr->company_id = $data['id'];
        $usr->save();

        return 'OK';
    }

    public function saveProfile(Request $request){
        $data = $request->all();
        
        $user = User::find($data['id']);

        $user->name = $data['name'];

        if(isset($data['a_password'])){
            if($data['a_password'] == $data['password_confirmation']){
                $user->password = $data['a_password'];
            } else {
                return response()->json('As senhas informadas não conferem', 500);
            }
        }

        if(isset($data['photo'])){
            Storage::disk('local')->put('user/' . $user->id . '/perfil.png', file_get_contents($data['photo']));
            $user->photo = 'user/' . $user->id . '/perfil.png';
        }


        $user->update();

        return 'ok';
    }

    /**
     * Method to create User
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function store(Request $request)
    {
        $this->validation();
        $condition = $this->service->create($request->all());
        if ($condition['status'] === '00') {
            return response()->json('Registro criado com sucesso!!', 201);
        }
        return response()->json($condition['message'], 500);
    }

    /**
     * Method to update User Information
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function update(Request $request, int $id)
    {
        $this->validation();
        $condition = $this->service->update($request->all(), $id);
        if ($condition['status'] === '00') {
            return response()->json('Registro criado com sucesso', 201);
        }
        return response()->json($condition['message'], 500);
    }

    /**
     * Method to get User Profile Image
     *
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function image($id)
    {
        $user = $this->service->find($id);
        $photo = $user->getAttributes()['photo'];

        if($photo == null){
            return response(file_get_contents(storage_path('app/public/user.jpg')))
                ->header('Content-Type', 'image/png');
        } else {
            return response(file_get_contents(storage_path('app/' . $user->photo_raw)))
                ->header('Content-Type', 'image/png');
        }
    }
    // public function sched(Schedule $schedule)
    // {
        
    //     $now = Carbon::now()->format('H:i:s');
    //     $last = CheckPoints::whereDate('datetime', Carbon::now()->format('Y-m-d'))->get()->max();

    //     function differenceInHours($startdate,$enddate){
    //         $starttimestamp = strtotime($startdate);
    //         $endtimestamp = strtotime($enddate);
    //         $difference = abs($endtimestamp - $starttimestamp)/3600;
    //         return $difference;
    //     }

    //     $hours_difference = differenceInHours($last["datetime"],$now);
    //     $count = CheckPoints::whereDate('datetime', Carbon::now()->format('Y-m-d'))->count();

    //     if($hours_difference > 0.933 && $count == 2){

    //         $new = [
    //             'datetime' => Carbon::now()->format('Y-m-d H:i:s')
    //         ];

    //         $check = CheckPoints::create($new);

    //         // $request = new Client();
    //         // $headers = [
    //         //     'headers' => [
    //         //         'Content-type' => 'application/x-www-form-urlencoded',
    //         //         'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLnBvbnRvLmlubm92YXJldGkuY29tLmJyXC9hcGlcL3YxXC9sb2dpbiIsImlhdCI6MTYwMTQwNzY4NCwibmJmIjoxNjAxNDA3Njg0LCJqdGkiOiJvMXNmTDZQTUhWNVJOamFkIiwic3ViIjoxMCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ZnrQ1ksbvkC44YzgBcWJCZnkzDiIjrNH9arbyNsagwk'
    //         //     ],
    //         //     'verify' => false,
    //         // ];

    //         // $response = $request->post('https://api.ponto.innovareti.com.br/api/v1/checks/remoteCheck', $headers);
    //         // if ($response->getStatusCode() === 200) {                    
    //         //     return ['status' => '00'];
    //         // }
    //     }        
    // }

    // public function check($method)
    // {
    //     $now = Carbon::now()->format('H:i:s');
    //     $last = CheckPoints::whereDate('datetime', Carbon::now()->format('Y-m-d'))->get()->max();

    //     function differenceInHours($startdate,$enddate){
    //         $starttimestamp = strtotime($startdate);
    //         $endtimestamp = strtotime($enddate);
    //         $difference = abs($endtimestamp - $starttimestamp)/3600;
    //         return $difference;
    //     }

    //     $hours_difference = differenceInHours($last["datetime"],$now);

    //     if($hours_difference > 2 && (($method == 'enter' && $now >= '05:25:00' && $now <= '10:00:00') || ($method == 'wifi' && $now >= '11:25:00' && $now <= '13:59:00') || ($method == 'exit' && $now >= '17:00:00'))){

    //         $count = CheckPoints::whereDate('datetime', Carbon::now()->format('Y-m-d'))->count();

    //         if($count == 2 && ($now >= '11:25:00' && $now <= '13:00:00')){

    //         } else {

    //             $new = [
    //                 'datetime' => Carbon::now()->format('Y-m-d H:i:s')
    //             ];

    //             $check = CheckPoints::create($new);

    //             $request = new Client();
    //             $headers = [
    //                 'headers' => [
    //                     'Content-type' => 'application/x-www-form-urlencoded',
    //                     'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLnBvbnRvLmlubm92YXJldGkuY29tLmJyXC9hcGlcL3YxXC9sb2dpbiIsImlhdCI6MTYwMTQwNzY4NCwibmJmIjoxNjAxNDA3Njg0LCJqdGkiOiJvMXNmTDZQTUhWNVJOamFkIiwic3ViIjoxMCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.ZnrQ1ksbvkC44YzgBcWJCZnkzDiIjrNH9arbyNsagwk'
    //                 ],
    //                 'verify' => false,
    //             ];

    //             $response = $request->post('https://api.ponto.innovareti.com.br/api/v1/checks/remoteCheck', $headers);
    //             if ($response->getStatusCode() === 200) {                    
    //                 return ['status' => '00'];
    //             }
    //         }
    //     }        
    // }

    public function updateImage(array $data, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->repository->find($id);
            if ($user->update(['photo' => 'user/' . $user->id . '/perfil.png'])) {
                Storage::disk('local')->put('user/' . $user->id . '/perfil.png', file_get_contents($data['photo']));
                DB::commit();
                return ['status' => '00'];
            }
            DB::rollback();
            return ['status' => '01', 'Ocorreu um erro ao realizar o upload da Imagem'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}