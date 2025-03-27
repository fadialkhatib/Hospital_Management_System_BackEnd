<?php

namespace App\Http\Middleware;

use App\Models\Department;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class ITAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=json_decode(base64_decode($request->header('token')));
        $department = Department::where('id',$token->id)->value('id');
        if($department != 1)
        {
            return response()->json(['Message'=>'this device cannot enter to ITAdmin permissions']);
        }
        return $next($request);
    }
}
