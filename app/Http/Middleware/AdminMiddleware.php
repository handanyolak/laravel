<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check())
        {
            toastr()->error('Bu Sayfayı Görebilmek İçin Giriş Yapmış Olmalısınız!', 'Başarısız!');
            return redirect()->route('giris');
        }
        return $next($request);
    }
}
