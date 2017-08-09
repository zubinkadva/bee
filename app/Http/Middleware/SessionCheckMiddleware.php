<?php namespace App\Http\Middleware;

use App\Http\Requests;
use Auth;
use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Redirect;
use Session;


class SessionCheckMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $temp_session_id = Session::getId();
        $current_session = Auth::user()->current_session;
        if ($temp_session_id == $current_session or $current_session == '0') {
            $response = $next($request);

        } else {
            $request->session()->flush();
            return redirect('login');
        }
        return $response;
    }

}
