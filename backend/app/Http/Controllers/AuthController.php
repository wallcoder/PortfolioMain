<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
 
class AuthController extends Controller
{
    public function register(Request $request)
    {
        try{

       
       $validator = Validator::make($request->all(), [
        "email"=> "email|required|unique:users",
        "password"=> "required",
        "name"=>"required"
       ]);

       if ($validator->fails()){
        return response()->json(['success'=> false,'errors'=> $validator->errors()], 401);
       }



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['success'=>'true', 'message'=> 'User successfully registered'], 200);
       
    }catch(\Exception $e){
        return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);
    }


        
    }

    public function login(Request $request)
    {

        try{

            $validator = Validator::make($request->all(), [
'email' => 'required|email',
                'password' => 'required'
            ]);
            if($validator->fails()){
                return response()->json(['success'=> false,'errors'=> $validator->errors()],401);
            }
    
            $user = User::where('email', $request->email)->first();
            
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['success'=>false,'message' => 'Invalid Credentials'], 401);
    
            }
    
            $user->tokens()->delete();
    
            return response()->json(['success'=>true,'message'=> 'Login Successful',
                'token' => $user->createToken('authToken')->plainTextToken,
                'user' => $user
            ], 200);

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage()], 500);

        }
        
       
    }

    public function logout(Request $request)
    {
        try{

       
        $request->user()->tokens()->delete();
        return response()->json(['success'=>true,'message'=> 'Logout Successful'], 200);
    }catch(\Exception $e){
        return response()->json(['success'=>false,'message'=>$e->getMessage()], 500);
    }
    }

  
}
