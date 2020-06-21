<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
class LoginCtrl extends Controller
{
    //
      private $userModel;
      public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;

    }
    public function login(Request $request)
    {
        
        $account = $request->input('email');
        $password = $request->input('password');

        $userInfo = $this->userModel->filterAccount($account);
         if($userInfo == NULL) { 
            return response()->json(["errMsg" => "Tài khoản không tồn tại"],422);
        }
      
              

       dd( Auth::attempt(['email' => $account, 'password' => $password]));
       


        return response()->json(['status' => true], 200);

         
    }

    public function detailUser()
    {
        $user = auth()->user();
        dd($user);
        return response()->json($user);
    }
}
