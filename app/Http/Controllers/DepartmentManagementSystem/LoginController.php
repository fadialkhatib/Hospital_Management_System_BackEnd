<?php


namespace App\Http\Controllers;

use App\Models\ActiveToken;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Responders\LoginResponder;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'department_id' => 'required',
            'password' => 'required'
        ]);

        $department = Department::where('id', $request->department_id)->first();

        if (!$department || !Hash::check($validate['password'], $department->password)) {
            return LoginResponder::LoginFailedResponder('Wrong password! Try again');
        }

        $tokenjson = json_encode($department);
        $token = base64_encode($tokenjson);

        $newtoken = new ActiveToken();
        $newtoken->department_id = $department->id;
        $newtoken->token = $token;

        $check = ActiveToken::where('token', $token)->first();
        if ($check) {
            return response()->json(['message' => 'You are already logged in'], 401);
        }

        $newtoken->save();
        return LoginResponder::LoginSuccessResponder($token);
    }

    //logout for manager & user
    public function Logout(Request $request)
    {
        $token = ActiveToken::where('token', $request->header('token'))->first();
        $token->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }



    // public function hashhh(Request $request)
    // {
    //     $update = ModelsLogin::where(['id'=>$request->user_id,
    //                            'password'=>$request->password])
    //                            ->update([
    //         'password'=>Hash::make($request->password)
    //                            ]);
    // }
}
