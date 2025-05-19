<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
   public function handle($request, Closure $next)
{
    if (!session()->get('admin_logged_in')) {
        return redirect()->route('admin.login');
    }
    return $next($request);
}

}
?>