<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SanctumController extends Controller
{
    public function register(UserRequest $req) {
        $req->validated();
        $user = new User();
        $user->fillable($req->all());
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
//        $user->remember_token = Str::random(10);
        $user->save();
        return $this->successResponse('');
    }

    public function login(LoginRequest $req) {
        $req->validated();
        try {
            $user =  User::where('email', $req->email)->first();

            if(!Hash::check($req->password, $user->password, [])){
                return response()->json([
                    'status_code' => 422,
                    'message' => 'Password Match',

                ]);
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        }
        catch (Exception $error) {
            return $this->errorResponse($error,'lỗi đăng nhập','500');
        }
    }

    public function index() {
        $user = request()->user();
        return $this->successResponse($user,'select thành công','200');
    }

    public function listUser() {
        $user = User::all();
        return $this->successResponse($user , 'Select thành công' , '200');
    }
}
