<?php

namespace App\Http\Responders;

use App\Http\Responders\Responder;


class LoginResponder extends Responder
{
    public static function LoginSuccessResponder($token, $type)
    {
        return response()->json([
            "message" => "Login Succeeded",
            "token" => $token,
            "type" => $type
        ], 200);
    }

    public static function LoginFailedResponder($msg)
    {
        return Response()->json(["message" => $msg], 401);
    }

    public function CreateSuccessResponder()
    {
        return Response()->json(["message" => "Created Succeded"], 200);
    }

    public function CreateFailedResponder($msg)
    {
        return Response()->json(["message" => $msg], 401);
    }
}
