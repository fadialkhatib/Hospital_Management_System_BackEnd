<?php

namespace App\Http\Middleware;

use App\Models\Department_request;
use App\Models\Item;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, $next)
    { // Get the department request with its items
        $departmentRequest = Department_request::with('itemss')->find($request->request_id);

        if (!$departmentRequest) {
            return back()->with('error', 'Request not found');
        }

        // Loop through the related items (using the relationship)
        foreach ($departmentRequest->itemss as $item) {
            $stock = Item::where('id', $item->item_id)->value('current_quantity');

            if ($stock === null) {
                return back()->with('error', "المادة غير موجودة ID: {$item->item_id}");
            }

            if ($stock < $item->quantity) {
                return back()->with('error', "الكمية غير متوفرة للمادة ID: {$item->item_id}");
            }
        }

        return $next($request);
    }
}
