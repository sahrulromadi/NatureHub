<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetDeviceId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $device_id = $request->cookie('device_id');

        if (!$device_id) {
            $device_id = Str::uuid(); // Generate UUID
            Cookie::queue('device_id', $device_id, 60 * 24 * 30); // Save device id to cookie for 30 days
        }

        return $next($request);
    }
}
