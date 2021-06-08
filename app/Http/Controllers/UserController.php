<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Rtoken;
use Hash;
use App\Services\ApiService;
use App\zone;
use App\State;
use App\Centre;
use App\Services\UtilService;
use Validator;
use App\Role;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Get token input.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */
    public function getRegToken(Request $request)
    {
        $token = mt_rand(100000,999999);
        try
        {
            $user = User::where('email', $request->email)
                ->firstOrFail();

                if($user->token_activated>0){
return response()
                ->json(["message" => "Account already active"], 500);
                }
            

            Rtoken::create(['token' => $token, 'user_id' => $user->id]);
            //send mail

             // \Mail::to($user->email)->send(new \App\Mail\ActivationToken($user,$token)); 

            return response()
                ->json(["message" => "success"], 200);
            //Rtoken::create
            
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid email address"], 500);
            }
            else
            {

                return response()
                    ->json(["message" => /*$e->getMessage()*/"Server Error"], 500);
            }
        }
    }

    /**
     * Validate request token.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */
    public function validateRegToken(Request $request)
    {
        $token = rand();
        try
        {
            //return auth('jwt')->user()->id;
            $user = User::where('email', $request->email)
                ->firstOrFail();
            $isValid = Rtoken::where('token', $request->code)
                ->where('user_id', $user->id)->where('created_at', '>=', Carbon::now()->subHour(1)->toDateTimeString())
                ->firstOrFail();

                User::whereId($user->id)->update(["token_activated" =>1]);
              

            return response()
                ->json(["message" => 'success'], 200);
            //Rtoken::create
            
        }
        catch(\Exception $e)
        {
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid or expired token"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => "Server error"], 500);
            }
        }
    }

    /**
     * Create user password.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */


     /**
     * Get token input.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */
    public function getRegTokenForget(Request $request)

    {

        //return $request->email;
        $token = mt_rand(100000,999999);
        try
        {
            $user = User::where('email', $request->email)
                ->firstOrFail();
            

            Rtoken::create(['token' => $token, 'user_id' => $user->id]);
            //send mail

             // \Mail::to($user->email)->send(new \App\Mail\PasswordReset($user,$token)); 

            return response()
                ->json(["message" => "success"], 200);
            //Rtoken::create
            
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid email address"], 500);
            }
            else
            {

                return response()
                    ->json(["message" => /*$e->getMessage()*/"Server Error"], 500);
            }
        }
    }

    /**
     * Validate request token.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */
    public function validateRegTokenForget(Request $request)
    {
        $token = rand();
        try
        {
            //return auth('jwt')->user()->id;
            $user = User::where('email', $request->email)
                ->firstOrFail();
            $isValid = Rtoken::where('token', $request->code)
                ->where('user_id', $user->id)->where('created_at', '>=', Carbon::now()->subHour(1)->toDateTimeString())
                ->firstOrFail();

                User::whereId($user->id)->update(["token_activated" =>1]);
              

            return response()
                ->json(["message" => 'success'], 200);
            //Rtoken::create
            
        }
        catch(\Exception $e)
        {
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid or expired token"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => "Server error"], 500);
            }
        }
    }

    /**
     * Create user password.
     *
     * @param  Illuminate\Http\Request  $data
     * @return Illuminate\Http\Response json
     */


    public function createPassword(Request $request)
    {

        try
        {
            $user = User::where('email', $request->email)
                ->firstOrFail();
            $this->apiService = new ApiService();
            $credentials = request(['email', 'password']);

            User::whereId($user->id)
                ->update(['token_activated' => 1, 'password' => Hash::make($request->password) ]);
            return $this
                ->apiService
                ->login($credentials);
        }
        catch(\Exception $e)
        {
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => "Server error"], 500);
            }
        }
    }

    /**
     * Delete user.
     *
     * @return \App\User instance, collection of users (eager loaded)
     */
    public function getUsers()
    {
        //auth('api')->invalidate(true);
        try
        {
            $user = User::with('zone', 'state', 'centre')->
            // where('id',"!=",auth('api')->user()->id)->
            orderBy('created_at', 'desc')
                ->get();
            return response()
                ->json(["success" => true, "data" => ["data" => $user, ]], 200);

        }
        catch(Exception $e)
        {
            return response()->json(['success' => false, 'data', $e->getMessage() ], 500);

        }

    }

    /**
     * Delete user.
     *
     * @param  int  $id
     * @return Illuminate\Http\Response json
     */
    public function deleteUser($id)
    {

        //auth('api')->invalidate(true);
        try
        {
            $user = User::where('id', $id)->delete();

            return response()
                ->json(["success" => true], 200);

        }
        catch(Exception $e)
        {
            return response()->json(['success' => false, 'data', $e->getMessage() ], 500);

        }

    }

    /**
     * List of centres.
     *
     * @param  int  $ststeId
     * @return \App\Centre Instance, returns collection of centres
     */
    public function updateUser(Request $request)
    {
        //return auth('api')->user()->id;
        try
        {
            User::whereId(auth('api')->user()
                ->id)
                ->update(["password" => Hash::make($request->password) ]);
            return response()
                ->json(["success" => true, "data" => ["data" => "", ]], 200);

        }
        catch(Exception $e)
        {
            return response()->json(['success' => false, 'data', $e->getMessage() ], 500);

        }
    }

    /**
     *
     * List of zones.
     * @return \App\Centre Instance, returns collection of centres
     */
    public function fetchUserZones()
    {
        //return data or empty array
        return response()
            ->json(['zones' => Zone::all() ], 200);

    }

    /**
     * List of zones.
     * @param  int  $zoneId
     * @return \App\Zone Instance, returns collection of zones
     */
    public function fetchUserStatesZoneId($zoneId)
    {

        //return data or empty array
        return response()->json(['states' => State::where('zone_id', $zoneId)->get() ], 200);

    }

    /**
     * List of centres.
     *
     * @param  int  $ststeId
     * @return \App\Centre Instance, returns collection of centres
     */
    public function fetchUserCentresStateId($stateId)
    {

        //return data or empty array
        return response()->json(['centres' => Centre::where('state_id', $stateId)->get() ], 200);

    }

    /**
     * Single user record by $id.
     *
     * @param  int  $id
     * @return \App\User Instance
     */

    public function getUserById($id)
    {

        //return data or fail
        return response()->json(['user' => User::with('zone', 'state', 'centre')
            ->findOrFail($id) ], 200);

    }

    /**
     * Single user record by $id.
     *
     * @param  int  $id
     * @return \App\User Instance
     */

    public function getUserPersonal()
    {

        //return data or fail
        return response()->json(['user' => User::with('zone', 'state', 'centre')
            ->findOrFail(auth('api')
            ->user()
            ->id) ], 200);

    }

    /**
     * Create user record.
     *
     * @param  Illuminate\Http\Request  $data
     * @return \App\User
     */
    public function register(Request $request)
    {

        $validator = Validator::make($request->all() , UtilService::$userRules);
        $validator->setAttributeNames(UtilService::$userAttributeNames);

        if ($validator->fails())
        {
            // dd($validator->errors());
            return response()
                ->json(["errors" => $validator->errors() ], 422);
        }
        $password = str_random(8);
        $request
            ->request
            ->add(['password' => Hash::make($password) ]);

        try
        {
            $user = User::create($request->all());
            //$roleclient = Role::whereName($request['reg_type'])->first();
            $roleclient = Role::whereName($request->role)
                ->first();
            $user->assignRole($roleclient);
            // $credentials = request(['email', 'password']);
            // Mail::to($user->email)->queue(new Welcome($user));
            return response()->json(["user" => $user], 200);
        }
        catch(Exception $e)
        {
            return $this
                ->apiResponse
                ->responseServerError('Registration error.');
        }
    }

    /**
     * Update user record.
     *
     * @param  Illuminate\Http\Request  $data
     * @return \App\User
     */
    public function update(Request $request)
    {

        //validate input
        $validator = Validator::make($request->all() , UtilService::getUserRules($request->id));
        $validator->setAttributeNames(UtilService::$userAttributeNames);

        //validation fails we stop processing
        if ($validator->fails())
        {
            return response()
                ->json(["errors" => $validator->errors() ], 422);
        }

        //get user id from request.
        $userId = $request->id;
        try
        {
            $user = User::whereId($userId)->update($request->except(['created_at', 'updated_at', 'id', 'remember_token', 'zone', 'state', 'centre', 'role', 'registered']));

            $user = User::findOrFail($userId);

            if (!$user->hasRole($request->role))
            {
                //determin users old role, roles are admn or lawyer
                $userRole = $request->role == "lawyer" ? "admin" : "lawyer";
                //create the role object
                $roleClientBefore = Role::whereName($userRole)->first();
                //detach the user from role
                $user->removeRole($roleClientBefore);
                //create new role object
                $roleclient = Role::whereName($request->role)
                    ->first();
                //assign the user to new role
                $user->assignRole($roleclient);
            }

            return response()->json(["user" => $user], 200);
        }
        catch(Exception $e)
        {
            return $this
                ->apiResponse
                ->responseServerError('Registration error.');
        }
    }


     /**
     * Feedback.
     *
     * @param  Illuminate\Http\Request  $data
     * @return \App\User
     */
    public function FeedBack(Request $request)
    {

     return response()->json(['success'=>$request->all()],200);
    }

}

