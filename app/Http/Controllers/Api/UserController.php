<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\user\PasswordRequest;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Image;

class UserController extends BaseController
{
    public function me(Request $request){
        $user = User::with('image')->find(Auth::id());
      
        return $this->sendResponse($user,"Get success!!");
    }

    public function editProfile(EditRequest $request){
        try{
            $validateUser = Validator::make($request->all(),$request->rules());
    
           /* This is a validation error. */
            if($validateUser->fails()){
                return $this->sendError('validation error',$validateUser->errors(),401);
            }

            if ($request->has('image')) {
                $user = Auth::user();
                
                $image = $user->image;
                $url = $this->uploadFile($request,"user/avatar/");
                
                if ($image) {
                    $image->update(["url" => $url]);
                } else {
                    $image = Image::create(["url" => $url]);

                    DB::table('users')->where('id',$user->id)->update(["image_id" =>  $image->id]);
                }
            }

            if(!empty($request->fullname)){
               DB::table('users')->where('id',Auth::id())->update(["fullName" =>$request->fullname]);
            }

            if(!empty($request->phone)){
                $phoneExist = DB::table('users')->where('phone',$request->phone)->exists();
                if($phoneExist){
                    return $this->sendError('Phone error',"The phone already exists",201);
                }else{
                    DB::table('users')->where('id',Auth::id())->update(["phone" =>$request->phone]);
                }
             
            }

            if(!empty($request->email)){
                $emailExist = DB::table('users')->where('email',$request->email)->exists();
                if($emailExist){
                    return $this->sendError('email error',"Email already exists",201);
                }else{
                    DB::table('users')->where('id',Auth::id())->update(["email" =>$request->email]);
                }
            }

            if(!empty($request->username)){
               DB::table('users')->where('id',Auth::id())->update(["username" =>$request->username]);
            }
            
            $user = User::with('image')->find(Auth::id());

            return $this->sendResponse($user,"Updated profile user successfully!!");


        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function changePassword(PasswordRequest $request){
        try{
            $validateData = Validator::make($request->all(),$request->rules());
    
           /* This is a validation error. */
            if($validateData->fails()){
                return $this->sendError('validation error',$validateData->errors(),401);
            }
            
            $userModel = Auth::user();
         
            if(!Hash::check($request->current_password, $userModel->password)){
                return $this->sendResponse([],"Current password incorrect!,Please try again!!");
            }

            DB::table('users')->where('id',$userModel->id)->update(["password" => Hash::make($request->new_password)]);

            return $this->sendResponse([],"Changed password user successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }

    public function fetchNewOrder(Request $request){
        try{

            $dataFetch = Order::where('user_id',Auth::id())->get();


            

            return $this->sendResponse($dataFetch,"Fetch new order successfully!!");

        } catch (\Throwable $th) {    
            return $this->sendError( $th->getMessage(),null,500);
        }
    }
}
