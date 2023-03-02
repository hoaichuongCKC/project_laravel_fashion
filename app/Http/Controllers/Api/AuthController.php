<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController as BaseController;

class AuthController extends BaseController
{
  
    public function login(Request $request){

        try {
            $validateUser = Validator::make($request->all(), 
            [
                'phone' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }

            if(!Auth::attempt($request->only(['phone', 'password']))){
                return $this->sendError('Phone & Password does not match with our record.',"",201);
            }
            
            $user = User::where('phone',$request->phone)->first();

            $token = $user->createToken('auth-login'.$user->id, ['expires_at' => now()])->plainTextToken;

            return $this->sendResponse($token,'User Logged In Successfully');

        } catch (\Throwable $th) {    

            return $this->sendError( $th->getMessage(),500);

        }
    }

    public function logout(Request $request){
        try {
            User::where('id',Auth::id())->update(["remember_token"=> null]);

            $request->user()->currentAccessToken()->delete();

            return $this->sendResponse([],"Logout success!!");

        } catch (\Throwable $th) {        

            return $this->sendError( $th->getMessage(),500);
        }
    }

    public function register(Request $request)
    {
        
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'username' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'required',
                'image' => 'required',
            ]);

            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }
            
            $checkEmaiAndPhone = DB::table('users')
            ->where('phone', $request->phone)
            ->orWhere('email', $request->email)
            ->exists();

            if(!$checkEmaiAndPhone){
                $url = $this->uploadFile($request,"user/avatar/");

               $image = Image::create(["url" =>$url]);
                
                DB::table('users')->insert([
                    "username" => $request->username,
                    "fullname" => $request->fullname,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "password" => Hash::make($request->password),
                    "image_id" => $image->id,
                    "role" => 1,
                ]);
            }else{
                return $this->sendResponse([],'Email or phone are already exists');

            }
            return $this->sendResponse([],'User Sign Up Successfully');

        } catch (\Throwable $th) {    

            return $this->sendError( $th->getMessage(),500);

        }
    }

    
    public function loginWithGoogle(Request $request){

        try {
            //check the account already in database
            $checkEmail =  DB::table('users')->where('email',$request->email)->exists();

            if($checkEmail){
                $user = User::where('email',$request->email)->first();

                $token = $user->createToken('auth-login'.$user->id, ['expires_at' => now()])->plainTextToken;
    
                return $this->sendResponse($token,'User Logged In Successfully');    
            }

            $validateUser = Validator::make($request->all(), 
            [
                'fullname' => 'required',
                'email' => 'required',
            ]);

            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }
            
            $user = User::create([
                "username" => "username@" .Str::random(6),
                "fullName" => $request->fullname,
                "email" => $request->email,
                "role" =>0,
            ]);
            
            $token = $user->createToken('auth-login-google'.$user->id, ['expires_at' => now()])->plainTextToken;

            return $this->sendResponse($token,'User Logged In Successfully');
            
        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),500);
        }
    }

}
