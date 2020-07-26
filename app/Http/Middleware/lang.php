<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class lang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $acceptLang = $request->header('Accept-language');
        $acceptLangArr = ['en'];//explode(',', $acceptLang);


        $route = Route::current();
        $lang = $route->parameter('lang', $acceptLangArr[0]);
        App::setLocale($lang);

        URL::defaults([
            'lang'=>$lang,
        ]);
        $route->forgetParameter('lang');
       return $next($request);
    }
}
