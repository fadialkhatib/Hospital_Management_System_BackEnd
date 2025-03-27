<?php

namespace App\Http\Middleware;

use App\Models\Department;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class DepRec
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //updates
    $token=json_decode(base64_decode($request->header('token')));
        $department = Department::where('id',$token->id)->value('id');
        if($department != 3)
        {
            return response()->json(['message'=>'this device cannot enter to DepartmentReception permissions']);
        }
        return $next($request);
    }
}
