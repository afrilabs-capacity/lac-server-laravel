<?php

namespace App\Services;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Role;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Services\ApiResponses;
use App\Services\UtilService;
use Hash;
use Mail;
use App\Mail\Welcome;


class ApiService{



    use AuthenticatesUsers;

    /**
     * @param Array 
     * @return json
     */
    protected $uploadDirectory;


    public function __construct(){

        $this->apiResponse=new ApiResponses();

        //$this->apiService=new ApiService();
    }


    public function login($credentials){
        //return $credentials;
        //return Hash::make("123456");
        if (! $token = auth('api')->attempt($credentials)) {
            return $this->apiResponse->responseUnauthorized();
        }


        // Get the user data.
               $user = auth('api')->user();
                return response()->json([
            'status' => 200,
            'message' => 'Authorized.',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => array(
                'id' => $user->id,
                'name' => $user->names,
                'email' => $user->email,
                //'account_type'=>$user->roles()->first()->name,
                // 'image'=>$user->passport!==null ? $user->passport : null,
                // 'payment'=>$user->paid() ? 'true' : null,

                //'user_model'=>$user
            )
        ], 200);

    }


    public function register($request){

        //$validator = Validator::make($request->all(),UtilService::$userRules);
        //$validator->setAttributeNames(UtilService::$userAttributeNames);
         $useRay= array('id' => '2','names' => 'Mr.Opaleke Adeyinka Rotimi','status' => 'PLAO (Coordinator)','qualification' => 'LLB,BL','state' => '5','gl' => '12','sex' => 'M','phone' => '7067976271','email' => 'braimahjake@gmail.com','password' => '$2y$10$bUcrNwtrlXdhDHqRXxsn5uZZmgsCvuOoMxC670G3BAE1yDxlQvFIq','remember_token' => NULL,'created_at' => '2020-10-06 20:46:38','updated_at' => '2020-10-06 20:46:38');

         try {
            $user = User::create($useRay);
            //$roleclient = Role::whereName($request['reg_type'])->first();
            $roleclient = Role::whereName('lawyer')->first();
            $user->assignRole($roleclient);
            // $credentials = request(['email', 'password']);
            // Mail::to($user->email)->queue(new Welcome($user));
            return response()->json(["data",$user],200);
        } catch (Exception $e) {
            return $this->apiResponse->responseServerError('Registration error.');
        }
    }




}