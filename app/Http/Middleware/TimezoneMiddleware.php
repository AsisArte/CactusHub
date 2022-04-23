<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DateTimeZone;
use Cookie;

class TimezoneMiddleware
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
        return $next($request);

        $default_timezone = 'UTC';
        $timezone_cookie = cookie::get('timezone');
        $visitor_timezone = geoip()->getLocation(request()->ip())->timezone;
 
        if (($timezone_cookie  === null) || (!in_array($timezone_cookie, DateTimeZone::listIdentifiers()))) {
            setTimezone($visitor_timezone);
            return $response->withCookie(cookie()->forever('timezone', $visitor_timezone));
        } elseif (in_array($timezone_cookie, DateTimeZone::listIdentifiers())) {
            setTimezone($timezone_cookie);
            return $response->withCookie(cookie()->forever('timezone', $timezone_cookie));
        } else {
            setTimezone($default_timezone);
            return $response->withCookie(cookie()->forever('timezone', $default_timezone));
        }
        return $response;
    }

    public function setTimezone($timezone)
    {
        config(['app.timezone' => $timezone]);
        date_default_timezone_set($timezone);
    }
}
