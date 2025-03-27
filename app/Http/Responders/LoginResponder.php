<?php

namespace App\Http\Responders;

use App\Http\Responders\Responder;


class LoginResponder extends Responder
{
    public function LoginSuccessResponder($token){
        return Response()->json(["message" => "Login Succeded"],200,$token);
    }

    public static function LoginFailedResponder($msg){
        return Response()->json(["message" => $msg],401);
    }

    public function CreateSuccessResponder(){
        return Response()->json(["message" => "Created Succeded"],200);
    }

    public function CreateFailedResponder($msg){
        return Response()->json(["message" => $msg],401);
    }
}
