<?php



namespace App\Http\Middleware;



use Closure;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Helpers\helper;

class AuthMiddleware

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next

     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse

     */

    public function handle(Request $request, Closure $next)

    {
        if (Auth::user() && (Auth::user()->type==1 || Auth::user()->type==2 || Auth::user()->type == 4)) {
            helper::language(Auth::user()->id);
            return $next($request);
        }

        return redirect('admin');

    }

}

