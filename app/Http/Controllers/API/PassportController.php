<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class PassportController extends Controller
{
    //
    public $successStatus = 200;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        // Validation
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]);
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()], 401);
        }
        // success
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;

        return response()->json(['success'=>$success], $this->successStatus);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['email'] = $user->email;

            return response()->json(['success'=>$success, 'status_code'=>$this->successStatus,
                'status_message'=>'success'], $this->successStatus);
        }

        // return error
        return response()->json(['error'=>'unauthorized'], 401);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(){
        $success = Auth::user();
       // $success['token'] = $user->createToken('MyApp')->accessToken;

        return response()->json(['data'=>$success, 'status_code'=>$this->successStatus,
                'status_message'=>'success'], $this->successStatus);
    }
}
