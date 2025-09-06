<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PreventBack
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Hanya tambahkan header jika bukan download file (BinaryFileResponse)
        if (!($response instanceof BinaryFileResponse)) {
            $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
        }

        return $response;
    }
}
