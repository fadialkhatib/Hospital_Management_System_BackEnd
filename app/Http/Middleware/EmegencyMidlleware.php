<?php

namespace App\Http\Middleware;

use App\Models\Department;
use Closure;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmegencyMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = json_decode(base64_decode($request->header('token')));

        // التحقق من وجود token صالح
        if (!$token || !isset($token->id)) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        $dep_id = $token->id;

        // الحصول على نوع القسم مع العلاقة (افترض أن لديك علاقة بين Department و Type)
        $department = Department::with('type')->find($dep_id);

        if (!$department) {
            return response()->json(['error' => 'Department not found'], 404);
        }

        // التحقق من أن النوع هو "Emergency Department"
        if ($department->type && $department->type->type == 'Emergency Department') {
            return $next($request);
        }

        return response()->json(['error' => 'Please login from an Emergency Department account'], 401);
    }
}
